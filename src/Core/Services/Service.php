<?php

declare(strict_types=1);

namespace SDK\Core\Services;

use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Factory;
use SDK\Core\Dtos\Request;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\MethodType;
use SDK\Core\Exceptions\InterceptorException;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Resources\Connection;
use SDK\Core\Resources\Interceptor;
use SDK\Core\Resources\Url;


/**
 * This is the main service class.
 *
 * @package SDK\Core\Services
 */
abstract class Service {

    protected const GET = MethodType::GET;

    protected const POST = MethodType::POST;

    protected const PUT = MethodType::PUT;

    protected const DELETE = MethodType::DELETE;

    protected const ITEMS = 'items';

    private static Connection $connection;

    protected function getConnection(): Connection {
        self::$connection ??= Connection::getInstance();
        return self::$connection;
    }

    protected function __construct() {
        // Prevent initialize this object
    }

    protected function getElements(string $class, string $resource, ParametersGroup $parameters = null): ?ElementCollection {
        return $this->getResponse(
            $this->call((new RequestBuilder())->path($resource)->urlParams($parameters)->build()),
            $class
        );
    }

    protected function getResponse(array $data, string $class): ?ElementCollection {
        if (!isset($data[self::ITEMS])) {
            if (!isset($data['error'])) {
                return null;
            }
        } else {
            if (is_subclass_of($class, Factory::class, true) && defined("$class::ADD_PARENT_TYPE") && $class::ADD_PARENT_TYPE) {
                $factoryData = [];
                foreach ($data[self::ITEMS] as $element) {
                    $element[$class::TYPE] = $data[$class::TYPE];
                    $factoryData[] = $element;
                }
                $data[self::ITEMS] = $factoryData;
            }
            $data[self::ITEMS] = $this->prepareElements($data[self::ITEMS], $class);
        }
        return $this->getCollection($data, $class);
    }

    protected function getCollection(array $data, string $class) {
        $classElementCollection = ElementCollection::getCollectionClass($data, $class);
        return new $classElementCollection($data);
    }

    protected function prepareElements(array $data, string $class): array {
        $elements = [];
        foreach ($data as $element) {
            $elements[] = $this->prepareElement($element, $class);
        }
        return $elements;
    }

    protected function getElement(string $class, string $resource, int $id = null, $params = null): ?Element {
        return $this->getResourceElement($class, Url::replaceWildcards($resource, ['id' => $id]), $params);
    }

    protected function call(Request $request, string $apiUrl = null): array {
        return $this->getConnection()->doRequest($request, $apiUrl);
    }

    protected function getResourceElement(string $class, string $resource, $params = []): ?Element {
        $element = $this->prepareElement($this->call((new RequestBuilder())->path($resource)->urlParams($params)->build()), $class);
        return $element;
    }

    protected function prepareElement(array $data, string $class): ?Element {
        if (empty($data) && $class !== Status::class) {
            return null;
        }
        if (is_subclass_of($class, Factory::class, true)) {
            return $class::getElement($data);
        }

        $newElement = new $class($data);

        if (defined('SDK_INTERCEPTORS_NAMESPACE')) {
            $interceptorClass = SDK_INTERCEPTORS_NAMESPACE . '\\ServiceResponseElement';
            $interceptor = $interceptorClass::getInstance();
            if (!($interceptor instanceof Interceptor)) {
                throw new InterceptorException("ERROR: Invalid instance of: " .  $interceptorClass, InterceptorException::INVALID_INTERCEPTOR);
            }
            $interceptor->execute($newElement);
        }
        return $newElement;
    }

    protected function extractParameters(?ParametersGroup $parametersGroup = null): array {
        return !is_null($parametersGroup) ? $parametersGroup->toArray() : [];
    }

    protected function replaceWildcards(string $resource, array $wildcards): string {
        return Url::replaceWildcards($resource, $wildcards);
    }

    /** @deprecated */
    protected function getNavigationHash(): ?string {
        return null;
    }
}

<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Basket\Basket;
use SDK\Dtos\SessionAggregateData;
use SDK\Services\Parameters\Groups\Session\SetCurrencyParametersGroup;
use SDK\Services\Parameters\Groups\Session\SetLanguageParametersGroup;

/**
 * This is the session aggregate data service class.
 * This class will retrieve the aggregate data of the current session from LogiCommerce API and transform them to objects.
 *
 * @see SessionService::getAggregateData()
 * @see SessionService::setCurrency()
 * @see SessionService::setLanguage()
 * @see SessionAggregateData
 *
 * @see SessionService::addGetAggregateData()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class SessionService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::SESSION_MODEL;

    /**
     * Returns the session aggregate data
     *
     * @return SessionAggregateData|NULL
     */
    public function getAggregateData(): ?SessionAggregateData {
        return $this->getElement(SessionAggregateData::class, Resource::SESSION_AGGREGATE_DATA);
    }

    /**
     * Add the request to get the session aggregate data
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetAggregateData(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::SESSION_AGGREGATE_DATA)->build());
    }

    /**
     * Set the country for the current user
     *
     * @param string $countryCode
     *
     * @return Basket|NULL
     */
    public function setCountry(string $countryCode): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::SESSION_COUNTRY)
                    ->method(self::PUT)
                    ->body(['country' => $countryCode])
                    ->build()
            ),
            Basket::class
        );
    }


    /**
     * Sets a new navigation currency for the current session
     *
     * @param string $currencyInitials
     *
     * @return Basket|NULL
     */
    public function setCurrency(string $currencyInitials): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::SESSION_CURRENCY)->method(self::PUT)->body($this->getSetCurrencyParams($currencyInitials))
                    ->build()
            ),
            Basket::class
        );
    }

    private function getSetCurrencyParams(string $currencyInitials): SetCurrencyParametersGroup {
        $params = new SetCurrencyParametersGroup();
        $params->setCurrency($currencyInitials);
        return $params;
    }


    /**
     * Sets a new navigation language for the current session
     *
     * @param string $languageCode
     *
     * @return Basket|NULL
     */
    public function setLanguage(string $languageCode): ?Basket {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::SESSION_LANGUAGE)->method(self::PUT)->body($this->getSetLanguageParams($languageCode))
                    ->build()
            ),
            Basket::class
        );
    }

    private function getSetLanguageParams(string $languageCode): SetLanguageParametersGroup {
        $params = new SetLanguageParametersGroup();
        $params->setLanguage($languageCode);
        return $params;
    }
}

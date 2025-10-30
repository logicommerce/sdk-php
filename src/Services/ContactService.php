<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\CacheTrait;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Core\Resources\Cookie;
use SDK\Dtos\QueryMotive;
use SDK\Services\Parameters\Groups\ContactParametersGroup;

/**
 * This is the contact service class.
 * This class will retrieve and manage the contact resources from LogiCommerce API.
 * All the needed contacts operations previous to Framework must be done here.
 *
 * @see ContactService::send()
 * @see ContactService::getQueryMotives()
 * @see QueryMotive
 *
 * @see ContactService::addGetQueryMotives()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class ContactService extends Service {
    use ServiceTrait, CacheTrait;

    private const REGISTRY_KEY = Registry::CONTACT_MODEL;

    /**
     * Send the contact form
     *
     * @param ContactParametersGroup $params
     *            object with the needed data to send to the API contact resource
     * @param string $dataValidatior
     *            Data validatior PId to apply
     *
     * @return Status|NULL
     */
    public function send(ContactParametersGroup $params, string $dataValidatior = ''): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::CONTACT)->method(self::POST)
                ->headers(strlen($dataValidatior)?[FormService::DATA_VALIDATOR_HEADER => $dataValidatior]:[])
                ->body($params)->build()),
            Status::class
        );
    }

    /**
     * Returns the website available query motives
     *
     * @return ElementCollection|NULL
     */
    public function getQueryMotives(): ?ElementCollection {
        $language = '';
        if(Cookie::exist('language')){
            $language = '?' . Cookie::get('language');
        }
        return $this->getElements(QueryMotive::class, Resource::CONTACT_MOTIVES . $language);
    }

    /**
     * Add the request to get the website available contacts
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetQueryMotives(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::CONTACT_MOTIVES)->build()
        );
    }
}

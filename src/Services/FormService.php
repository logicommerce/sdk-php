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
use SDK\Dtos\Catalog\DataValidation;
use SDK\Services\Parameters\Groups\CustomFormSendDataParametersGroup;
use SDK\Services\Parameters\Groups\CustomFormSendMailParametersGroup;
use SDK\Services\Parameters\Groups\DataValidationParametersGroup;

/**
 * This is the Data Validation service class.
 * This class will retrieve the Data Validations from LogiCommerce API and transform them to objects.
 * All the needed Data Validations operations previous to Framework must be done here.
 *
 * @see FormService::getDataValidations()
 * @see FormService::getDataValidation()
 * @see FormService::customFormSendData()
 * @see FormService::customFormSendMail()
 * @see DataValidation
 *
 * @see FormService::addGetDataValidations()
 * @see FormService::addGetDataValidation()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 * @uses CacheTrait
 * @see CacheTrait
 *
 * @package SDK\Services
 */
class FormService extends Service {
    use ServiceTrait, CacheTrait;

    private const REGISTRY_KEY = Registry::FORM_MODEL;

    public const DATA_VALIDATOR_HEADER = 'dataValidator';

    /**
     * Returns the website available data validations
     *
     * @param string $type
     *
     * @return ElementCollection|NULL
     */
    public function getDataValidations(string $type = ''): ?ElementCollection {
        $params = null;
        if (strlen($type) !== 0) {
            $params = new DataValidationParametersGroup();
            $params->setType($type);
        }
        return $this->getElements(DataValidation::class, Resource::DATA_VALIDATION, $params);
    }

    /**
     * Returns the data validation that matches the given public identifier
     *
     * @param int $id
     *
     * @return DataValidation|NULL
     */
    public function getDataValidation(int $id = 0): ?DataValidation {
        return $this->getElement(DataValidation::class, Resource::DATA_VALIDATION_ID, $id);
    }

    /**
     * Submit a form with information and custom fields.
     *
     * @param CustomFormSendDataParametersGroup $params
     *            object with the needed data to post the form to the API custom forms resource
     *
     * @return Status|NULL
     */
    public function customFormSendData(CustomFormSendDataParametersGroup $params = null): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::CUSTOM_FORM_SEND_DATA)->method(self::POST)->body($params)->build()),
            Status::class
        );
    }

    /**
     * Submit an email with information and attachments.
     *
     * @param CustomFormSendMailParametersGroup $params
     *            object with the needed data to post the form to the API custom forms resource
     *
     * @return Status|NULL
     */
    public function customFormSendMail(CustomFormSendMailParametersGroup $params = null, string $dataValidatior = ''): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::CUSTOM_FORM_SEND_MAIL)->method(self::POST)->body($params)->build()),
            Status::class
        );
    }

    /**
     * Add the request to get the website available data validations
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $type
     *
     * @return void
     */
    public function addGetDataValidations(BatchRequests $batchRequests, string $batchName, string $type = ''): void {
        $params = null;
        if (strlen($type) !== 0) {
            $params = new DataValidationParametersGroup();
            $params->setType($type);
        }
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::DATA_VALIDATION)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the data validation that matches the given public identifier
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetDataValidation(BatchRequests $batchRequests, string $batchName, int $id): void {
            $batchRequests->addRequest(
                (new BatchRequestBuilder())->requestId($batchName)->path(Resource::DATA_VALIDATION_ID)->pathParams(['id' => $id])->build()
            );
    }
}

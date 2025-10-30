<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Common\DataText;

/**
 * This is the legal texts service class.
 * This class will retrieve the legal texts from LogiCommerce API and transform them to objects.
 * All the needed trackers operations previous to Framework must be done here.
 *
 * @see LegalTextService::getTermsOfUse()
 * @see LegalTextService::getPrivacyPolicy()
 * @see DataText
 *
 * @see LegalTextService::addGetTermsOfUse()
 * @see LegalTextService::addGetPrivacyPolicy()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class LegalTextService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::LEGAL_TEXT_MODEL;

    /**
     * Returns the current assigned headquarter terms of use.
     *
     * @return DataText|NULL
     */
    public function getTermsOfUse(): ?DataText {
        return $this->getElement(DataText::class, Resource::LEGAL_TEXTS_TERMS_OF_USE);
    }

    /**
     * Returns the current assigned headquarter privacy policy.
     *
     * @return DataText|NULL
     */
    public function getPrivacyPolicy(): ?DataText {
        return $this->getElement(DataText::class, Resource::LEGAL_TEXTS_PRIVACY_POLICY);
    }

    /**
     * Add the request to get the current assigned headquarter terms of use.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetTermsOfUse(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::LEGAL_TEXTS_TERMS_OF_USE)->build()
        );
    }

    /**
     * Add the request to get the current assigned headquarter privacy policy.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetPrivacyPolicy(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::LEGAL_TEXTS_PRIVACY_POLICY)->build()
        );
    }
}

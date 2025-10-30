<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Application;
use SDK\Core\Dtos\Request;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\Environment;
use SDK\Core\Resources\Server;
use SDK\Core\Services\CacheTrait;
use SDK\Dtos\Licenses;

/**
 * This is the LMS Service service class.
 *
 * @see LmsService::getLicenses()
 * @see LmsService::getAllLicenses()
 *
 * @see Service
 *
 * @see ServiceTrait
 * 
 * @uses ServiceTrait
 *
 * @package SDK\Services
 */
class LmsService extends Service {
    use ServiceTrait;

    use CacheTrait {
        call as cacheTraitCall;
     }

    private const REGISTRY_KEY = Registry::LMS_MODEL;
    
    private function getCacheTtl(): int{
        return defined('LIFE_TIME_CACHE_APPLICATION')?LIFE_TIME_CACHE_APPLICATION:5*60;
    }

    private ?string $apiUrl = null;

    protected function call(Request $request, string $apiUrl = null): array {
        return $this->cacheTraitCall($request, $this->getApiURL());
    }

    private function getApiURL(): ?string {
        if (is_null($this->apiUrl)) {
            $this->apiUrl = Server::get('HTTP_LMS_API_URL') ?? Environment::get('LMS_API_URL');
            $apiPort = Server::get('HTTP_LMS_API_URL_PORT') ?? Environment::get('LMS_API_URL_PORT');
            if (!is_null($apiPort) && is_numeric($apiPort)) {
                $this->apiUrl .= ':' . $apiPort;
            }
        }
        return $this->apiUrl;
    }

    /**
     * Returns available licences
     *
     * @return Licenses|NULL
     */
    public function getLicenses(): ?Licenses {
        $licenses = Application::getInstance()->getEcommerceLicenses();
        if (is_null($licenses)) {
            $licenses = $this->getElement(Licenses::class, Resource::LICENSES);
        }
        return $licenses;
    }

    /**
     * Returns all licences
     *
     * @return Licenses|NULL
     */
    public function getAllLicenses(): ?Licenses {
        return $this->getElement(Licenses::class, Resource::LICENSES_ALL);
    }

}

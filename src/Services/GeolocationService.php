<?php declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Request;
use SDK\Core\Enums\Resource;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\Environment;
use SDK\Core\Resources\Server;
use SDK\Dtos\Country;
use SDK\Dtos\CountryLocation;
use SDK\Dtos\PostalCode;
use SDK\Services\Parameters\Groups\Geolocation\CountriesParametersGroup;
use SDK\Services\Parameters\Groups\Geolocation\LocalitiesParametersGroup;
use SDK\Services\Parameters\Groups\Geolocation\LocationParametersGroup;
use SDK\Services\Parameters\Groups\Geolocation\LocationPathParametersGroup;

/**
 * This is the geo-location service class.
 * This class will retrieve the geo-location data from LogiCommerce API and transform them to objects.
 * All the needed geo-location operations previous to Framework must be done here.
 *
 * @see GeolocationService::getCountries()
 * @see GeolocationService::getLocations()
 * @see GeolocationService::getLocalities()
 * @see GeolocationService::getLocationPath()
 * @see Country
 * @see CountryLocation
 * @see PostalCode
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class GeolocationService extends Service {
    use ServiceTrait;

    private const REGISTRY_KEY = Registry::GEOLOCATION_MODEL;

    private ?string $apiUrl = null;

    protected function call(Request $request, string $apiUrl = null): array {
        return parent::call($request, $this->getApiURL());
    }

    private function getApiURL(): ?string {
        if (is_null($this->apiUrl)) {
            $this->apiUrl = Server::get('HTTP_GEOLOCATION_API_URL') ?? Environment::get('GEOLOCATION_API_URL');
            $apiPort = Server::get('HTTP_GEOLOCATION_API_URL_PORT') ?? Environment::get('GEOLOCATION_API_URL_PORT');
            if (!is_null($apiPort) && is_numeric($apiPort)) {
                $this->apiUrl .= ':' . $apiPort;
            }
        }
        return $this->apiUrl;
    }

    /**
     * Returns the available countries
     *
     * @param string $languageCode
     *            Optional. String that sets the language for the countries to be returned.
     *
     * @return ElementCollection|NULL
     */
    public function getCountries(string $languageCode = null): ?ElementCollection {
        return $this->getElements(Country::class, Resource::COUNTRIES, $this->getCountriesParams($languageCode));
    }

    private function getCountriesParams(?string $languageCode): ?CountriesParametersGroup {
        if (is_null($languageCode)) {
            return null;
        }
        $params = new CountriesParametersGroup();
        $params->setLanguageCode($languageCode);
        return $params;
    }

    /**
     * Returns the locations of a country filtered with the given parameters
     *
     * @param LocationParametersGroup $params
     *            object with the needed filters to send to the API Geolocation resource
     *
     * @return ElementCollection|NULL
     */
    public function getLocations(LocationParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(CountryLocation::class, Resource::LOCATIONS, $params);
    }

    /**
     * Returns the postal codes of a country/location filtered with the given parameters
     *
     * @param LocalitiesParametersGroup $params
     *            object with the needed filters to send to the API Geolocation resource
     *
     * @return ElementCollection|NULL
     */
    public function getLocalities(LocalitiesParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(PostalCode::class, Resource::LOCATIONS_LOCALITIES, $params);
    }

    /**
     * Returns an array with the locations that form the path to the parameters given location
     *
     * @param LocationPathParametersGroup $params
     *            object with the needed filters to send to the API Geolocation resource
     *
     * @return ElementCollection|NULL
     */
    public function getLocationPath(LocationPathParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(CountryLocation::class, Resource::LOCATIONS_PATH, $params);
    }
}

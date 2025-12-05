<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Application;
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
use SDK\Dtos\Common\Plugin;
use SDK\Core\Dtos\PluginData;
use SDK\Dtos\Common\PluginData as DtosPluginData;
use SDK\Core\Dtos\PluginProperties;
use SDK\Dtos\Common\UserPlugin;
use SDK\Core\Dtos\Factories\PluginPropertiesFactory;
use SDK\Enums\PluginConnectorType;
use SDK\Core\Exceptions\PluginException;
use SDK\Dtos\Common\Asset;
use SDK\Core\Dtos\Factories\UserPluginPaymentTokenFactory;
use SDK\Enums\PluginEvents;
use SDK\Services\Parameters\Groups\AssetParametersGroup;
use SDK\Services\Parameters\Groups\PluginDataParametersGroup;
use SDK\Services\Parameters\Groups\PluginConnectorTypeParametersGroup;
use SDK\Services\Parameters\Groups\PluginPropertiesParametersGroup;
use SDK\Services\Parameters\Groups\WebhookParametersGroup;
use SDK\Dtos\WebhookResponse;
use SDK\Services\Parameters\Groups\PluginModuleParametersGroup;

/**
 * This is the plugin service class.
 * This class will retrieve the plugins from LogiCommerce API and transform them to objects.
 * All the needed plugins operations previous to Framework must be done here.
 *
 * @see PluginService::getPlugins()
 * @see PluginService::getPluginProperties()
 * @see PluginService::executePluginData()
 * @see PluginService::getUserPluginProperties()
 * @see PluginService::deleteUserPluginProperties()
 * @see PluginService::getUserPluginPaymentTokens()
 * @see PluginService::deleteUserPluginPaymentTokens()
 * @see PluginService::getActionParametersGroup()
 * @see PluginService::getModuleTriggers()
 * 
 * @see Plugin
 * @see PluginData
 * @see UserPlugin
 * @see UserPluginProperties
 *
 * @see PluginService::addGetPlugins()
 * @see PluginService::addGetPluginProperties()
 * @see PluginService::addGetUserPluginProperties()
 * @see PluginService::addGetUserPluginPaymentTokens()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @package SDK\Services
 */
class PluginService extends Service {
    use ServiceTrait, CacheTrait;

    private const REGISTRY_KEY = Registry::PLUGIN_MODEL;

    private function getCacheTtl(): int {
        return defined('LIFE_TIME_CACHE_PLUGINS') ? LIFE_TIME_CACHE_PLUGINS : 5 * 60;
    }

    /**
     * Returns the website available asset
     *
     * @param AssetParametersGroup $params
     *            object with the needed filters to send to the API asset resource
     *
     * @return ElementCollection|NULL
     */
    public function getAssets(AssetParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Asset::class, Resource::ASSETS, $params);
    }

    /**
     * Returns the Commerce plugin collection.
     *
     * @param PluginConnectorTypeParametersGroup|string $params object with the needed filters to send to the API. As default filter by type PluginConnectorType::NONE, 
     * as string, filter by sended type, as PluginConnectorTypeParametersGroup filter by it's parameters
     *
     * @return ElementCollection|NULL
     */
    public function getPlugins(PluginConnectorTypeParametersGroup|string $params = PluginConnectorType::NONE): ?ElementCollection {
        $plugins = null;
        if (
            $params === PluginConnectorType::NONE
            || ($params instanceof PluginConnectorTypeParametersGroup && $params->getType() === PluginConnectorType::NONE)
        ) {
            $plugins = Application::getInstance()->getEcommercePlugins();
        }
        if (is_null($plugins)) {
            if ($params instanceof PluginConnectorTypeParametersGroup) {
                $pluginConnectorTypeParametersGroup = $params;
            } else {
                $pluginConnectorTypeParametersGroup = $this->getPluginsTypeParams($params);
            }
            $plugins = $this->getElements(Plugin::class, Resource::PLUGINS, $pluginConnectorTypeParametersGroup);
        }
        return $plugins;
    }

    /**
     * Returns the Commerce plugin collection by module.
     *
     * @param PluginModuleParametersGroup|string $params object with the needed filters to send to the API. As default filter by type PluginConnectorType::NONE,
     * as string, filter by sended type, as PluginModuleParametersGroup filter by it's parameters
     *
     * @return ElementCollection|NULL
     */
    public function getPluginsByModule(PluginModuleParametersGroup $params): ?array {
        $plugins = Application::getInstance()->getEcommercePlugins();
        if (is_null($plugins)) {
            $plugins = $this->getElements(Plugin::class, Resource::PLUGINS, $params);
        }
        $pluginsModule = [];
        foreach ($plugins->getItems() as $plugin) {
            /** @var Plugin $plugin */
            if ($plugin->getModule() != $params->getModule()) {
                $pluginsModule[] = $plugin;
            }
        }
        return $pluginsModule;
    }

    /**
     * Returns the plugin properties by the given id
     *
     * @param int $id
     *
     * @return PluginProperties|NULL
     */
    public function getPluginProperties(int $id): ?PluginProperties {
        return $this->getElement(PluginPropertiesFactory::class, Resource::PLUGINS_ID_PROPERTIES, $id);
    }

    /**
     * Returns the plugin properties by the given module name
     *
     * @param string $module
     *
     * @return PluginProperties|NULL
     */
    public function getPluginPropertiesByModule(string $module): ?PluginProperties {
        return $this->getResourceElement(PluginPropertiesFactory::class, Resource::PLUGINS_PROPERTIES, $this->getPluginPropertiesParams($module));
    }

    /**
     * Returns the plugin properties for the current user
     *
     * @param string $type
     *
     * @return ElementCollection|NULL
     */
    public function getUserPluginProperties(string $type): ?ElementCollection {
        return $this->getElements(UserPlugin::class, Resource::ACCOUNTS_PLUGIN_PROPERTIES, $this->getPluginsTypeParams($type));
    }

    /**
     * Returns the plugin payment tokens for the current user
     *
     * @param string $type
     *
     * @return ElementCollection|NULL
     */
    public function getUserPluginPaymentTokens(int $id): ?ElementCollection {
        return $this->getElements(UserPluginPaymentTokenFactory::class, $this->replaceWildcards(Resource::ACCOUNTS_PLUGIN_ID_PAYMENT_TOKENS, ['id' => $id]));
    }

    /**
     * Delete the plugin properties for the current user with the given id
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function deleteUserPluginProperties(int $id): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ACCOUNTS_PLUGIN_PROPERTIES_ID)->method(self::DELETE)->pathParams(['id' => $id])->build()
            ),
            Status::class
        );
    }

    /**
     * Delete the plugin payment tokens for the current user with the given id and token
     *
     * @param int $id
     * @param string $token
     *
     * @return Status|NULL
     */
    public function deleteUserPluginPaymentTokens(int $id, string $token): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ACCOUNTS_PLUGIN_ID_PAYMENT_DELETE_TOKEN)->method(self::DELETE)->pathParams(['id' => $id, 'token' => urlencode($token)])->build()
            ),
            Status::class
        );
    }

    /**
     * Execute the given action over the given plugin
     *
     * @param int $id
     * 
     * @param string $module
     * 
     * @param PluginDataParametersGroup $params
     *            object with the needed filters to send to the API pluginData resource
     *
     * @return PluginData|NULL
     */
    public function executePluginData(int $id, string $module, PluginDataParametersGroup $params): ?PluginData {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::PLUGINS_ID_EXECUTE)->method(self::POST)->pathParams(['id' => $id])->body($params)
                    ->build()
            ),
            $this->getModuleClass($module, $params->getAction())
        );
    }

    private function getActionParametersGroupClass(string $module, string $action, string $validatorInterface = ''): string {
        $class = 'Plugins\\' . str_replace('.', '', ucwords(strtolower($module), '.')) . '\Resources\ActionsParametersGroupFactories\\' . ucwords($action);
        if (!class_exists($class)) {
            throw new PluginException(
                'Undefined class: ' . $class . ' , for action: ' . $action,
                PluginException::UNDEFINED_ACTION_PARAMETERS_GROUP_CLASS
            );
        }
        if (strlen($validatorInterface)) {
            $interfaces = class_implements($class);
            if (!isset($interfaces[$validatorInterface])) {
                throw new PluginException(
                    'Interface validation failed for class: ' . $class . ' , and validate interface: ' . $validatorInterface,
                    PluginException::INTERFACE_VALIDATION_FAILED
                );
            }
        }
        return $class;
    }

    private function getModuleClass(string $module, string $action): string {
        $class = 'Plugins\\' . str_replace('.', '', ucwords(strtolower($module), '.')) . '\Dtos\Common\PluginData' . ucwords($action);
        if (!class_exists($class)) {
            $class = DtosPluginData::class;
        }
        return $class;
    }

    /**
     * Execute the given action over the given plugin
     *
     * @param string $triggerName
     * 
     * @param string $module
     * 
     * @param string $action
     * 
     * @param $data
     *            object with the needed filters to send to the API pluginData resource
     *
     * @return PluginData|NULL
     */

    public function getActionParametersGroup(string $triggerName, string $module, string $action, $data = null): PluginDataParametersGroup {

        switch ($triggerName) {
            case PluginEvents::SELECT_PAYMENT_SYSTEM:
                $class = $this->getActionParametersGroupClass($module, $action, 'SDK\Core\Interfaces\PluginActionSelectPaymentSystemInterface');
                return (new $class($data))->getParametersGroup();
                break;
            case PluginEvents::LOGIN_EVENT:
                $class = $this->getActionParametersGroupClass($module, $action);
                return (new $class($data))->getParametersGroup();
                break;
            default:
                throw new PluginException("Undefined parametergroup for triggerName: " . $triggerName, PluginException::UNDEFINED_PARAMETER_GROUP_FOR_TRIGGER_NAME);
        }
    }

    /**
     * Return all triggers for a plugin module
     *
     * @param string $module
     *            the name of the module for the request of triggers.
     *
     * @return array
     */

    public function getModuleTriggers(string $module): array {
        $class = 'Plugins\\' . str_replace('.', '', ucwords(strtolower($module), '.')) . '\Resources\Triggers';

        if (class_exists($class)) {
            $interfaces = class_implements($class);
            if (!isset($interfaces['SDK\Core\Interfaces\PluginTriggers'])) {
                throw new PluginException(
                    'Interface validation failed for class: ' .  $class . ', must implement SDK\Core\Interfaces\PluginTriggers',
                    PluginException::INTERFACE_VALIDATION_FAILED
                );
            }
            return $class::getTriggers();
        }
        return [];
    }

    /**
     * Add the request to get the website available asset
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param AssetParametersGroup $params
     *            object with the needed filters to send to the API asset resource
     *
     * @return void
     */
    public function addGetAssets(BatchRequests $batchRequests, string $batchName, AssetParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ASSETS)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the Commerce plugin collection
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param PluginConnectorTypeParametersGroup|string $params object with the needed filters to send to the API. As default filter by type PluginConnectorType::NONE, 
     * as string, filter by sended type, as PluginConnectorTypeParametersGroup filter by it's parameters
     *
     * @return void
     */
    public function addGetPlugins(BatchRequests $batchRequests, string $batchName, PluginConnectorTypeParametersGroup|string $params = PluginConnectorType::NONE): void {
        if ($params instanceof PluginConnectorTypeParametersGroup) {
            $pluginConnectorTypeParametersGroup = $this->getPluginsTypeParams($params->getType());
        } else {
            $pluginConnectorTypeParametersGroup = $this->getPluginsTypeParams($params);
        }
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::PLUGINS)->urlParams($pluginConnectorTypeParametersGroup)
                ->build()
        );
    }

    /**
     * Add the request to get the plugin properties by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetPluginProperties(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::PLUGINS_ID_PROPERTIES)->pathParams(['id' => $id])
                ->build()
        );
    }

    /**
     * Add the request to get the plugin properties by the given module
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $module
     *
     * @return void
     */
    public function addGetPluginPropertiesByModule(BatchRequests $batchRequests, string $batchName, string $module): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::PLUGINS_PROPERTIES)->urlParams($this->getPluginPropertiesParams($module))
                ->build()
        );
    }

    /**
     * Add the request to get the plugin properties for the current user
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $type
     *
     * @return void
     */
    public function addGetUserPluginProperties(BatchRequests $batchRequests, string $batchName, string $type): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNTS_PLUGIN_PROPERTIES)->urlParams($this->getPluginsTypeParams($type))
                ->build()
        );
    }

    /**
     * Add the request to get the plugin payment system tokens for the current user
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $type
     *
     * @return void
     */
    public function addGetUserPluginPaymentTokens(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNTS_PLUGIN_ID_PAYMENT_TOKENS)->pathParams(['id' => $id])
                ->build()

        );
    }

    private function getPluginsTypeParams(string $type): PluginConnectorTypeParametersGroup {
        $params = new PluginConnectorTypeParametersGroup();
        $params->setType($type);
        return $params;
    }

    private function getPluginPropertiesParams(string $module): PluginPropertiesParametersGroup {
        $params = new PluginPropertiesParametersGroup();
        $params->setModule($module);
        return $params;
    }

    /**
     * Process the webhook call.
     *
     * @param string $pluginModule
     * @param WebhookParametersGroup|null $webhookParametersGroup If no set, will be created from $_GET + $_POST
     *
     * @return Status|NULL
     */
    public function webhookProcess(?string $pluginModule, ?WebhookParametersGroup $webhookParametersGroup = null): ?WebhookResponse {
        $webhookParameters = $this->getWebhookParameters($pluginModule, $webhookParametersGroup);
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::WEBHOOK)->method(self::POST)->body($webhookParameters)
                    ->build()
            ),
            WebhookResponse::class
        );
    }

    private function getWebhookParameters(?string $pluginModule, ?WebhookParametersGroup $webhookParametersGroup): WebhookParametersGroup {
        if (!is_null($webhookParametersGroup)) {
            if (!is_null($pluginModule)) {
                $webhookParametersGroup->setPluginModule($pluginModule);
            }
            $webhookParametersGroup->setPluginModule($pluginModule);
            return $webhookParametersGroup;
        }
        $webhookParametersGroup = new WebhookParametersGroup();
        $webhookParametersGroup->setParams($_GET + $_POST);
        if (!is_null($pluginModule)) {
            $webhookParametersGroup->setPluginModule($pluginModule);
        }
        $jsonBody = file_get_contents('php://input');
        $body = json_decode($jsonBody, true);
        if (!is_null($body)) {
            $simplifiedBody = [];
            foreach ($body as $key => $value) {
                $simplifiedBody[$key] = is_array($value) || is_object($value) ? json_encode($value) : $value;
            }
            $webhookParametersGroup->setBody($jsonBody);
            $webhookParametersGroup->setParams($_GET + $_POST + $simplifiedBody);
        }
        return $webhookParametersGroup;
    }
}

<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the webhook parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Document
 */
class WebhookParametersValidator extends ParametersValidator {

    protected function validateParams($params): ?bool {
        return $this->validateAssociativeArray($params);
    }

    protected function validateBody($body): ?bool {
        return $this->validateString($body,0);
    }

    protected function validatePluginModule($pluginModule): ?bool {
        return $this->validateString($pluginModule,0);
    }
}

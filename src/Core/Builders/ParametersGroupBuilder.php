<?php declare(strict_types=1);

namespace SDK\Core\Builders;

use SDK\Core\Exceptions\BuilderException;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;

/**
 * This is the builder to dinamically create prameters groups.
 *
 * @see ParametersGroupBuilder::build()
 *
 * @see Builder
 *
 * @package SDK\Core\Builders
 */
class ParametersGroupBuilder extends Builder {

    protected function getMainClass(): string {
        return ParametersGroup::class;
    }

    /**
     * Returns the created prameters group.
     *
     * @return ParametersGroup
     * @throws BuilderException
     */
    public function build(): ParametersGroup {
        $parametersGroup = new $this->class();
        foreach ($this->data as $key => $value) {
            $method = 'set' . $key;
            if (!method_exists($parametersGroup, $method)) {
                throw new BuilderException(
                    'Invalid property "' . $key . '" on "' . $this->class . '" class.',
                    BuilderException::INVALID_CLASS
                );
            }
            $parametersGroup->$method($value);
        }
        return $parametersGroup;
    }
}

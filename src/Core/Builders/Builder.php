<?php declare(strict_types=1);

namespace SDK\Core\Builders;

use SDK\Core\Exceptions\BuilderException;

/**
 * This is the main builder to dinamically create objects.
 *
 * @package SDK\Core\Builders
 */
abstract class Builder {

    protected array $data = [];

    protected string $class;

    abstract protected function getMainClass(): string;

    abstract public function build();

    /**
     * Elements constructor.
     *
     * @param string $class
     *            The class we want to build with this builder.
     * @throws BuilderException
     */
    public function __construct(string $class) {
        if (!$this->validBuildClass($class)) {
            throw new BuilderException(
                'Invalid class "' . $class . '". This builder only accepts subclasses of "' . $this->getMainClass() . '" class.',
                BuilderException::INVALID_CLASS
            );
        }
        $this->class = $class;
    }

    protected function validBuildClass(string $class): bool {
        $mainClass = $this->getMainClass();
        return $class === $mainClass || is_subclass_of($class, $mainClass);
    }

    /**
     * Triggered when invoking "property methods" on the extended builders
     *
     * @param string $name
     *            The name of the triggered method.
     * @param array $varargs
     *            The arguments used on the method. Only one per method accepted.
     *
     * @throws BuilderException
     */
    public function __call(string $name, array $varargs) {
        if (count($varargs) !== 1) {
            throw new BuilderException('The builders methods only accept one parameter.', BuilderException::TOO_MANY_PARAMETERS);
        }
        $this->data[$name] = $varargs[0];
        return $this;
    }
}

<?php declare(strict_types=1);

namespace SDK\Core\Resources;

use SDK\Core\Dtos\Element;

/**
 * This is the Interceptor
 *
 * @see Interceptor::getInstance()
 * @see Interceptor::execute()
 *
 * @package SDK\Core\Resources
 */
abstract class Interceptor {

    protected static $instance = null;

    /**
     * This method executes the interceptor
     *
     * @abstract
     *
     * @param Element $element
     *
     * @return void
     */
    abstract public function execute(Element $element): void;

    final private function __construct() {
    }

    /**
     * This method returns the Interceptor (singleton)
     *
     * @return Interceptor
     */
    final public static function getInstance(): Interceptor {
        if(self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }


}

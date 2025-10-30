<?php declare(strict_types=1);

namespace SDK\Core\Interfaces;

use SDK\Dtos\Basket\Basket;

/**
 * This is the PluginActionSelectPaymentSystemInterface interface
 *
 * @see PluginActionSelectPaymentSystemInterface::__construct()
 *
 * @see Request
 *
 * @package SDK\Core\Interfaces
 */
interface PluginActionSelectPaymentSystemInterface extends PluginActionInterface{

    public function __construct(Basket $basket);

}

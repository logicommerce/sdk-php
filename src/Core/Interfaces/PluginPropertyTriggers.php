<?php declare(strict_types=1);

namespace SDK\Core\Interfaces;

/**
 * This is the PluginPropertyTriggers interface
 *
 * @see PluginPropertyTriggers::getTriggers()
 *
 * @package SDK\Core\Interfaces
 */
interface PluginPropertyTriggers {

    public function getEventsResults(): array;

    public function setEventResults(string $trigger, array $results);    

}
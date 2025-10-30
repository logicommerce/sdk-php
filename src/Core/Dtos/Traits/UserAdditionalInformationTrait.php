<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Resources\Date;
use SDK\Dtos\Basket\Channel;
use SDK\Enums\SessionType;

/**
 * This is the theme trait.
 *
 * @see UserAdditionalInformation::getLastVisit()
 * @see UserAdditionalInformation::getReferer()
 * @see UserAdditionalInformation::getUserAgent()
 * @see UserAdditionalInformation::getChannel()
 * @see UserAdditionalInformation::getSimulateUser()
 * @see UserAdditionalInformation::getNavigationHash()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait UserAdditionalInformationTrait {
    use EnumResolverTrait;

    protected ?Date $lastVisit = null;
    protected string $referer = '';
    protected string $userAgent = '';
    protected ?Channel $channel = null;
    protected bool $simulatedUser = false;
    protected string $navigationHash = '';
    protected SessionType $sessionType = SessionType::ANONYMOUS;

    /**
     * Returns the user lastVisit.
     *
     * @return Date|NULL
     */
    public function getLastVisit(): ?Date {
        return $this->lastVisit;
    }

    protected function setLastVisit(string $lastVisit): void {
        $this->setLastVisitFromDate(Date::create($lastVisit));
    }

    public function setLastVisitFromDate(?Date $lastVisit): void {
        $this->lastVisit = $lastVisit;
    }

    /**
     * Returns the user referer.
     *
     * @return string
     */
    public function getReferer(): string {
        return $this->referer;
    }

    public function setReferer(string $referer): void {
        $this->referer = $referer;
    }

    /**
     * Returns the user userAgent.
     *
     * @return string
     */
    public function getUserAgent(): string {
        return $this->userAgent;
    }

    public function setUserAgent(string $userAgent): void {
        $this->userAgent = $userAgent;
    }

    /**
     * Returns the user navigationHash.
     *
     * @return string
     */
    public function getNavigationHash(): string {
        return $this->navigationHash;
    }

    public function setNavigationHash(string $navigationHash): void {
        $this->navigationHash = $navigationHash;
    }

    /**
     * Returns the user channel.
     *
     * @return Channel|NULL
     */
    public function getChannel(): ?Channel {
        return $this->channel;
    }

    public function defineChannel(?Channel $channel): void {
        if (is_null($channel)) {
            $this->channel = null;
            return;
        }
        if ($channel instanceof Channel) {
            $this->channel = $channel;
        } else if (is_array($channel)) {
            $this->channel = new Channel($channel);
        }
    }

    protected function setChannel(array $channel): void {
        $this->channel = new Channel($channel);
    }

    /**
     * Returns the simulated user data.
     *
     * @return bool
     */
    public function getSimulatedUser(): bool {
        return $this->simulatedUser;
    }

    public function setSimulatedUser(bool $simulatedUser): void {
        $this->simulatedUser = $simulatedUser;
    }

    /**
     * Returns the type of session. It can be <em>ANONYMOUS</em> or <em>REGISTERED</em>.
     *
     * @return SessionType
     */
    public function getSessionType(): SessionType {
        return  $this->sessionType;
    }

    protected function setSessionType(string $sessionType): void {
        $this->sessionType = SessionType::from($sessionType);
    }
}

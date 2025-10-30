<?php

declare(strict_types=1);

namespace SDK\Core\Resources;

use Predis\Client;
use SDK\Enums\RedisKey;


/**
 * This class will manage the Redis sessions.
 *
 * @see RedisSessionHandler::open()
 * @see RedisSessionHandler::close()
 * @see RedisSessionHandler::read()
 * @see RedisSessionHandler::write()
 * @see RedisSessionHandler::destroy()
 * @see RedisSessionHandler::gc()
 *
 * @package SDK\Core\Resources
 */
final class RedisSessionHandler implements \SessionHandlerInterface {

    /**
     * Variable that sets the session ttl.
     *
     * @var int
     */
    public int $ttl = 7500;

    protected ?Client $db;

    protected string $prefix;

    /**
     * Sets a header with the given key and value.
     *
     * @param Client $db
     *            The PRedis Client we're going to use on this session
     */
    public function __construct(Client $db = null) {
        $this->db = $this->getRedisConnection($db);
        $this->prefix = Redis::getKeyPrefix() . RedisKey::SESSION . ':';
        if (defined("REQUEST_HEADERS") &&  isset(REQUEST_HEADERS['X-IS-BOT']) && REQUEST_HEADERS['X-IS-BOT'] === '1') {
            $this->ttl = LIFE_TIME_SESSION_BOT;
        } else {
            $this->ttl = LIFE_TIME_SESSION;
        }
    }

    private function getRedisConnection(?Client $db): Client {
        if (is_null($db)) {
            $db = Redis::getRedisConnection();
        }
        return $db;
    }

    /**
     * Unused method when managing sessions with Redis
     *
     * @return bool
     */
    public function open(string $path, string $name): bool {
        // No action necessary because connection is injected in constructor and arguments are not applicable.
        return true;
    }

    /**
     * Close the connection with the Redis client.
     *
     * @return bool
     */
    public function close(): bool {
        $this->db->disconnect();
        $this->db = null;
        unset($this->db);
        return true;
    }

    /**
     * Read session data
     *
     * @param string $id
     *            The session id.
     *
     * @return string
     */
    public function read(string $id): string|false {
        $id = $this->prefix . $id;
        $sessData = $this->db->get($id);
        if (is_null($sessData)) {
            return '';
        }
        $this->db->expire($id, $this->ttl);
        return $sessData;
    }

    /**
     * Write session data
     *
     * @param string $id
     *            The session id.
     * @param string $data
     *            The encoded session data. This data is the result of the PHP internally encoding the $_SESSION superglobal to a serialized
     *            string and passing it as this parameter. Please note sessions use an alternative serialization method.
     *
     * @return bool
     */
    public function write(string $id, string $data): bool {
        $id = $this->prefix . $id;
        $this->db->set($id, $data);
        $this->db->expire($id, $this->ttl);
        return true;
    }

    /**
     * Destroy a session
     *
     * @param string $id
     *            The session ID being destroyed.
     *
     * @return bool
     */
    public function destroy(string $id): bool {
        $this->db->del($this->prefix . $id);
        return true;
    }

    /**
     * Unused method when managing sessions with Redis
     *
     * @param int $maxlifetime
     *            Sessions that have not updated for the last maxlifetime seconds will be removed.
     *
     * @return int
     */
    public function gc(int $max_lifetime): int|false {
        // no action necessary because using EXPIRE
        return 0;
    }
}

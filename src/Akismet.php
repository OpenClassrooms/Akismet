<?php

namespace OpenClassrooms\Akismet;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class Akismet
{
    const HOST = 'rest.akismet.com';
    const VERSION = '1.1';
    const PORT = 443;
    const DEFAULT_USER_AGENT = 'Akismet/2.5.9';

    /**
     * The Http Request User Agent
     *
     * @var string
     */
    private static $userAgent = self::DEFAULT_USER_AGENT;

    /**
     * Get the Http Request User Agent
     *
     * @return string
     */
    public static function getUserAgent()
    {
        return self::$userAgent;
    }

    /**
     * Set the Http Request User Agent
     *
     * @param string $userAgent
     */
    public function setUserAgent($userAgent)
    {
        self::$userAgent = $userAgent;
    }
}

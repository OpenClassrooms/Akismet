<?php


namespace OpenClassrooms\Akismet\Tests\Client;

use OpenClassrooms\Akismet\Client\Client;
use OpenClassrooms\Akismet\Client\Impl\ClientImpl;

/**
 * Class ClientImplTest
 *
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class ClientImplTest extends \PHPUnit_Framework_TestCase
{
    const KEY = '123ApiKey';
    const BLOG = 'http://yourblogdomainname.com';

    /**
     * @var Client
     */
    private $client;

    /**
     * @test
     */
    public function Construct()
    {
        $reflectionClass = new \ReflectionClass($this->client);
        $guzzleProperty = $reflectionClass->getProperty('guzzle');
        $guzzleProperty->setAccessible(true);
        /** @var \GuzzleHttp\Client $guzzle */
        $guzzle = $guzzleProperty->getValue($this->client);

        $this->assertEquals('https://' . self::KEY . '.rest.akismet.com/1.1/', $guzzle->getBaseUrl());
    }

    protected function setUp()
    {
        $this->client = new ClientImpl(self::KEY, self::BLOG);
    }
}

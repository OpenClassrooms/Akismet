<?php

namespace OpenClassrooms\Akismet\Client\Impl;

use GuzzleHttp\ClientInterface;
use OpenClassrooms\Akismet\Client\Client;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class ClientImpl implements Client
{

    /**
     * The front page or home URL of the instance making the request.
     * For a blog, site, or wiki this would be the front page.
     *
     * Note: Must be a full URI, including http://.
     *
     * @var string
     */
    private $blogUrl;

    /**
     * @var ClientInterface
     */
    private $guzzle;

    /**
     * @param string $key The API key
     */
    public function __construct($key, $blogUrl)
    {
        $this->blogUrl = $blogUrl;
        $this->guzzle = new \GuzzleHttp\Client(array('base_url' => 'https://' . $key . '.rest.akismet.com/1.1/'));
    }

    /**
     * {@inheritdoc}
     */
    public function post($resource, array $params)
    {

        $params['blog'] = $this->blogUrl;

        $response = $this->guzzle->post($resource, $params);

        return $response->getBody();
    }
}

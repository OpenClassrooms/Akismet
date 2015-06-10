<?php

namespace OpenClassrooms\Akismet\Client;

use OpenClassrooms\Akismet\Akismet;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class ClientImpl implements Client
{

    /**
     * The API key
     *
     * @var string
     */
    private $key;

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
     * @param string $key
     * @param string $blogUrl
     */
    public function __construct($key, $blogUrl)
    {
        $this->key = $key;
        $this->blogUrl = $blogUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function send($path, array $params)
    {
        $http_request = $this->createHttpRequest($path, $params);

        $subdomain = '';
        if ('verify-key' !== $path) {
            $subdomain = $this->key;
            $params['blog'] = $this->blogUrl;
        }

        $connection = fsockopen('ssl://' . $subdomain . Akismet::HOST, Akismet::PORT, $errno, $errstr, 10);
        $response = '';

        if (false !== $connection) {
            fwrite($connection, $http_request);
            while (!feof($connection)) {
                $response .= fgets($connection, 1160);
            }
            fclose($connection);
            list($header, $response) = explode("\r\n\r\n", $response);
        }

        return \trim($response);
    }

    private function createHttpRequest($path, array $params)
    {
        $content = http_build_query($params);

        $http_request = array(
            'POST ' . Akismet::VERSION . '/' . $path . ' HTTP/1.0',
            'Host: ' . Akismet::HOST,
            'Content-Type: application/x-www-form-urlencoded',
            'Content-Length: ' . strlen($content),
            'User-Agent: ' . Akismet::getUserAgent(),
            '',
            $content
        );

        return implode('\r\n', $http_request);
    }

}

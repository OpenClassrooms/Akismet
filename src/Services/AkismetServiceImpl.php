<?php

namespace OpenClassrooms\Akismet\Services;

use OpenClassrooms\Akismet\Client\Client;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class AkismetServiceImpl implements AkismetService
{

    /**
     * @var Client
     */
    private $client;

    /**
     * Set an Akismet client
     *
     * @param Client $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function verifyKey($key, $blog)
    {
        $params = array(
            'key'  => $key,
            'blog' => $blog
        );

        $response = $this->client->send('verify-key', $params);

        return 'valid' === $response;
    }

    /**
     * {@inheritdoc}
     */
    public function commentCheck(
        $userIp,
        $userAgent,
        $commentAuthor,
        $commentAuthorEmail,
        $commentContent
    ) {
        $params = array(
            'user_ip'              => $userIp,
            'user_agent'           => $userAgent,
            'comment_author'       => $commentAuthor,
            'comment_author_email' => $commentAuthorEmail,
            'comment_content'      => $commentContent
        );

        $response = $this->client->send('comment-check', $params);

        return 'true' === $response;
    }
}

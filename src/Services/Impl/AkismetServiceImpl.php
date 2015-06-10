<?php

namespace OpenClassrooms\Akismet\Services\Impl;

use OpenClassrooms\Akismet\Client\Client;
use OpenClassrooms\Akismet\Models\Impl\Comment;
use OpenClassrooms\Akismet\Services\AkismetService;

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
     * @param Client $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function commentCheck(Comment $comment)
    {
        $params = array(
            'user_ip'              => $comment->userIp,
            'user_agent'           => $comment->userAgent,
            'referrer'             => $comment->referrer,
            'permalink'            => $comment->permalink,
            'comment_author'       => $comment->authorName,
            'comment_author_email' => $comment->authorEmail,
            'comment_content'      => $comment->content
        );

        return $this->client->post(self::RESOURCE, $params);
    }
}

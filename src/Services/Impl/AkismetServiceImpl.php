<?php

namespace OpenClassrooms\Akismet\Services\Impl;

use OpenClassrooms\Akismet\Client\Client;
use OpenClassrooms\Akismet\Models\Comment;
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
            'user_ip'              => $comment->getUserIp(),
            'user_agent'           => $comment->getUserAgent(),
            'referrer'             => $comment->getReferrer(),
            'permalink'            => $comment->getPermalink(),
            'comment_author'       => $comment->getAuthorName(),
            'comment_author_email' => $comment->getAuthorEmail(),
            'comment_content'      => $comment->getContent()
        );

        return true === $this->client->post(self::RESOURCE, $params);
    }
}

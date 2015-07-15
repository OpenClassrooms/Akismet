<?php

namespace OpenClassrooms\Akismet\Services\Impl;

use OpenClassrooms\Akismet\Models\Resource;
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
        return 'true' === $this->client->post(Resource::COMMENT_CHECK, $comment->toArray());
    }

    /**
     * {@inheritdoc}
     */
    public function submitSpam(Comment $comment)
    {
        $response = $this->client->post(Resource::SUBMIT_SPAM, $comment->toArray());

        if ('Thanks for making the web a better place.' !== $response )
        {
            throw new \Exception('The Spam has not been submit.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitHam(Comment $comment)
    {
        $response = $this->client->post(Resource::SUBMIT_HAM, $comment->toArray());

        if ('Thanks for making the web a better place.' !== $response )
        {
            throw new \Exception('The Ham has not been submit.');
        }
    }
}

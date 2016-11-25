<?php

namespace OpenClassrooms\Akismet\Services\Impl;

use OpenClassrooms\Akismet\Client\ApiClient;
use OpenClassrooms\Akismet\Models\Comment;
use OpenClassrooms\Akismet\Models\Resource;
use OpenClassrooms\Akismet\Services\AkismetService;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class AkismetServiceImpl implements AkismetService
{

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @param ApiClient $apiClient
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * {@inheritdoc}
     */
    public function commentCheck(Comment $comment)
    {
        return 'true' === $this->apiClient->post(Resource::COMMENT_CHECK, $comment->toArray());
    }

    /**
     * {@inheritdoc}
     */
    public function submitSpam(Comment $comment)
    {
        $this->apiClient->post(Resource::SUBMIT_SPAM, $comment->toArray());
    }

    /**
     * {@inheritdoc}
     */
    public function submitHam(Comment $comment)
    {
        $this->apiClient->post(Resource::SUBMIT_HAM, $comment->toArray());
    }
}

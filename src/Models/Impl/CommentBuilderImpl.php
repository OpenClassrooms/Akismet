<?php

namespace OpenClassrooms\Akismet\Models\Impl;

use OpenClassrooms\Akismet\Models\CommentBuilder;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class CommentBuilderImpl implements CommentBuilder
{

    /**
     * @var Comment
     */
    private $comment;

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $this->comment = new Comment();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withUserIp($userIp)
    {
        $this->comment->userIp = $userIp;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withUserAgent($userAgent)
    {
        $this->comment->userAgent = $userAgent;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withReferrer($referrer)
    {
        $this->comment->referrer = $referrer;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withPermalink($permalink)
    {
        $this->comment->permalink = $permalink;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withAuthorName($authorName)
    {
        $this->comment->authorName = $authorName;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withAuthorEmail($authorEmail)
    {
        $this->comment->authorEmail = $authorEmail;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withContent($content)
    {
        $this->comment->content = $content;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        return $this->comment;
    }
}

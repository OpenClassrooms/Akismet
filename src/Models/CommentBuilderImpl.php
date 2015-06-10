<?php

namespace OpenClassrooms\Akismet\Models;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class CommentBuilderImpl
{

    /**
     * @var Comment
     */
    private $comment;

    /**
     * @return CommentBuilderImpl
     */
    public function create()
    {
        $this->comment = new Comment();

        return $this;
    }

    /**
     * @param string $userIp
     *
     * @return CommentBuilderImpl
     */
    public function withUserIp($userIp)
    {
        $this->comment->userIp = $userIp;

        return $this;
    }

    /**
     * @param string $userAgent
     *
     * @return CommentBuilderImpl
     */
    public function withUserAgent($userAgent)
    {
        $this->comment->userAgent = $userAgent;

        return $this;
    }

    /**
     * @param string $authorName
     *
     * @return CommentBuilderImpl
     */
    public function withAuthorName($authorName)
    {
        $this->comment->authorName = $authorName;

        return $this;
    }

    /**
     * @param string $authorEmail
     *
     * @return CommentBuilderImpl
     */
    public function withAuthorEmail($authorEmail)
    {
        $this->comment->authorEmail = $authorEmail;

        return $this;
    }

    /**
     * @param string $content
     *
     * @return CommentBuilderImpl
     */
    public function withContent($content)
    {
        $this->comment->content = $content;

        return $this;
    }

    /**
     * @return Comment
     */
    public function build()
    {
        return $this->comment;
    }
}

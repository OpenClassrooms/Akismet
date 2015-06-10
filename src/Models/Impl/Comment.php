<?php

namespace OpenClassrooms\Akismet\Models\Impl;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class Comment
{

    /**
     * IP address of the comment submitter.
     *
     * @var string
     */
    public $userIp;

    /**
     * User agent string of the web browser submitting the comment - typically the HTTP_USER_AGENT cgi variable.
     * Not to be confused with the user agent of your Akismet library.
     *
     * @var string
     */
    public $userAgent;

    /**
     * The content of the HTTP_REFERER header should be sent here.
     *
     * @var string
     */
    public $referrer;

    /**
     * The permanent location of the entry the comment was submitted to.
     *
     * @var string
     */
    public $permalink;

    /**
     * Name submitted with the comment.
     *
     * @var string
     */
    public $authorName;

    /**
     * Email address submitted with the comment.
     *
     * @var string
     */
    public $authorEmail;

    /**
     * The content that was submitted.
     * Please send the raw text the commenter has entered.
     * HTML and forum tags are accepted.
     *
     * @var string
     */
    public $content;

}

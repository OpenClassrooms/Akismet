<?php

namespace OpenClassrooms\Akismet\Models;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class Comment
{

    /**
     * @var string
     */
    public $userIp;

    /**
     * @var string
     */
    public $userAgent;

    /**
     * @var string
     */
    public $authorName;

    /**
     * @var string
     */
    public $authorEmail;

    /**
     * @var string
     */
    public $content;

}

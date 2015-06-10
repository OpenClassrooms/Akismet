<?php

namespace OpenClassrooms\Akismet\Models;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class CommentStub extends Comment
{
    const USER_IP = '127.0.0.1';
    const USER_AGENT = 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6';
    const AUTHOR_NAME = 'admin';
    const AUTHOR_EMAIL = 'test@test.com';
    const CONTENT = 'It means a lot that you would take the time to review our software.  Thanks again.';

    public $userIp = self::USER_IP;

    public $userAgent = self::USER_AGENT;

    public $authorName = self::AUTHOR_NAME;

    public $authorEmail = self::AUTHOR_EMAIL;

    public $content = self::CONTENT;

}

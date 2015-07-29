<?php

namespace OpenClassrooms\Akismet\Models;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class Resource
{
    const COMMENT_CHECK = 'comment-check';

    const SUBMIT_SPAM = 'submit-spam';

    const SUBMIT_HAM = 'submit-ham';

    /**
     * @codeCoverageIgnore
     */
    private function __construct()
    {
    }
}

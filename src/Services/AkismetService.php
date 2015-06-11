<?php

namespace OpenClassrooms\Akismet\Services;

use OpenClassrooms\Akismet\Models\Comment;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
interface AkismetService
{
    const RESOURCE = 'comment-check';

    /**
     * @return bool
     */
    public function commentCheck(Comment $comment);
}

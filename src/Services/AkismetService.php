<?php

namespace OpenClassrooms\Akismet\Services;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
interface AkismetService
{
    /**
     * @param string $key
     * @param string $blog
     *
     * @return bool
     */
    public function verifyKey($key, $blog);

    /**
     * @return bool
     */
    public function commentCheck(
        $user_ip,
        $user_agent,
        $comment_author,
        $comment_author_email,
        $comment_content
    );
}

<?php

namespace OpenClassrooms\Akismet\Client;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
interface Client
{
    /**
     * @param string $path
     * @param array  $params
     *
     * @return string
     */
    public function send($path, array $params);
} 

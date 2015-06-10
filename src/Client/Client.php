<?php

namespace OpenClassrooms\Akismet\Client;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
interface Client
{
    /**
     * @param string $resource
     * @param array  $params
     *
     * @return string
     */
    public function post($resource, array $params);
} 

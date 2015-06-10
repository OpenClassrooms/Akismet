<?php

namespace OpenClassrooms\Akismet\Client;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
class ClientMock implements Client
{

    /**
     * {@inheritdoc}
     */
    public function post($resource, array $params)
    {
        return true;
    }
}

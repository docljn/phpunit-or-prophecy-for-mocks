<?php

/**
 * 
 * @method getFirstName
 * @method getLastName
 *
 */
class User
{

    public function __call($name, $arguments)
    {
        // parse database records or similar
    }
}
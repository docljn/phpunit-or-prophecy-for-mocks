<?php

class Logger
{

    const USER_NAME_FORMAT = '%s %s';

    protected $user;

    public function getUserName()
    {
        return sprintf(self::USER_NAME_FORMAT, $this->user->getName('first'), $this->user->getName('last'));
    }

    public function setUser(IUser $user)
    {
        $this->user = $user;
        return $this;
    }
}
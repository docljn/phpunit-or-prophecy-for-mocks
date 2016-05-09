<?php

class Logger
{

    protected $user;

    public function getUserName()
    {
        return $this->user->getName('first') . ' ' . $this->user->getName('last');
    }

    public function setUser(IUser $user)
    {
        $this->user = $user;
    }
}
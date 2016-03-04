<?php

class Logger
{

    protected $user;

    public function getUserName()
    {
        return $this->user->getFirstName() . ' ' . $this->user->getLastName();
    }

    public function setUser(IUser $user)
    {
        $this->user = $user;
    }
}
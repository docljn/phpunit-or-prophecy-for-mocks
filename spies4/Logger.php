<?php

class Logger
{

    protected $user;

    public function getUserName()
    {
        return $this->getFirstName($this->user) . ' ' . $this->getLastName($this->user);
    }

    public function setUser(IUser $user)
    {
        $this->user = $user;
        return $this;
    }

    protected function getFirstName(IUser $user)
    {
        return $user->getName('first');
    }

    protected function getLastName(IUser $user)
    {
        return $user->getName('last');
    }
}
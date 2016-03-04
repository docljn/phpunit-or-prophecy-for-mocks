<?php
include_once 'Logger.php';
include_once 'IUser.php';

class SpyTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstrateProphecySpyWithOrder()
    {
        $fixture = new Logger();
        
        $user = $this->prophesize('IUser');
        
        $user->getName('first')->will(function () {
            $this->getName('last')
                ->shouldNotHaveBeenCalled();
        });
        
        $fixture->setUser($user->reveal());
        $fixture->getUserName();
        
        $user->getName('first')->shouldHaveBeenCalled();
        $user->getName('last')->shouldHaveBeenCalled();
    }
}
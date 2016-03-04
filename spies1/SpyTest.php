<?php
include_once 'Logger.php';
include_once 'IUser.php';

class SpyTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitSpy()
    {
        $fixture = new Logger();
        
        $user = $this->getMock('IUser');
        
        $user->expects($this->once())
            ->method('getFirstName');
        $user->expects($this->once())
            ->method('getLastName');
        
        $fixture->setUser($user);
        
        $fixture->getUserName();
    }

    public function testDemonstrateProphecySpy()
    {
        $fixture = new Logger();
        
        $user = $this->prophesize('IUser');
        
        $fixture->setUser($user->reveal());
        
        $fixture->getUserName();
        
        $user->getFirstName()->shouldHaveBeenCalled();
        $user->getLastName()->shouldHaveBeenCalled();
    }
}
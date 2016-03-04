<?php
include_once 'Logger.php';
include_once 'IUser.php';

class MockTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitMock()
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

    public function testDemonstrateProphecyMock()
    {
        $fixture = new Logger();
        
        $user = $this->prophesize('IUser');
        
        $user->getFirstName()->shouldBeCalled();
        $user->getLastName()->shouldBeCalled();
        
        $fixture->setUser($user->reveal());
        
        $fixture->getUserName();
    }
}
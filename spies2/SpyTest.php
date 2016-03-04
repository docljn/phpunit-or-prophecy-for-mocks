<?php
include_once 'Logger.php';
include_once 'IUser.php';

class SpyTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitSpy()
    {
        $fixture = new Logger();
        
        $user = $this->getMock('IUser');
        
        $user->method('getName')->withConsecutive(array(
            $this->equalTo('first')
        ), array(
            $this->equalTo('last')
        ));
        
        $fixture->setUser($user);
        
        $fixture->getUserName();
    }

    public function testDemonstrateProphecySpy()
    {
        $fixture = new Logger();
        
        $user = $this->prophesize('IUser');
        
        $fixture->setUser($user->reveal());
        $fixture->getUserName();
        
        $user->getName('first')->shouldHaveBeenCalled();
        $user->getName('last')->shouldHaveBeenCalled();
    }
}
<?php
include_once 'Logger.php';
include_once 'IUser.php';

class MockTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitMock()
    {
        $fixture = new Logger();
        
        $user = $this->getMock('IUser');
        
        $user->expects($this->exactly(2))
            ->method('getName')
            ->withConsecutive(array(
            $this->equalTo('first')
        ), array(
            $this->equalTo('last')
        ))
            ->will($this->onConsecutiveCalls('Fred', 'Bloggs'));
        
        $fixture->setUser($user);
        
        $this->assertSame('Fred Bloggs', $fixture->getUserName());
    }

    public function testDemonstrateProphecyMock()
    {
        $fixture = new Logger();
        
        $user = $this->prophesize('IUser');
        
        $user->getName('first')->willReturn('Fred');
        $user->getName('last')->willReturn('Bloggs');
        
        $fixture->setUser($user->reveal());
        
        $this->assertSame('Fred Bloggs', $fixture->getUserName());
        
        $user->getName('first')->shouldHaveBeenCalledTimes(1);
        $user->getName('last')->shouldHaveBeenCalledTimes(1);
    }
}
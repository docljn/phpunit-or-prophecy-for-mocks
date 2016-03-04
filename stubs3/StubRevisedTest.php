<?php
include_once 'Logger.php';
include_once 'IUser.php';

class StubRevisedTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException Prophecy\Exception\Call\UnexpectedCallException
     */
    public function testDemonstrateProphecyStubRevised()
    {
        $fixture = new Logger();
        
        $user = $this->prophesize('IUser');
        
        $user->getFirstName()->willReturn('Fred');
        $user->getLastName()->willReturn('Bloggs');
        
        $fixture->setUser($user->reveal());
        
        $this->assertSame('Fred Bloggs', $fixture->getUserName());
    }

    public function testDemonstrateProphecyStubResolved()
    {
        $fixture = new Logger();
        
        $user = $this->prophesize('IUser');
        
        $user->getFirstName()->willReturn('Fred');
        $user->getLastName()->willReturn('Bloggs');
        $user->isAdmin()->willReturn(false);
        
        $fixture->setUser($user->reveal());
        
        $this->assertSame('Fred Bloggs', $fixture->getUserName());
    }
}
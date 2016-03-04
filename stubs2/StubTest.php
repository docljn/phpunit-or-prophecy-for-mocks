<?php
include_once 'Logger.php';
include_once 'IUser.php';

class StubTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitStubMethod1()
    {
        $fixture = new Logger();
        
        $user = $this->getMock('IUser');
        
        $user->method('getName')
            ->withConsecutive(array(
            $this->equalTo('first')
        ), array(
            $this->equalTo('last')
        ))
            ->will($this->onConsecutiveCalls('Fred', 'Bloggs'));
        $fixture->setUser($user);
        $this->assertSame('Fred Bloggs', $fixture->getUserName());
    }

    public function testDemonstratePhpunitStubMethod2()
    {
        $fixture = new Logger();
        
        $user = $this->getMock('IUser');
        
        $callback = function ($part) {
            return ($part == 'first') ? 'Fred' : 'Bloggs';
        };
        
        $user->method('getName')->will($this->returnCallback($callback));
        $fixture->setUser($user);
        
        $this->assertSame('Fred Bloggs', $fixture->getUserName());
    }

    public function testDemonstrateProphecyStub()
    {
        $fixture = new Logger();
        
        $user = $this->prophesize('IUser');
        
        $user->getName('first')->willReturn('Fred');
        $user->getName('last')->willReturn('Bloggs');
        
        $fixture->setUser($user->reveal());
        $this->assertSame('Fred Bloggs', $fixture->getUserName());
    }
}
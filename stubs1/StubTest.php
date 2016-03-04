<?php
include_once 'Logger.php';
include_once 'IUser.php';

class StubTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitStub()
    {
        $fixture = new Logger();
        
        $user = $this->getMock('IUser');
        
        $user->method('getFirstName')->willReturn('Fred');
        $user->method('getLastName')->willReturn('Bloggs');
        
        $fixture->setUser($user);
        
        $this->assertSame('Fred Bloggs', $fixture->getUserName());
    }

    public function testDemonstrateProphecyStub()
    {
        $fixture = new Logger();
        
        $user = $this->prophesize('IUser');
        
        $user->getFirstName()->willReturn('Fred');
        $user->getLastName()->willReturn('Bloggs');
        
        $fixture->setUser($user->reveal());
        
        $this->assertSame('Fred Bloggs', $fixture->getUserName());
    }
}
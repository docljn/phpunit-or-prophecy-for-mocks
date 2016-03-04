<?php
include_once 'Logger.php';
include_once 'User.php';

class StubTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitStub()
    {
        $fixture = new Logger();
        
        $user = $this->getMockBuilder('User')
            ->setMethods(array(
            'getFirstName',
            'getLastName'
        ))
            ->getMock();
        
        $user->method('getFirstName')->willReturn('Fred');
        $user->method('getLastName')->willReturn('Bloggs');
        
        $fixture->setUser($user);
        
        $this->assertSame('Fred Bloggs', $fixture->getUserName());
    }
}
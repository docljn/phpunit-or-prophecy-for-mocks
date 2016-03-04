<?php
include_once 'Logger.php';
include_once 'IUser.php';

class SpyTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitSpy()
    {
        $fixture = $this->getMockBuilder('Logger')
            ->setMethods(array(
            'getFirstName',
            'getLastName'
        ))
            ->getMock();
        
        $user = $this->getMock('IUser');
        
        $fixture->expects($this->once())
            ->method('getFirstName')
            ->with($this->equalTo($user));
        $fixture->expects($this->once())
            ->method('getLastName')
            ->with($this->equalTo($user));
        
        $fixture->setUser($user);
        
        $fixture->getUserName();
    }
}
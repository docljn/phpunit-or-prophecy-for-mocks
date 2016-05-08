<?php
include_once 'Logger.php';
include_once 'IUser.php';

class SpyTest extends PHPUnit_Framework_TestCase
{
	public function testDemonstratePhpunitSpyWithWildcardArguments()
	{
		$fixture = new Logger();
	
		$user = $this->getMock('IUser');
		
		$user->expects($this->exactly(2))->method('getName')->with($this->isType('string'));
	
        $fixture->setUser($user);
        
        $fixture->getUserName();
	}

    public function testDemonstrateProphecySpyWithWildcardArguments()
    {
        $fixture = new Logger();
        
        $user = $this->prophesize('IUser');
        
        $fixture->setUser($user->reveal());
        $fixture->getUserName();
        
        $user->getName(\Prophecy\Argument::type('string'))->shouldHaveBeenCalledTimes(2);
    }
}
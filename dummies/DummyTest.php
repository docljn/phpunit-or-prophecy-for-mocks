<?php
include_once 'Extractor.php';

class DummyTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitDummy()
    {
        $fixture = new Extractor($this->getMock('Logger'));
        
        $this->assertInstanceOf('Logger', $fixture->getLog());
    }

    public function testDemonstrateProphecyDummy()
    {
        $fixture = new Extractor($this->prophesize('Logger')->reveal());
        
        $this->assertInstanceOf('Logger', $fixture->getLog());
    }
}
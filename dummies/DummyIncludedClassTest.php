<?php
include_once 'Extractor.php';
include_once 'Logger.php';

class DummyIncludedClassTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitDummy()
    {
        $fixture = new Extractor($this->getMock('Logger'));
    }

    public function testDemonstrateProphecyDummy()
    {
        $fixture = new Extractor($this->prophesize('Logger')->reveal());
    }
}
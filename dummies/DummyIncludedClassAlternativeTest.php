<?php
include_once 'Extractor.php';
include_once 'Logger.php';

class DummyIncludedClassAlternativeTest extends PHPUnit_Framework_TestCase
{

    public function testDemonstratePhpunitDummy()
    {
        $fixture = new Extractor($this->getMockBuilder('Logger')
            ->disableOriginalConstructor()
            ->getMock());
    }

    public function testDemonstrateProphecyDummy()
    {
        $fixture = new Extractor($this->prophesize('Logger')->reveal());
    }
}
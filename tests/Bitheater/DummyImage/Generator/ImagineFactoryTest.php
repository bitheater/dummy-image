<?php

namespace Bitheater\DummyImage\Generator;

class ImagineFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testUnknownType()
    {
        $this->setExpectedException('LogicException');
        ImagineFactory::createInstance('test');
    }

    public function testCorrectType()
    {
        $imagine = ImagineFactory::createInstance('gd');
        $this->assertInstanceOf('Imagine\Image\AbstractImagine', $imagine);
    }
}

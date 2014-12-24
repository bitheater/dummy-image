<?php

namespace Bitheater\DummyImage\Generator;

use Bitheater\DummyImage\Model\Color;
use Bitheater\DummyImage\Model\Dimension;
use Guzzle\Http\Client;

class RemoteGeneratorIntegrationTest extends \PHPUnit_Framework_TestCase
{
    private $file;

    public function setUp()
    {
        $this->file = __DIR__ . '/generated/remote.png';
    }

    public function testImageGetsGenerated()
    {
        $generator = new RemoteGenerator(new Client());
        $result = $generator->generate($this->file);

        $this->assertInstanceOf('Bitheater\DummyImage\Result', $result);
        $this->assertEquals('http://dummyimage.com/500x500/000000/ffffff.png&text=500+%C3%97+500', $result->getUrl());
        $this->assertFileExists($this->file);
    }

    public function testImageWithOptionsGetsGenerated()
    {
        $generator = new RemoteGenerator(new Client());

        $generator
            ->setDimensions(new Dimension(800, 900))
            ->setText('Hello World!')
            ->setStringColor(new Color('000000'))
            ->setBackgroundColor(new Color('efefef'));

        $result = $generator->generate($this->file);

        $this->assertInstanceOf('Bitheater\DummyImage\Result', $result);
        $this->assertEquals('http://dummyimage.com/800x900/efefef/000000.png&text=Hello+World%21', $result->getUrl());
        $this->assertFileExists($this->file);
    }

    public function testExceptionIsThrownWithInvalidData()
    {
        $this->setExpectedException('InvalidArgumentException');

        $generator = new RemoteGenerator(new Client());
        $generator->setDimensions(new Dimension(40000, 40));
    }

    public function tearDown()
    {
        if (file_exists($this->file)) {
            unlink($this->file);
        }
    }
}

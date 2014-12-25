<?php

namespace Bitheater\DummyImage\Generator;

use Bitheater\DummyImage\Model\Color;
use Bitheater\DummyImage\Model\Dimension;

class LocalGeneratorIntegrationTest extends \PHPUnit_Framework_TestCase
{
    private $file;

    public function setUp()
    {
        $this->file = __DIR__ . '/generated/local.png';
    }

    /**
     * @dataProvider imagineProvider
     */
    public function testImageIsGenerated($provider)
    {
        $generator = new LocalGenerator($provider);
        $result = $generator->generate($this->file);

        $this->assertInstanceOf('Bitheater\DummyImage\Result', $result);
        $this->assertFileExists($this->file);
    }

    public function testImageWithOptionsGetsGenerated()
    {
        $generator = new LocalGenerator(ImagineFactory::GD);

        $generator
            ->setDimensions(new Dimension(800, 900))
            ->setText('Hello World!')
            ->setStringColor(new Color('000000'))
            ->setBackgroundColor(new Color('efefef'));

        $result = $generator->generate($this->file);

        $this->assertInstanceOf('Bitheater\DummyImage\Result', $result);
        $this->assertFileExists($this->file);
    }

    public function testExceptionIsThrownWithInvalidData()
    {
        $this->setExpectedException('InvalidArgumentException');

        $generator = new LocalGenerator(ImagineFactory::GD);
        $generator->setDimensions(new Dimension(40000, 40));
    }

    public function imagineProvider()
    {
        return [
            [ImagineFactory::GD],
            [ImagineFactory::GMAGICK]
            //[ImagineFactory::IMAGICK], Known bug http://www.imagemagick.org/discourse-server/viewtopic.php?f=3&t=11989 makes it fail
        ];
    }

    public function tearDown()
    {
        if (file_exists($this->file)) {
            unlink($this->file);
        }
    }
}

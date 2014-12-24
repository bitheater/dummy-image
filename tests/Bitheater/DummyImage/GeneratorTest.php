<?php

namespace Bitheater\DummyImage;

use Bitheater\DummyImage\Generator\LocalGenerator;
use Bitheater\DummyImage\Model\Dimension;

class GeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testTextIsChanged()
    {
        $generator = new LocalGenerator('gd');
        $this->assertEquals('500 × 500', $generator->getText());

        $generator->setText('Hello World');
        $this->assertEquals('Hello World', $generator->getText());

        $generator2 = new LocalGenerator('gd');
        $generator2->setDimensions(new Dimension(700, 500));
        $this->assertEquals('700 × 500', $generator2->getText());
    }
}

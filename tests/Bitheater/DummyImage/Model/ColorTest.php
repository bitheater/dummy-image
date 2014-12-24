<?php

namespace Bitheater\DummyImage\Model;

class ColorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider wrongColorProvider
     */
    public function testWrongValuesThrowException($string)
    {
        $this->setExpectedException('InvalidArgumentException');

        new Color($string);
    }

    /**
     * @dataProvider correctColorProvider
     */
    public function testCorrectValues($string)
    {
        $color = new Color($string);

        $this->assertEquals('#' . $string, $color->getColor());
    }

    public function testAddingHash()
    {
        $color = new Color('000000');

        $this->assertEquals('#000000', $color->getColor());
        $this->assertEquals('000000', $color->getColor(false));
    }

    public function wrongColorProvider()
    {
        return [
            [12],
            [null],
            ['#aeae'],
            ['0000000'],
            ['#000000'],
        ];
    }

    public function correctColorProvider()
    {
        return [
            ['eee'],
            ['000000'],
        ];
    }
}

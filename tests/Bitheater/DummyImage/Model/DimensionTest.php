<?php

namespace Bitheater\DummyImage\Model;

class DimensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider wrongDimensionProvider
     */
    public function testWrongValuesThrowException($width, $height)
    {
        $this->setExpectedException('InvalidArgumentException');

        new Dimension($width, $height);
    }

    /**
     * @dataProvider correctDimensionProvider
     */
    public function testCorrectValues($width, $height)
    {
        $dimension = new Dimension($width, $height);

        $this->assertEquals($width, $dimension->getWidth());

        if ($height === null) {
            $this->assertEquals($width, $dimension->getHeight());
        } else {
            $this->assertEquals($height, $dimension->getHeight());
        }
    }

    /**
     * @dataProvider correctDimensionProvider
     */
    public function testToStringMethod($width, $height)
    {
        $dimension = new Dimension($width, $height);

        if ($height === null) {
            $this->assertEquals($width . 'x' . $width, (string) $dimension);
        } else {
            $this->assertEquals($width . 'x' . $height, (string) $dimension);
        }
    }

    public function wrongDimensionProvider()
    {
        return [
            ['fake', null],
            [null, null],
            [123, 'fake'],
            ['fake', 'fake'],
            ['fake', 123],
        ];
    }

    public function correctDimensionProvider()
    {
        return [
            [120, null],
            [200, 200],
            [123, 240],
        ];
    }
}

<?php

namespace Bitheater\DummyImage\Model;

class ImageExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider wrongExtensionProvider
     */
    public function testWrongValuesThrowException($extension)
    {
        $this->setExpectedException('InvalidArgumentException');

        new ImageExtension($extension);
    }

    /**
     * @dataProvider correctExtensionProvider
     */
    public function testCorrectValues($extension)
    {
        $ext = new ImageExtension($extension);

        $this->assertEquals($extension, $ext->getExtension());
    }

    public function wrongExtensionProvider()
    {
        return [
            [null],
            ['pngs'],
            [''],
            ['test'],
        ];
    }

    public function correctExtensionProvider()
    {
        return [
            ['png'],
            ['jpg'],
            ['gif'],
        ];
    }
}

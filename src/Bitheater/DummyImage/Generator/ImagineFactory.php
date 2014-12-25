<?php

namespace Bitheater\DummyImage\Generator;

use Imagine\Gd\Font as GdFont;
use Imagine\Gd\Imagine as GdImagine;
use Imagine\Gmagick\Font as GmagickFont;
use Imagine\Gmagick\Imagine as GmagickImagine;
use Imagine\Image\AbstractImagine;
use Imagine\Image\FontInterface;
use Imagine\Image\Palette\Color\ColorInterface;
use Imagine\Imagick\Font as ImagickFont;
use Imagine\Imagick\Imagine as ImagickImagine;
use LogicException;

class ImagineFactory
{
    const GD = 'gd';
    const IMAGICK = 'imagick';
    const GMAGICK = 'gmagick';

    /**
     * @param string $name
     * @return AbstractImagine
     */
    public static function createInstance($name)
    {
        switch ($name) {
            case self::GD:
                $imagine = new GdImagine();
                break;
            case self::IMAGICK:
                $imagine = new ImagickImagine();
                break;
            case self::GMAGICK:
                $imagine = new GmagickImagine();
                break;
            default:
                throw new LogicException('Unknown type ' . $name);
        }

        return $imagine;
    }

    /**
     * @param string $name
     * @param string $font
     * @param int $size
     * @param ColorInterface $color
     * @return FontInterface
     */
    public static function createFontInstance(
        $name,
        $font,
        $size,
        ColorInterface $color
    )
    {
        switch ($name) {
            case self::GD:
                $imagine = new GdFont($font, $size, $color);
                break;
            case self::IMAGICK:
                $imagine = new ImagickFont(new \Imagick(), $font, $size, $color);
                break;
            case self::GMAGICK:
                $imagine = new GmagickFont(new \Gmagick(), $font, $size, $color);
                break;
            default:
                throw new LogicException('Unknown type ' . $name);
        }

        return $imagine;
    }
}

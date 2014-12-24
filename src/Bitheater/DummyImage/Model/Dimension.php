<?php

namespace Bitheater\DummyImage\Model;

use InvalidArgumentException;

class Dimension
{
    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    private $standards = [
        'cga'   => [320, 200],
        'qvga'  => [320, 240],
        'vga'   => [640, 480],
        'wvga'  => [800, 480],
        'svga'  => [800, 480],
        'wsvga' => [1024, 600],
        'xga'   => [1024, 768],
        'wxga'  => [1280, 800],
        'wsxga' => [1440, 900],
        'wuxga' => [1920, 1200],
        'wqxga' => [2560, 1600]
    ];

    /**
     * @param int $width
     * @param int $height
     * @throws InvalidArgumentException
     */
    public function __construct($width, $height = null)
    {
        if (in_array($width, $this->standards)) {
            $this->width = $this->standards[$width][0];
            $this->height = $this->standards[$width][1];
        } else {
            if (!is_int($width)) {
                throw new InvalidArgumentException('Width value is incorrect');
            }

            if ($width > 9999) {
                throw new InvalidArgumentException('Width value should be less than 9999');
            }

            if (null !== $height) {
                if (!is_int($height)) {
                    throw new InvalidArgumentException('Height value is incorrect');
                }

                if ($height > 9999) {
                    throw new InvalidArgumentException('Height value should be less than 9999');
                }
            } else {
                $height = $width;
            }

            $this->width = (int) $width;
            $this->height = (int) $height;
        }
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->width . 'x' . $this->height;
    }
}

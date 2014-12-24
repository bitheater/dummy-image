<?php

namespace Bitheater\DummyImage\Model;

use InvalidArgumentException;

class Color
{
    /**
     * @var string
     */
    private $color;

    /**
     * @param string $color
     */
    public function __construct($color)
    {
        if (strlen($color) !== 6 && strlen($color) !== 3) {
            throw new InvalidArgumentException('Color value should have three or six characters');
        }

        if (!ctype_alnum($color)) {
            throw new InvalidArgumentException('Color value should be alphanumeric only');
        }

        $this->color = $color;
    }

    /**
     * @param bool $addHash
     * @return string
     */
    public function getColor($addHash = true)
    {
        return ($addHash) ? '#' . $this->color : $this->color;
    }
}

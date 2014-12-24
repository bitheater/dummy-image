<?php

namespace Bitheater\DummyImage\Model;

use InvalidArgumentException;

class ImageExtension
{
    /**
     * @var string
     */
    private $extension;

    /**
     * @param string $extension
     */
    public function __construct($extension)
    {
        $validExtensions = ['png', 'gif', 'jpg'];
        if (!in_array($extension, $validExtensions)) {
            throw new InvalidArgumentException(
                sprintf('Image extension %s is invalid. Use one of: %s', $extension, implode(',', $validExtensions))
            );
        }

        $this->extension = $extension;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }
}

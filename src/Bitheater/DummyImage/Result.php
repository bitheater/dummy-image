<?php

namespace Bitheater\DummyImage;

use Imagine\Image\ImageInterface;

class Result
{
    /**
     * @var ImageInterface
     */
    private $imageInstance;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $url;

    /**
     * @param ImageInterface $imageInstance
     * @param string $file
     * @param string $url
     */
    public function __construct(ImageInterface $imageInstance = null, $file = null, $url = null)
    {
        $this->imageInstance = $imageInstance;
        $this->file = $file;
        $this->url = $url;
    }

    /**
     * @return ImageInterface
     */
    public function getImageInstance()
    {
        return $this->imageInstance;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}

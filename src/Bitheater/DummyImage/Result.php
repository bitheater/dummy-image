<?php

namespace Bitheater\DummyImage;

use Imagine\Image\AbstractImage;

class Result
{
    /**
     * @var AbstractImage
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
     * @param AbstractImage $imageInstance
     * @param string $file
     * @param string $url
     */
    public function __construct(AbstractImage $imageInstance = null, $file = null, $url = null)
    {
        $this->imageInstance = $imageInstance;
        $this->file = $file;
        $this->url = $url;
    }

    /**
     * @return AbstractImage
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

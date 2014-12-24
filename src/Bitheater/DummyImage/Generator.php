<?php

namespace Bitheater\DummyImage;

use Bitheater\DummyImage\Model\Color;
use Bitheater\DummyImage\Model\Dimension;
use Bitheater\DummyImage\Model\ImageExtension;

abstract class Generator
{
    /**
     * @var Dimension
     */
    protected $dimension;

    /**
     * @var ImageExtension
     */
    protected $imageExtension;

    /**
     * @var Color
     */
    protected $backgroundColor;

    /**
     * @var Color
     */
    protected $stringColor;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var bool
     */
    protected $textChanged = false;

    public function __construct()
    {
        $this->dimension = new Dimension(500, 500);
        $this->overrideText();
        $this->imageExtension = new ImageExtension('png');
        $this->backgroundColor = new Color('000000');
        $this->stringColor = new Color('ffffff');
    }

    /**
     * @param Color $color
     * @return Generator
     */
    public function setBackgroundColor(Color $color)
    {
        $this->backgroundColor = $color;

        return $this;
    }

    /**
     * @return Color
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * @param Color $color
     * @return Generator
     */
    public function setStringColor(Color $color)
    {
        $this->stringColor = $color;

        return $this;
    }

    /**
     * @return Color
     */
    public function getStringColor()
    {
        return $this->stringColor;
    }

    /**
     * @param ImageExtension $imageExtension
     * @return Generator
     */
    public function setImageExtension(ImageExtension $imageExtension)
    {
        $this->imageExtension = $imageExtension;

        return $this;
    }

    /**
     * @return ImageExtension
     */
    public function getImageExtension()
    {
        return $this->imageExtension;
    }

    /**
     * @param Dimension $dimension
     * @return Generator
     */
    public function setDimensions(Dimension $dimension)
    {
        $this->dimension = $dimension;
        $this->overrideText();

        return $this;
    }

    /**
     * @return Dimension
     */
    public function getDimensions()
    {
        return $this->dimension;
    }

    /**
     * @param string $text
     * @return Generator
     */
    public function setText($text)
    {
        $this->text = $text;

        $this->textChanged = true;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    private function overrideText()
    {
         if (!$this->textChanged) {
             $this->text = str_replace('x',' × ', (string) $this->dimension);
         }
    }

    /**
     * @param string|null $toFile
     * @return Result
     */
    abstract public function generate($toFile = null);
}

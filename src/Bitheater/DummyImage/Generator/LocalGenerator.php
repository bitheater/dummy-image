<?php

namespace Bitheater\DummyImage\Generator;

use Bitheater\DummyImage\Generator;
use Bitheater\DummyImage\Result;
use Imagine\Image\Box;
use Imagine\Image\ImagineInterface;
use Imagine\Image\Palette\RGB;
use Imagine\Image\Point;

class LocalGenerator extends Generator
{
    /**
     * @var ImagineInterface
     */
    private $imagine;

    /**
     * @var string
     */
    private $instanceType;

    /**
     * @param string $instance
     */
    public function __construct($instance)
    {
        parent::__construct();

        $this->imagine = ImagineFactory::createInstance($instance);
        $this->instanceType = $instance;
    }

    /**
     * {@inheritdoc}
     */
    public function generate($toFile = null)
    {
        $fontSize = max(min($this->dimension->getWidth() / strlen($this->text) * 1.15, $this->dimension->getHeight() * 0.5), 5);

        $palette = new RGB();

        $image = $this->imagine->create(
            new Box($this->dimension->getWidth(), $this->dimension->getHeight()),
            $palette->color($this->backgroundColor->getColor())
        );

        $font = ImagineFactory::createFontInstance(
            $this->imagine,
            $this->instanceType,
            __DIR__ . '/resource/mplus.ttf',
            $fontSize,
            $palette->color($this->stringColor->getColor())
        );

        $textProperties = $font->box($this->text);

        $image
            ->draw()
            ->text(
                $this->text,
                $font,
                new Point(
                    ($this->dimension->getWidth() - $textProperties->getWidth()) / 2,
                    ($this->dimension->getHeight() - $textProperties->getHeight()) / 2
                )
            );

        if ($toFile !== null) {
            $image->save($toFile);
        }

        return new Result($image, $toFile);
    }
}

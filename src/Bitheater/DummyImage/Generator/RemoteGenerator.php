<?php

namespace Bitheater\DummyImage\Generator;

use Bitheater\DummyImage\Generator;
use Bitheater\DummyImage\Result;
use Guzzle\Http\Client;
use Guzzle\Http\ClientInterface;
use Imagine\Gd\Font;
use Imagine\Image\Box;
use Imagine\Image\ImagineInterface;
use Imagine\Image\Palette\RGB;
use Imagine\Image\Point;

class RemoteGenerator extends Generator
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    const BASE_URL = 'http://dummyimage.com/';

    /**
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient)
    {
        parent::__construct();

        $this->httpClient = $httpClient;
    }

    /**
     * {@inheritdoc}
     */
    public function generate($toFile = null)
    {
        $url = self::BASE_URL;

        $url .= $this->dimension . '/';
        $url .= $this->backgroundColor->getColor(false) . '/';
        $url .= $this->stringColor->getColor(false) . '.';
        $url .= $this->imageExtension->getExtension() . '&text=';
        $url .= urlencode($this->text);

        if ($toFile !== null) {
            $this
                ->httpClient
                ->get($url)
                ->setResponseBody($toFile)
                ->send();
        }

        return new Result(null, $toFile, $url);
    }
}

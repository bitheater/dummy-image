Dummy Image Generator
=====================

[![Build Status](https://travis-ci.org/bitheater/dummy-image.svg?branch=master)](https://travis-ci.org/bitheater/dummy-image)

This library is just a dummy image generator for your PHP projects. We find it cool for creating fixtures for your projects :)

Installing
----------

Add the dependency to the ```composer.json``` file:

```json
{
    "require": {
        "bitheater/dummy-image": "dev-master"
    }
}
```

A minimum working version (for local image generation):

```php
<?php

use Bitheater\DummyImage\Generator\LocalGenerator;

$generator = new LocalGenerator(ImagineFactory::GD); // You could also use IMAGICK and GMAGICK
$result = $generator->generate(__DIR__ . '/image.png');
```

Local image generation is good when you don't have access to remote data (maybe you want to create fixtures without connection). Local generation needs GD, IMAGICK or GMAGICK installed on your server.

A minimum working version (for remote image generation):

```php
<?php

use Bitheater\DummyImage\Generator\RemoteGenerator;
use Guzzle\Http\Client;

$generator = new RemoteGenerator(new Client());
$result = $generator->generate(__DIR__ . '/image.png');
```

Remote image generation uses *DummyImage* website as the generator for the images.

Options
-------

```php
<?php

use Bitheater\DummyImage\Generator\LocalGenerator;

$generator = new LocalGenerator(ImagineFactory::GD);
$result = $generator->generate(__DIR__ . '/image.png');
```

License
-------

**Dummy Image Generator** is licensed under the [MIT license](LICENSE).

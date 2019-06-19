# selective/image-type

Image type detection library for PHP.

[![Latest Version on Packagist](https://img.shields.io/github/release/selective-php/image-type.svg?style=flat-square)](https://packagist.org/packages/selective/image-type)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/selective-php/image-type/master.svg?style=flat-square)](https://travis-ci.org/selective-php/image-type)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/selective-php/image-type.svg?style=flat-square)](https://scrutinizer-ci.com/g/selective-php/image-type/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/quality/g/selective-php/image-type.svg?style=flat-square)](https://scrutinizer-ci.com/g/selective-php/image-type/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/selective/image-type.svg?style=flat-square)](https://packagist.org/packages/selective/image-type/stats)


## Features

* Detect image type from file content (not the extension)
* Supported formats: JPG, GIF, PNG, WEBP, BMP, PSD, TIFF, SVG, ICO, CUR, SWF, AI, HEIC and RAW files
* No dependencies
* Very fast

## Requirements

* PHP 7.2+

## Installation

```
composer require selective/image-type
```

## Usage

### Detect the image type of file

```php
$file = new \SplFileObject('example.jpg');

$imageTypeDetector = new \Selective\ImageType\ImageTypeDetector();
echo $imageTypeDetector->getImageTypeFromFile($file)->toString(); // jpeg
```

### Detect the image type of in-memory object

```php
$image = new \SplTempFileObject();
$image->fwrite('my file content');

$imageTypeDetector = new \Selective\ImageType\ImageTypeDetector();
echo $imageTypeDetector->getImageTypeFromFile($file)->toString();
```

## Similar libraries

* https://github.com/willwashburn/fasterimage

## License

* MIT

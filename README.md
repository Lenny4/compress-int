# Compress integer into alphanumeric

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lenny4/compress-int.svg?style=flat-square)](https://packagist.org/packages/lenny4/compress-int)
[![Total Downloads](https://img.shields.io/packagist/dt/lenny4/compress-int.svg?style=flat-square)](https://packagist.org/packages/lenny4/compress-int)

## Installation

You can install the package via composer:

```bash
composer require lenny4/compress-int
```

## Usage

```php
$number = 123456;
$compress = Lenny4\CompressInt::compress($number); // e7w
$decompress = Lenny4\CompressInt::decompress($number); // 123456
```

## Testing

```bash
composer install
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

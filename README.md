# Compress integer into alphanumeric

## Installation

You can install the package via composer:

```bash
composer require lenny4/compress-int
```

## Usage

```php
$number = 123456;
$compress = Lenny4\CompressInt::compress($number); // e7w
$decompress = Lenny4\CompressInt::decompress($compress); // 123456
```

You can change symbols use for compress and decompress:
```php
$number = 123456;
$customSymbols = '0123456789abcdefghijklmnopqrstuvwxyz'
$compress = Lenny4\CompressInt::compress($number, $customSymbols);
$decompress = Lenny4\CompressInt::decompress($compress, $customSymbols);
```

Default symbols:
```php
Lenny4\CompressInt::DEFAULT_SYMBOLS // 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
```

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

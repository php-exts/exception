<p style="text-align:center;font-size:46px;"> PHP Dev Template</p>

## Features
- exceptions

## Usage

```php
use Zeus\Exception\InvalidArgumentException;
try {
  throw new InvalidArgumentException('test');
} catch (InvalidArgumentException $e) {
  echo $e->getMessage();
}
```

## Installation
- Install with [Composer](https://getcomposer.org/)
  - `composer require ext/exception`

## Documentation
- [Report](https://github.com/php-exts/exception/issues?q=sort%3Aupdated-desc%20is%3Aissue%20is%3Aopen%20label%3Abug)

## CHANGELOG
See [CHANGELOG.md]()

## Contributing
-

## Security Vulnerabilities
- https://github.com/php-exts/exception

## License

The XXX is open-sourced software licensed under the [MIT]() license.

Example See https://choosealicense.com/licenses

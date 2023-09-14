# Snapshot

<!-- BADGES_START -->
[![Latest Version](https://img.shields.io/github/release/kazemmdev/snapshot.svg?style=flat-square)](https://github.com/kazemmdev/snapshot/releases)
![run-tests](https://github.com/kazemmdev/snapshot/workflows/run-tests/badge.svg?label=tests)
[![Total Downloads](https://img.shields.io/packagist/dt/kazemmdev/snapshot.svg?style=flat-square)](https://packagist.org/packages/kazemmdev/snapshot)

A snapshot package to manage snapshots on your cloud

## Installation

Using composer:

```bash
composer require kazemmdev/snapshot

php artisan vendor:publish --tag=snapshot-config
```

## Usage

1. List all snapshots
```php
php artisan snapshot:list
php artisan snapshot:create
php artisan snapshot:clean
```

2. create a snapshots
```php
php artisan snapshot:create
```

3. Delete all snapshots
```php
php artisan snapshot:clean
```


## Testing

You can run the tests with:

```bash
./vendor/bin/pest
```

## Contributing

Please see [CONTRIBUTING](https://github.com/kazemmdev/snapshot/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email [security@spatie.be](mailto:security@spatie.be) instead of using the issue tracker.

## Credits

- [Kazemmdev](https://github.com/kazemmdev)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

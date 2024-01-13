#  An alternative Laravel package for Indonesia administrative

[![Latest Version on Packagist](https://img.shields.io/packagist/v/martanto/indonesia.svg?style=flat-square)](https://packagist.org/packages/martanto/indonesia)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/martanto/indonesia/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/martanto/indonesia/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/martanto/indonesia.svg?style=flat-square)](https://packagist.org/packages/martanto/indonesia)

Paket ini digunakan sebagai alternatif untuk mendapatakn data Administrasi Indonesia. Meliputi data provinsi, kota/kabupaten, kecamatan, dan desa/kelurahan. Paket ini terinspirasi dari [Laravolt Indonesia](https://github.com/laravolt/indonesia).


## Installation

You can install the package via composer:

```bash
composer require martanto/indonesia
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="indonesia-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="indonesia-config"
```

This is the contents of the published config file:

```php
return [
    'cache' => true,
    'cache_prefix' => 'indonesia_'
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="indonesia-views"
```

## Usage

Will be updated soon

```php
$indonesia = new Martanto\Indonesia();
echo $indonesia->echoPhrase('Hello, Martanto!');
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Martanto](https://github.com/martanto)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

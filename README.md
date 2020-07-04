# Integration of Shiprocket API in your laravel application is easy, This package enables you to utilize most of your Shiprocket functions.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sesha/laravel-shiprocket-api.svg?style=flat-square)](https://packagist.org/packages/sesha/laravel-shiprocket-api)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/sesha/laravel-shiprocket-api/run-tests?label=tests)](https://github.com/sesha/laravel-shiprocket-api/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/sesha/laravel-shiprocket-api.svg?style=flat-square)](https://packagist.org/packages/sesha/laravel-shiprocket-api)

## Installation

You can install the package via composer:

```bash
composer require seshac/laravel-shiprocket-api
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Sesha\Sketch\SketchServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Sesha\Sketch\SketchServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

``` php
$sketch = new Sesha\Sketch();
echo $sketch->echoPhrase('Hello, Sesha!');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [:author_name](https://github.com/:author_username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
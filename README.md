# vinex-php

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Style CI][ico-styleci]][link-styleci]
[![Code Coverage][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A PHP wrapper for the VINEX API.

## Install

Via Composer

```bash
$ composer require pxgamer/vinex
```

## Usage

**Create an instance of the API**

```php
$adapter = new HttpAdapter('api-token');
$vinex = new Vinex($adapter);

$vinex->basic();
$vinex->general();
$vinex->account();
```

**Basic API calls**

```php
// Retrieve the current server unix timestamp (e.g. `1548690153`)
$vinex->basic()->getServerTime();
// Retrieve an array of Entity\Market instances
$vinex->basic()->getAllMarketInformation();
// Retreive a single Entity\Market instance
$vinex->basic()->getSingleMarketInformation('market');
```

**General API calls**

```php
// Retrieve an array of Entity\MarketOrder instances
$vinex->general()->getMarketOrders('order-type', 'market');
```

**Account API calls**

```php
// Retrieve an array of Entity\Balance instances
$vinex->account()->getAllBalanceInformation();
// Retrieve a single Entity\Balance instance
$vinex->account()->getSingleBalanceInformation('coin');
// Retrieve an array of Entity\Order instances
$vinex->account()->getMyOrders();
// Retrieve an array of Entity\Trade instances
$vinex->account()->getMyTrading();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

```bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CODE_OF_CONDUCT](.github/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email security@pxgamer.xyz instead of using the issue tracker.

## Credits

- [pxgamer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pxgamer/vinex.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pxgamer/vinex-php/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/167267153/shield
[ico-code-quality]: https://img.shields.io/codecov/c/github/pxgamer/vinex-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/vinex.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/vinex
[link-travis]: https://travis-ci.com/pxgamer/vinex-php
[link-styleci]: https://styleci.io/repos/167267153
[link-code-quality]: https://codecov.io/gh/pxgamer/vinex-php
[link-downloads]: https://packagist.org/packages/pxgamer/vinex
[link-author]: https://github.com/pxgamer
[link-contributors]: ../../contributors

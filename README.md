# IpInfo

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require thelhc/ip-info
```

After installing, add the ServiceProvider to the providers array in `config/app.php.`

```
TheLHC\IpInfo\IpInfoServiceProvider::class
```

Then add the Facade to the aliases array

```
'IpInfo'  => TheLHC\IpInfo\Facades\IpInfo::class,
```

## Usage

``` php
use IpInfo;

$ip = IpInfo::lookup('###.###.###.###');
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/thelhc/ip-info.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/thelhc/ip-info.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/thelhc/ip-info
[link-downloads]: https://packagist.org/packages/thelhc/ip-info
[link-author]: https://github.com/aaronkaz

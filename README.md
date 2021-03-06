# Genius-helper
Helper Features For Development with Laravel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Software License][ico-license]](LICENSE)
[![Total Downloads][ico-downloads]][link-downloads]


## About
* The `genius-helper` package the Helper Library for laravel development
* Most of the method and features useful in development

## Features
* Custom Command For Cache Clear All
* API Standard For Date
    * Date To Epoch
    * Epoch To Date
    * Hour To Epoch
    * Epoch To Hour
    * Date String To Date with Format
* Helper Method
    * Font Detect
    * Is Myanmar Font?
    * zawGyiToUnicode
    * UnicodeToZawGyi
    * Get Random Digit
    * Get File with File Format String  
## Installation

Require the `htinlynn/genius` package in your `composer.json` and update your dependencies:

```sh
$ composer require htinlynn/genius-helper
```

## Usage For Custom Command

* To Clear cache all of the 
    * All caches of config, route, view and cache are cleared.
    * And config clear and cache
    
Command (short)
```sh
$ php artisan all:
```

Command (Long)
```sh
$ php artisan all:clearandcache
```

## Usage For Helper Class
Init the class
```php
$geniusHelper = new \Genius\Services\GeniusService();
```

### &&

Dependency injection on construct or specific function
```php
protected $geniusInterface;
public function __construct(Genius\Contacts\GeniusInterface $geniusInterface)
{
    $this->geniusInterface = $geniusInterface;
}
```
Available Method
```php
$geniusHelper->randomDigit($length,$count);
$geniusHelper->formatBytes($size);
$geniusHelper->zawGyiToUnicode($content);
$geniusHelper->unicodeToZawGyi($content);
```

### ||

Facades
```php
Genius::randomDigit($length,$count);
Genius::formatBytes($size);
Genius::formatBytes($size);
Genius::formatBytes($size);
```

## Trait Method

Need to use before using my package method
```php
use GeniusHelper;
```
Available Method
```php
$this->dateToEpoch($dateString);
$this->hourToEpoch($hourString);
$this->epochToHour($epochString);
$this->epochToDate($epochString);
$this->toDateFormat($dateString);
$this->epochToDateByDateFormat($epochString,$format);
```
## Improvement
* Test Case
* Contribution Guide
* Version Release Note

## Credit
* Ko [Nay Lin Aung](https://github.com/stevenay) [myanfont] (https://github.com/stevenay/myanfont) PHP Library



Noted: All Date Time String are using UTC timezone
Request Parameter And Respond Data are using UTC timezone

## License

Released under the MIT License, see [LICENSE](LICENSE).

[ico-version]: https://img.shields.io/packagist/vpre/htinLynn/genius-helper.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/MgHtinLynn/genius-helper.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/MgHtinLynn/genius-helper.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/htinLynn/genius-helper.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/htinLynn/genius-helper
[link-scrutinizer]: https://scrutinizer-ci.com/g/MgHtinLynn/genius/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/MgHtinLynn/genius-helper
[link-downloads]: https://packagist.org/packages/HtinLynn/genius-helper
[link-author]: https://github.com/MgHtinLynn
[link-contributors]: ../../contributors








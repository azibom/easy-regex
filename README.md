# Easy-Regex

PHP Regular expressions made easy

[![codecov](https://codecov.io/gh/azibom/Easy-Regex/graph/badge.svg?token=qkGIZj4qp3)](https://codecov.io/gh/azibom/Easy-Regex)
![example workflow](https://github.com/azibom/Easy-regex/actions/workflows/ci.yaml/badge.svg)
[![License](https://img.shields.io/github/license/azibom/easy-regex.svg)](https://github.com/azibom/easy-regex)
[![Latest Stable Version](https://img.shields.io/packagist/v/azibom/easy-regex.svg)](https://packagist.org/packages/azibom/easy-regex)
[![PHP version](https://img.shields.io/packagist/php-v/azibom/easy-regex.svg)](https://packagist.org/packages/azibom/easy-regex)
[![Build Status](https://img.shields.io/github/stars/azibom/easy-regex.svg)](https://github.com/azibom/easy-regex)


### Prerequisites

You need them before installing the package.

* You need PHP 7.2.5 or above
* You composer 2.3 or above

### Installation
```
composer require azibom/easy-regex
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use Azibom\EasyRegex\Builder;

$builder = new Builder();
$builder
    ->start()
    ->see("http")
    ->maybeSee("s")
    ->see("://")
    ->something()
    ->see(".")
    ->something()
    ->end();

echo $builder->getRegex() . PHP_EOL; 

if ($builder->match("https://google.com")) {
    echo "Match found!" . PHP_EOL;
} else {
    echo "No match." . PHP_EOL;
}

// /^(http)(s)?(\:\/\/)(?:.+)(\.)(?:.+)$/
// Match found!
```

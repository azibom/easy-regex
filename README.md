# Easy-Regex

PHP Regular expressions made easy

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

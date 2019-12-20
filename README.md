# Laravel-Sequential-Number-Generator (Laravel Package)

Sequential Number Generator is my first laravel package.
It generates the next sequential number of the given string.
I needed a function to generate a consecutive number for an issue system.

## Installation
``` bash
composer require Spielfigur\laravel-sequential-number-generator
```

## Config (optional)
``` bash
php artisan vendor:publish --provider="Spielfigur\LaravelSequentialNumberGenerator\SequentialNumberGeneratorServiceProvider"
```

## Usage
in Laravel:
``` php
$nextNumber = SequentialNumberGenerator::generateNumber('COMPANYNAME/2019-12-02/001', '/', '2, 3);
```
in PHP:
``` php
$generator = new \Spielfigur\LaravelSequentialNumberGenerator\SequentialNumberGeneratorFactory();
$nextNumber = $generator->generateNumber('COMPANYNAME/2019-12-02/001', '/', 2, 3);
```

## Testing
``` bash
composer test
```

## Options
Parameters are in the following order:
 - $string (the given string)
 - $separator (how to explode this string)
 - $position (at which point does the number appear, starting with 0)
 - $fixedNumberLength (the fixed number length)

Ubench
======

Ubench is a PHP micro library for benchmark

Installation
------------

### Old school ###

require `src/Ubench.php` in your project.

### Composer ###

Add this to your composer.json

```json
{
    "require": {
        "devster/ubench": "1.1.*-dev"
    }
}
```

Usage
-----

```php
use Ubench\Ubench;

$bench = new Ubench;

$bench->start();

// Execute some code

$bench->end();

// Get elapsed time and memory
echo $bench->getTime(); // 156ms or 1.123s
echo $bench->getTime(true); // elapsed microtime in float
echo $bench->getTime(false, '%d%s'); // 156ms or 1s

echo $bench->getMemoryPeak(); // 152B or 90.00Kb or 15.23Mb
echo $bench->getMemoryPeak(true); // memory peak in bytes
echo $bench->getMemoryPeak(false, '%.3f%s'); // 152B or 90.152Kb or 15.234Mb

// Returns the memory usage at the end mark
echo $bench->getMemoryUsage(); // 152B or 90.00Kb or 15.23Mb
```

License
-------

Ubench is licensed under the MIT License
# IP Checker Lib

Provides a simple API to check if a given IP address is within the specified range.


## Installation
Add `kylepretorius/ipchecker-lib` as a requirement to your `composer.json`:

```bash
$ composer require kylepretorius/ipchecker-lib
```

## Basic Usage

```php
$result = new IPChecker(['192.168.1.0/16', '192.168.10.89/32'])->detect(192.168.1.1);
```
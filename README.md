# PHP Port Finder

A simple PHP package to find an available port within a range.

## Usage

The following will return the first available port within the range for the
provided host.

```php
require_once(__DIR__ . '/vendor/autoload.php');
use GrantLucas\PortFinder;

$port = PortFinder::range('127.0.0.1', 9901, 9999);
```

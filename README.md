# Xlog

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A psr-3 compliant logging module with color support for each different logging level.

## Installation

Via Composer

```bash
composer require sevenecks/xlog
```

## Usage

```php
require_once __DIR__ . '/vendor/autoload.php';
require('src/Logger.php');

use SevenEcks\Xlog\Logger;

$xlog = new Logger;;
$xlog->clearLog();
$xlog->emergency('test');
$xlog->alert('test');
$xlog->critical('test');
$xlog->error('test');
$xlog->warning('test');
$xlog->notice('test');
$xlog->info('test');
$xlog->debug('test');
```

### Bash Usage

After logging some stuff you can cat your log file and see all the pretty colors.

```bash
cat xlog.log
```

### Colors

All colors are created using ANSI color codes from Colorizer that is a part of this [ANSI](https://github.com/SevenEcks/ansi) module.

```
Emergency => Red
Alert => Light Red
Critical => Purple
Error => Light Purple
Warning => Yellow
Notice => Light Gray
Info => White
Debug => Cyan
```

## API

The [PSR-3 Logger Interface](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md) defines the core of the API that this logging package uses.

```php
/**
 * System is unusable.
 *
 * @param string $message
 * @param array $context
 * @return void
 */
public function emergency($message, array $context = array());

/**
 * Action must be taken immediately.
 *
 * Example: Entire website down, database unavailable, etc. This should
 * trigger the SMS alerts and wake you up.
 *
 * @param string $message
 * @param array $context
 * @return void
 */
public function alert($message, array $context = array());

/**
 * Critical conditions.
 *
 * Example: Application component unavailable, unexpected exception.
 *
 * @param string $message
 * @param array $context
 * @return void
 */
public function critical($message, array $context = array());

/**
 * Runtime errors that do not require immediate action but should typically
 * be logged and monitored.
 *
 * @param string $message
 * @param array $context
 * @return void
 */
public function error($message, array $context = array());

/**
 * Exceptional occurrences that are not errors.
 *
 * Example: Use of deprecated APIs, poor use of an API, undesirable things
 * that are not necessarily wrong.
 *
 * @param string $message
 * @param array $context
 * @return void
 */
public function warning($message, array $context = array());

/**
 * Normal but significant events.
 *
 * @param string $message
 * @param array $context
 * @return void
 */
public function notice($message, array $context = array());

/**
 * Interesting events.
 *
 * Example: User logs in, SQL logs.
 *
 * @param string $message
 * @param array $context
 * @return void
 */
public function info($message, array $context = array());

/**
 * Detailed debug information.
 *
 * @param string $message
 * @param array $context
 * @return void
 */
public function debug($message, array $context = array());

/**
 * Logs with an arbitrary level.
 *
 * @param mixed $level
 * @param string $message
 * @param array $context
 * @return void
 */
public function log($level, $message, array $context = array());
```

On top of that functionality is the ability to use dependency injection to configure the logging object, via constructor injection:

```php
public function __construct($file_name = 'xlog.log', $append_to_file = true, $string_utils = null, ColorInterface $colorize = null)
```

The constructor takes the file name, the $append_to_file (it should probably always be on), the $string_utils object, and the ColorInterface object. If none of these are provided, the constructor will create them based on the defaults. If you are happy with the module as it is, you don't need to pass any constructor arguments aside from perhaps the $file_name.

```php
/**
 * Clear the log file
 *
 * @return int
 */
public function clearLog()
```

This will clear the log file. It can be called after object instantiation if you want a fresh log, or really at any point.

## ToDo

1. Add ability for capped logs, where the log automatically prunes older items after a certain amount of rows

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email bbutts@stormcode.net instead of using the issue tracker.

## Credits

- [Brendan Butts][link-author]
- [All Contributors][link-contributors]
## Change Log
Please see [Change Log](CHANGELOG.md) for more information.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sevenecks/xlog.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/sevenecks/xlog/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/sevenecks/xlog.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/sevenecks/xlog.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sevenecks/xlog.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/sevenecks/xlog
[link-travis]: https://travis-ci.org/sevenecks/xlog
[link-scrutinizer]: https://scrutinizer-ci.com/g/sevenecks/xlog/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/sevenecks/xlog
[link-downloads]: https://packagist.org/packages/sevenecks/xlog
[link-author]: https://github.com/sevenecks
[link-contributors]: ../../contributors

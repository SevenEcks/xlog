# Xlog

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

## Change Log
Please see [Change Log](CHANGELOG.md) for more information.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

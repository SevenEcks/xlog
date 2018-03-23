<?php
require_once __DIR__ . '/vendor/autoload.php';
require('src/Logger.php');

use SevenEcks\Xlog\Logger;

$xlog = new Logger;;
$xlog->emergency('test');
$xlog->alert('test');
$xlog->critical('test');
$xlog->error('test');
$xlog->warning('test');
$xlog->notice('test');
$xlog->info('test');
$xlog->debug('test');

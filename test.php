<?php
require_once __DIR__ . '/vendor/autoload.php';
require('src/Xlog.php');

use SevenEcks\Xlog\Xlog;

$xlog = new Xlog;
$xlog->critical('test');

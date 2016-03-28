<?php

require_once('../vendor/autoload.php');
require_once('../src/TelegramAdapter.php');
require_once('../src/TelegramHandler.php');

use TelegramHandler\TelegramHandler;
use Monolog\Logger;

$oLog     = new Logger('Test Telegram Handler');
$oHandler = new TelegramHandler(Logger::INFO);
$oLog->pushHandler($oHandler);

$oLog->addInfo('Lorem ipsum dolor sit.', ['test', 'test test']);


dump($oLog);
?>



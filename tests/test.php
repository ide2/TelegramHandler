<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use TelegramHandler\TelegramHandler;
use Monolog\Logger;

$log     = new Logger('Test Telegram Handler');
$handler = new TelegramHandler('189305541:AAFqkF61X4RszY_C_8YmRqjIi6lRnGaJdHs', 80500307, Logger::INFO);
$log->pushHandler($handler);

$log->addInfo('Lorem ipsum dolor sit.', ['test', 'test test']);
$log->addError('Lorem ipsum dolor sit.');

dump($log);

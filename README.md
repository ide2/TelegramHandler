# TelegramHandler
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ide2/TelegramHandler/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ide2/TelegramHandler/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/ide2/TelegramHandler/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ide2/TelegramHandler/build-status/master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/82a67d29-9cc3-4300-abf3-3fb99c681b92/mini.png)](https://insight.sensiolabs.com/projects/82a67d29-9cc3-4300-abf3-3fb99c681b92)

Handle logs with telegram bot

Simple monolog with telegram

## Installation

Install the latest version with

```bash
composer require ide2/telegram-handler
```

## Basic Usage

```php
<?php

require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$token   = '123456:abcdefgdkjaskldjas';
$chat_id = 123456789;

$log     = new Logger('MyTestApplication');
$handler = new TelegramHandler($token, $chat_id, Logger::INFO);
$log->pushHandler($handler);

$log->addInfo('Lorem ipsum dolor sit.', ['test', 'test test']);
$log->addError('Lorem ipsum dolor sit.');
```

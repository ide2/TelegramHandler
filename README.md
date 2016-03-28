# TelegramHandler

Handle logs with telegram bot
Simple monolog with telegram

## Installation

Install the latest version with

```bash
$ composer require ide2/telegram-handler
```
## Configuration

Configure the token and chat_id on config.yml

```yml
telegram:
  token: 123456:abcdefgdkjaskldjas #change to the correct token
  chat_id: xxxxxxxxx #change to the chat id
```

## Basic Usage

```php
<?php

require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$oLog     = new Logger('Test Telegram Handler');
$oHandler = new TelegramHandler(Logger::INFO);
$oLog->pushHandler($oHandler);

$oLog->addInfo('Lorem ipsum dolor sit.', ['test', 'test test']);
$oLog->addError('Lorem ipsum dolor sit.');
```

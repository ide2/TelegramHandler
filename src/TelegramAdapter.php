<?php

namespace TelegramHandler;
use Telegram\Bot\Api;
use Symfony\Component\Yaml\Parser;

class TelegramAdapter {

  private $telegram;

  private $chat_id;

  public function __construct() {

    $config        = $this->getConfig();
    $this->chat_id = $config['chat_id'];

    $this->telegram = new Api($config['token']);

    return $this;
  }

  public function sendMessage($message) {

    $response = $this->telegram->sendMessage([
         'chat_id' => $this->chat_id, 
         'text' => $message,
         'parse_mode' => 'HTML'
    ]);
  }

  private function getConfig() {

    $yaml   = new Parser();
    $config = $yaml->parse(file_get_contents('config.yml'));

    return $config['telegram'];
  }
}

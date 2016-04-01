<?php

namespace TelegramHandler;
use Telegram\Bot\Api as TelegramBotApi;
use Symfony\Component\Yaml\Parser;

/**
 * TelegramAdapter
 *
 * @author Renan Melo <renanrmelo@gmail.com>
 * @author Rafael Nery <rafael@nery.info>
 *
 * @see AbstractProcessingHandler
 */
class TelegramAdapter {

  private $telegram;

  private $chat_id;

  public function __construct($token, $chatId) {

    $this->telegram = new TelegramBotApi($token);
    $this->chat_id  = $chatId;
    return $this;
  }

  public function sendMessage($message) {

    $response = $this->telegram->sendMessage([
         'chat_id' => $this->chat_id, 
         'text' => $message,
         'parse_mode' => 'HTML'
    ]);
  }
}

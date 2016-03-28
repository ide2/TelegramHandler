<?php

namespace TelegramHandler;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use TelegramHandler\TelegramAdapter;


class TelegramHandler extends AbstractProcessingHandler {

    private $telegram;

    public function __construct($level = Logger::DEBUG, $bubble = true) {

      parent::__construct($level, $bubble);
      $this->telegram = new TelegramAdapter();
    }

    protected function write(array $record)
    {
      $sMensagem  = '<b>' . $record['channel'] . '</b>' . PHP_EOL;
      $sMensagem .= $record['formatted'];

      $this->telegram->sendMessage($sMensagem);
    }
}
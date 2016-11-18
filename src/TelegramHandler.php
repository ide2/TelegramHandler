<?php

namespace TelegramHandler;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use TelegramHandler\TelegramAdapter;

/**
 * TelegramHandler
 *
 * @example 
 *    $log = new Logger('application');
 *    $telegram = new TelegramHandler('123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11', 123456789);
 *    $log->pushHandler($telegram);
 * 
 * @author Renan Melo <renanrmelo@gmail.com>
 * @author Rafael Nery <rafael@nery.info>
 *
 * @see AbstractProcessingHandler
 */
class TelegramHandler extends AbstractProcessingHandler {

    private $telegram;

    
    /**
     * @param String      $token   Bot Token (Hint: BotFather)
     * @param Integer     $chatId  ChatId (Hint: Retrieve via https://api.telegram.org/bot123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11/getUpdates)
     * @param Intger      $level   The minimum logging level at which this handler will be triggered
     * @param Boolean     $bubble  Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct($token, $chatId, $level = Logger::DEBUG, $bubble = true) 
    {

      parent::__construct($level, $bubble);
      $this->telegram = new TelegramAdapter($token, $chatId);
    }

    /**
     * {@inheritDoc}
     */
    protected function write(array $record)
    {
      $this->telegram->sendMessage($record['formatted']);
    }
}

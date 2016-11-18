<?php
/**
 * This file is a part of TelegramHandler project.
 * @author Amin Alizade < motammem@gmail.com >
 */

namespace TelegramHandler;


use Monolog\Formatter\FormatterInterface;
use Symfony\Component\Yaml\Yaml;

class TelegramFormatter implements FormatterInterface
{
    public function format(array $record)
    {
        $message = " <i>[{$record['level_name']}]</i>" . '<i>[' . $record['channel'] . ']</i>' . " at " . $record['datetime']->format("Y-m-d H:i:s") . PHP_EOL;
        $message .= $record['message'] . PHP_EOL;
        $message .= PHP_EOL;
        if ($record['context']) {
            $message .= "[context]" . PHP_EOL;
            $message .= Yaml::dump($record['context']);
            $message .= PHP_EOL;
        }
        if ($record['extra']) {
            $message .= "[extra]" . PHP_EOL;
            $message .= Yaml::dump($record['extra']);
        }
        return $message;
    }

    public function formatBatch(array $records)
    {
        $message = '';
        foreach ($records as $record) {
            $message .= $this->format($record);
        }
        return $message;
    }

}
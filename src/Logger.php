<?php

namespace SevenEcks\Xlog;

use Psr\Log\LogLevel;
use Psr\Log\AbstractLogger;
use SevenEcks\Ansi\Colorize;
use SevenEcks\Ansi\ColorInterface;
use SevenEcks\StringUtils\StringUtils;

class Logger extends AbstractLogger
{
    public function __construct($file_name = 'xlog.log', $append_to_file = true, $string_utils = null, ColorInterface $colorize = null)
    {
        $this->file_name = $file_name;
        $this->append_to_file = $append_to_file;
        $this->su = is_null($string_utils) ? new StringUtils : $string_utils;
        $this->colorize = is_null($colorize) ? new Colorize : $colorize;
    }

    public function log($level, $message, array $context = array())
    {
        if ($level == LogLevel::EMERGENCY) {
            $message = $this->colorize->red('[' . $level . ']') . ' ' . $message;
        } elseif ($level == LogLevel::ALERT) {
            $message = $this->colorize->lightRed('[' . $level . ']') . ' ' . $message;
        } elseif ($level == LogLevel::CRITICAL) {
            $message = $this->colorize->purple('[' . $level . ']') . ' ' . $message;
        } elseif ($level == LogLevel::ERROR) {
            $message = $this->colorize->lightPurple('[' . $level . ']') . ' ' . $message;
        } elseif ($level == LogLevel::WARNING) {
            $message = $this->colorize->yellow('[' . $level . ']') . ' ' . $message;
        } elseif ($level == LogLevel::NOTICE) {
            $message = $this->colorize->lightGray('[' . $level . ']') . ' ' . $message;
        } elseif ($level == LogLevel::INFO) {
            $message = $this->colorize->white('[' . $level . ']') . ' ' . $message;
        } elseif ($level == LogLevel::DEBUG) {
            $message = $this->colorize->cyan('[' . $level . ']') . ' ' . $message;
        }
        $message = $this->su->tell($message, false);
        if ($this->append_to_file) {
            file_put_contents($this->file_name, $message, FILE_APPEND);
        } else {
            file_put_contents($this->file_name, $message);
        }
    }

    /**
     * Clear the log file
     * 
     * @return int
     */
    public function clearLog()
    {
        return file_put_contents($this->file_name, null);
    }
}


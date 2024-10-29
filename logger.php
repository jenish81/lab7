<?php
namespace App;

use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

class Logger
{
    private $logger;

    public function __construct($name = 'app')
    {
        $this->logger = new MonologLogger($name);

        
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', MonologLogger::INFO));

        
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/../logs/error.log', MonologLogger::ERROR));
    }

    public function info($message, array $context = [])
    {
        $this->logger->info($message, $context);
    }

    public function error($message, array $context = [])
    {
        $this->logger->error($message, $context);
    }
}

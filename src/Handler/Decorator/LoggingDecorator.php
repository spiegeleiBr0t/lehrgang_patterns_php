<?php
namespace Taskflow\Handler\Decorator;

use Taskflow\Handler\Handler;
use Taskflow\Services\Logger\Logger;

class LoggingDecorator implements Handler
{

    public function __construct(private Handler $handler, private Logger $logger)
    {
    }

    public function handle(array $request): array
    {
        $this->logger->log("incoming request: " . $request['method'] ." ". $request['action'] );
        $response = $this->handler->handle($request);
        $this->logger->log(" Response Status" . $response['status']);

        return $response;
    }
}
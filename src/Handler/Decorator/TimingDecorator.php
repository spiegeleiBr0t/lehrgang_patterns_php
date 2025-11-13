<?php
namespace Taskflow\Handler\Decorator;

use Taskflow\Handler\Handler;
use Taskflow\Services\Logger\Logger;

class TimingDecorator implements Handler
{

    public function __construct(private Handler $handler, private Logger $logger)
    {
    }

    public function handle(array $request): array
    {

        $startTime = microtime(true);
        $response = $this->handler->handle($request);
        $endTime = microtime(true);

        $execDurationTime = floatval((($endTime - $startTime)));

        $response['times'] =  'Overall time: '.$execDurationTime. ' seconds';

        return $response;
    }
}
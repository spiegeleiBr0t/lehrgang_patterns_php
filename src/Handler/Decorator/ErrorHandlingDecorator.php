<?php
namespace Taskflow\Handler\Decorator;

use Taskflow\Handler\Handler;
class ErrorHandlingDecorator implements Handler
{

    public function __construct(private Handler $handler)
    {
    }

    public function handle(array $request): array
    {
        try {
            $response = $this->handler->handle($request);
        }catch (\Throwable $exception){
            return [
                'success' => false,
                'message' => $exception->getMessage(),
                'data' => json_encode($exception->getTrace()),
                'status' => 500,
                'error' => 'internal server error'
            ];
        }
        return $response;
    }
}
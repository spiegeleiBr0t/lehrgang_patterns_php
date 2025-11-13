<?php

namespace Taskflow\Handler;

interface Handler
{
    public function handle(array $request): array;
}
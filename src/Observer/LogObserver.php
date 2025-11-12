<?php

namespace Taskflow\Observer;

use Relay\Event;
use Taskflow\Observer\Observer;

class LogObserver implements Observer
{
    public function update(EventType $event, mixed $data): void
    {
        if($event === EventType::log) {
          echo "Log entry was made, with payload: <pre>".print_r(json_encode($data),true)."</pre>\n";
        }
    }
}
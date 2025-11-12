<?php

namespace Taskflow\Observer;

use Taskflow\Observer\Observer;

class TaskObserver implements Observer
{

    public function update(EventType $event, mixed $data): void
    {
        if($event === EventType::taskcreated) {
            $msg = "A Task was created: <pre>".print_r($data, true)."</pre>";
            echo $msg.PHP_EOL;
        }
    }
}
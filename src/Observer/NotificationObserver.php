<?php

namespace Taskflow\Observer;

use Taskflow\Observer\Observer;

class NotificationObserver implements Observer
{
    public function update(EventType $event, mixed $data): void
    {
     if($event === EventType::notification) {
         echo "Notification was broadcasted with Content: <pre>".print_r($data, true)."</pre>";
     }
    }
}
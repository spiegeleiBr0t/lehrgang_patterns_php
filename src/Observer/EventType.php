<?php

namespace Taskflow\Observer;

enum EventType: string {
    case log = 'log';
    case notification = 'notification';
    case taskcreated = 'taskcreated';
}
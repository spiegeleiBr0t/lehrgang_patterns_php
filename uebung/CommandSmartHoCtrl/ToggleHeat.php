<?php

namespace CommandSmartHoCtrl;

use CommandSmartHoCtrl\Command;

class ToggleHeat implements Command
{

    public function __construct(public SmartHomeDevice $device)
    {

    }

    public function execute(): void
    {
        $this->device->toggleState();
    }
}
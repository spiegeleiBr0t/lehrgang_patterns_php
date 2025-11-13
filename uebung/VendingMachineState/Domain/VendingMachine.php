<?php

namespace Uebung\VendingMachineState\Domain;

use Uebung\VendingMachineState\State\IdleState;
use Uebung\VendingMachineState\State\MachienState;

class VendingMachine
{
    private MachienState $state;

    public function __construct()
    {
        $this->state = new IdleState();
    }
}
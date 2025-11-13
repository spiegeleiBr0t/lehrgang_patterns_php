<?php

namespace Uebung\VendingMachineState\State;

use Uebung\VendingMachineState\State\MachienState;

class HasCoin implements MachienState
{

    public function InsertCoin(): void
    {
        echo "© already inserted - here  have your © back ;) \n";
    }

    public function select(): void
    {
        // TODO: Implement select() method.
    }

    public function cancel(): void
    {
        // TODO: Implement cancel() method.
    }

    public function dispense(): string
    {
        // TODO: Implement dispense() method.
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }
}
<?php

namespace Uebung\VendingMachineState\State;

interface MachienState
{
    public function InsertCoin():void;
    public function select(string $input):void;
    public function cancel():void;
    public function dispense():void;
    public function getName():string;
}
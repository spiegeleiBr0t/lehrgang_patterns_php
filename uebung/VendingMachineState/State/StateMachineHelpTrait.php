<?php

namespace Uebung\VendingMachineState\State;




trait StateMachineHelpTrait
{
    public function getStateInfos(VendorLogger $mecha): string
    {
        return "state Changed ". $mecha->(). "to ". get_class($doc->getDocState()) .";".PHP_EOL ;
    }
    public function nope(string $reasonAction =""):string
    {
        return "oops ".((isset($reason))?$reason:'').PHP_EOL;
    }
}
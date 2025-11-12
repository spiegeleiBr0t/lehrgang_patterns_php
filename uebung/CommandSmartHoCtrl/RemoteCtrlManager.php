<?php

namespace CommandSmartHoCtrl;

class RemoteCtrlManager
{
    //Dies ist der Invoker aus dem Textverarbeitungsbeispiel (Der Gerät)
    private array $history = [];
//    private array $buttons = ['A'=>null,'B'=>null,'C'=>null,'D'=>null,];
//
//    public function learnCtrl(array $array)
//    {
//        foreach($array as $k => $v){
//
//        }
//    }


    public function learnButton(string $btn, Command $cmd)
    {

    }

    public function executeCommand(Command $command)
    {
        $command->execute();
        $this->history[] = $command;
    }

//    public function undo():void
//    {
//
//    }


}
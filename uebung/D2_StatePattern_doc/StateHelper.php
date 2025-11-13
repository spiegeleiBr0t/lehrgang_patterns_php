<?php

namespace D2_StatePattern_doc;

trait StateHelper
{
    public function getStateInfos(Doc $doc): string
    {
        return "state Change for Document ". $doc->getDocName(). "to ". get_class($doc->getDocState()) .";".PHP_EOL ;
    }

    public function nope(string $reason =""):string
    {
        return "not allowed".((isset($reason))?$reason:'').PHP_EOL;
    }
}
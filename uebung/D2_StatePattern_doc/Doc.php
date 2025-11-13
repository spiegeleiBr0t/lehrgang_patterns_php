<?php

namespace D2_StatePattern_doc;

use D2_StatePattern_doc\ConcreteState\DraftState;

class Doc
{
    private DocState $docState;

    public function __construct(private string $docName)
    {
        $this->docState = new DraftState();
    }

    public function getDocName(): string
    {
        return $this->docName;
    }

    public function setDocName(string $docName): void
    {
        $this->docName = $docName;
    }

    public function setDocState(DocState $docState): void
    {
        $this->docState = $docState;
    }

    public function getDocState(): DocState
    {
        return $this->docState;
    }

}
<?php

namespace Uebung\D2_StatePattern_doc;

use Uebung\D2_StatePattern_doc\ConcreteState\DraftState;

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

    /*
     * Wrapper
     */

    public function submitForReview(): void{
        $this->docState->submitForReview($this);
    }
    public function publish(): void{
        $this->docState->publish($this);
    }
    public function archive(): void{
        $this->docState->archive($this);
    }
    public function rejectReview(): void{
        $this->docState->rejectReview($this);
    }

}
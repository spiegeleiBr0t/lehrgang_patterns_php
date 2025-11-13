<?php

namespace D2_StatePattern_doc\ConcreteState;

use D2_StatePattern_doc\Doc;
use D2_StatePattern_doc\DocState;
use D2_StatePattern_doc\StateHelper;

class DraftState implements DocState
{
    use StateHelper;
    public function submitForReview(Doc $doc): void
    {
        $doc->getDocState(new ReviewState());
        echo "Transition made to Review ".PHP_EOL;
        echo $this->getStateInfos($doc);
    }

    public function publish(Doc $doc): void
    {
        echo $this->nope(" plz first review this!");
        echo $this->getStateInfos($doc);

    }

    public function archive(Doc $doc): void
    {
        echo $this->nope(" plz first review this!");
        echo $this->getStateInfos($doc);
    }

    public function rejectReview(Doc $doc): void
    {
        echo $this->nope(" plz first review this!");
        echo $this->getStateInfos($doc);
    }

    public function getStateName(): string
    {
        return "Draft";
    }

    public function getCurrentState():string
    {
        return $this->getStateName();
    }
}
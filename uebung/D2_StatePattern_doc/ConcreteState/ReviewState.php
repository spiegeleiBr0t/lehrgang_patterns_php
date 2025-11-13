<?php

namespace D2_StatePattern_doc\ConcreteState;

use D2_StatePattern_doc\Doc;
use D2_StatePattern_doc\DocState;
use D2_StatePattern_doc\StateHelper;

class ReviewState implements DocState
{
    use StateHelper;
    public function submitForReview(Doc $doc): void
    {
        // TODO: Implement submitForReview() method.
    }

    public function publish(Doc $doc): void
    {
        // TODO: Implement publish() method.
    }

    public function archive(Doc $doc): void
    {
        echo $this->nope(" plz first review this!");
        echo $this->getStateInfos($doc);
    }

    public function rejectReview(Doc $doc): void
    {
        // TODO: Implement rejectReview() method.
    }

    public function getStateName(): string
    {
        return "Review";
    }
    public function getCurrentState():string
    {
        return $this->getStateName();
    }
}
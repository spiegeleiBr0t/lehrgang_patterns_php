<?php

namespace Uebung\D2_StatePattern_doc\ConcreteState;

use Uebung\D2_StatePattern_doc\Doc;
use Uebung\D2_StatePattern_doc\DocState;
use Uebung\D2_StatePattern_doc\StateHelper;

class ReviewState implements DocState
{
    use StateHelper;
    public function submitForReview(Doc $doc): void
    {
        echo $this->nope(" plz the doc is already in review...");
        echo $this->getStateInfos($doc);
    }

    public function publish(Doc $doc): void
    {
        $doc->getDocState(new PublishedState());
        echo "Transition made to Publish - Doc Published ".PHP_EOL;
        echo $this->getStateInfos($doc);
    }

    public function archive(Doc $doc): void
    {
        echo $this->nope(" plz first review and publish this!");
        echo $this->getStateInfos($doc);
    }

    public function rejectReview(Doc $doc): void
    {
        $doc->getDocState(new DraftState());
        echo "Transition made to Draft - Doc Rejected ".PHP_EOL;
        echo $this->getStateInfos($doc);
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
<?php

namespace Uebung\D2_StatePattern_doc\ConcreteState;

use Uebung\D2_StatePattern_doc\Doc;
use Uebung\D2_StatePattern_doc\DocState;
use Uebung\D2_StatePattern_doc\StateHelper;

class PublishedState implements DocState
{
    use StateHelper;
    public function submitForReview(Doc $doc): void
    {
        echo $this->nope(" not possible published docs!");
        echo $this->getStateInfos($doc);
    }

    public function publish(Doc $doc): void
    {
        echo $this->nope(" not possible published docs!");
        echo $this->getStateInfos($doc);
    }

    public function archive(Doc $doc): void
    {
        echo "Transition made to Review ".PHP_EOL;
        $doc->setDocState(new ArchivedState());
        echo $this->getStateInfos($doc);
    }

    public function rejectReview(Doc $doc): void
    {
        echo $this->nope(" not possible published docs!");
        echo $this->getStateInfos($doc);
    }

    public function getStateName(): string
    {
        return "Published";
    }
    public function getCurrentState():string
    {
        return $this->getStateName();
    }
}
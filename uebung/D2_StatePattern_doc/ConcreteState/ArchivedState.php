<?php

namespace Uebung\D2_StatePattern_doc\ConcreteState;

use Uebung\D2_StatePattern_doc\Doc;
use Uebung\D2_StatePattern_doc\DocState;
use Uebung\D2_StatePattern_doc\StateHelper;

class ArchivedState implements DocState
{
    use StateHelper;

    public function submitForReview(Doc $doc): void
    {
        echo $this->nope(" not possible for archived docs!");
        echo $this->getStateInfos($doc);
    }

    public function publish(Doc $doc): void
    {
        echo $this->nope(" not possible for archived docs!");
        echo $this->getStateInfos($doc);
    }

    public function archive(Doc $doc): void
    {
        echo $this->nope(" not possible for archived docs!");
        echo $this->getStateInfos($doc);
    }

    public function rejectReview(Doc $doc): void
    {
        echo $this->nope(" not possible for archived docs!");
        echo $this->getStateInfos($doc);
    }

    public function getStateName(): string
    {
        echo "Archived";
    }
    public function getCurrentState():string
    {
        return $this->getStateName();
    }
}
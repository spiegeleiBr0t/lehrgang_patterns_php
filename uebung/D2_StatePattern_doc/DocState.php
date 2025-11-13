<?php

namespace D2_StatePattern_doc;

interface DocState
{
    public function submitForReview(Doc $doc): void;
    public function publish(Doc $doc): void;
    public function archive(Doc $doc): void;
    public function rejectReview(Doc $doc): void;
    public function getStateName(): string;
    public function getCurrentState():string;

}
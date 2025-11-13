<?php
use D2_StatePattern_doc\Doc;
use

$doc = new Doc("Mein Artikel");
echo $doc->getCurrentState(); // Draft

$doc->submitForReview();
echo $doc->getCurrentState(); // Review

$doc->publish();
echo $doc->getCurrentState(); // Published

$doc->archive();
echo $doc->getCurrentState(); // Archived

// Ungültiger Übergang
$doc->publish(); // Fehler: Archivierte Dokumente können nicht veröffentlicht werden
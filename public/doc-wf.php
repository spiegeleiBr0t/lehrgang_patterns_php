<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Uebung\D2_StatePattern_doc\Doc;


$doc = new Doc("Mein Artikel");
echo $doc->getDocState()->getStateName(); // Draft

$doc->submitForReview();
echo $doc->getDocState()->getStateName(); // Review

$doc->publish();
echo $doc->getDocState()->getStateName(); // Published

$doc->archive();
echo $doc->getDocState()->getStateName(); // Archived

// Ungültiger Übergang
$doc->publish(); // Fehler: Archivierte Dokumente können nicht veröffentlicht werden
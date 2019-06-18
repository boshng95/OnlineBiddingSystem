<?php
header('Content-Type: application/xml');
$xml = new DomDocument();
$xml->load('auction.xml');
//$element = $xml->getElementsByTagName('listing')->item(0)->textContent;
echo $xml->saveXML();
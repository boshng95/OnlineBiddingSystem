<?php
header('Content-Type: application/xml');
$xmlDoc = new DOMDocument();
$xmlDoc->load("../../data/customer.xml");
echo $xmlDoc->saveXML();
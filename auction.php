<?php
if (!file_exists("../../data/auction.xml")) {
    $domtree = new DOMDocument('1.0', 'UTF-8');
    $domtree->preserveWhiteSpace = false;
    $domtree->formatOutput = true;
    $xslt = $domtree->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="auctionReport.xsl"');
    $domtree->appendChild($xslt);

    $xmlRoot = $domtree->createElement("listings");
    $xmlRoot = $domtree->appendChild($xmlRoot);

    $xmlListing = $domtree->createElement("listing");
    $xmlListing = $xmlRoot->appendChild($xmlListing);

    $xmlListing->appendChild($domtree->createElement('listingID', '1'));
    $xmlListing->appendChild($domtree->createElement('itemName', 'testing'));
    $xmlListing->appendChild($domtree->createElement('category', 'Camera'));
    $xmlListing->appendChild($domtree->createElement('desc', 'Canon'));
    $xmlListing->appendChild($domtree->createElement('startPrice', '100'));
    $xmlListing->appendChild($domtree->createElement('reservePrice', '200'));
    $xmlListing->appendChild($domtree->createElement('buyNowPrice', '300'));
    $xmlListing->appendChild($domtree->createElement('startDate', '12/05/2019'));
    $xmlListing->appendChild($domtree->createElement('startTime', '10:00'));
    $xmlListing->appendChild($domtree->createElement('day', '1'));
    $xmlListing->appendChild($domtree->createElement('hour', '0'));
    $xmlListing->appendChild($domtree->createElement('minute', '0'));
    $xmlListing->appendChild($domtree->createElement('status', 'In Progress'));
    $xmlListing->appendChild($domtree->createElement('winningCustomer', '2'));
    $xmlListing->appendChild($domtree->createElement('latestPrice', '120'));
    $xmlListing->appendChild($domtree->createElement('customerCreatedID', '1'));
    $domtree->save("../../data/auction.xml");
}

header('Content-Type: application/xml');
$xmlDoc = new DOMDocument();
$xmlDoc->load("../../data/auction.xml");
echo $xmlDoc->saveXML();
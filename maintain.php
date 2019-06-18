<?php
$dom = new DomDocument();
$dom->load('../../data/auction.xml');
$x = $dom->getElementsByTagName('listing');
if ($_POST["action"] == "update") {
    foreach ($x as $item) {
        $status = $item->getElementsByTagName("status");
        $currentStatus = $status->item(0)->textContent;

        $startDate = $item->getElementsByTagName("startDate");
        $startDate = $startDate->item(0)->textContent;

        $startTime = $item->getElementsByTagName("startTime");
        $startTime = $startTime->item(0)->textContent;

        $day = $item->getElementsByTagName("day");
        $day = $day->item(0)->textContent;

        $hour = $item->getElementsByTagName("hour");
        $hour = $hour->item(0)->textContent;

        $minute = $item->getElementsByTagName("minute");
        $minute = $minute->item(0)->textContent;

        $reservePrice = $item->getElementsByTagName("reservePrice");
        $reservePrice = $reservePrice->item(0)->textContent;

        $latestPrice = $item->getElementsByTagName("latestPrice");
        $latestPrice = $latestPrice->item(0)->textContent;

        if ($currentStatus == "In Progress") {

            $startString = $startDate . " " . $startTime;

            $start = DateTime::createFromFormat("d/m/Y H:i", $startString);
            $end = DateTime::createFromFormat("d/m/Y H:i", $startString);
            $now = new DateTime();

            $addDuration = "P" . $day . "DT"  . $hour . "H" . $minute . "M0S";

            $end->add(new DateInterval($addDuration));

            $interval = $now->diff($end);
            //echo $interval->format('%R%a days %h hours %m minutes');
            $diff = $interval->invert;
            //check time
            if ($diff == 1) {
                //check price
                //change status
                if ($latestPrice > $reservePrice) {
                    $status->item(0)->nodeValue = "SUCCESS";
                } else if ($latestPrice < $reservePrice) {
                    $status->item(0)->nodeValue = "FAILED";
                }
            }
        }
    }
    $dom->save('../../data/auction.xml');
    echo "The XML update process is complete";
} else if ($_POST["action"] == "generate") {

    //echo "generate";
    $xml = new DOMDocument;
    $xml->load('../../data/auction.xml');

    // Load XSL file
    $xsl = new DOMDocument;
    $xsl->load('auctionReport.xsl');

    // Configure the transformer
    $proc = new XSLTProcessor;

    // Attach the xsl rules
    $proc->importStyleSheet($xsl);

    echo $proc->transformToXML($xml);
}
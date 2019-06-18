<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 1 Web Application Development" />
    <meta name="keywords" content="XML" />
    <meta name="author" content="Bosh (Hou Jun Ng)" />
    <title>Assignment 2, Semester 3, 2019</title>
    <link href="styles/style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <h1>Shop Online</h1>
    </header>
    <nav>
        <a class="navigation" href="shoponline.php">Home</a>
        <a class="navigation" href="register.php">Register</a>
        <a class="navigation" href="listing.php">Listing</a>
        <a class="navigation" href="bidding.php">Bidding</a>
        <a class="navigation" href="maintenance.php">Maintenance</a>
        <a class="navigation" href="login.php">Log In</a>
        <a class="navigation" href="logout.php"><button>Log Out</button></a>
    </nav>
    <section>
        <?php
        session_start();
        //$_SESSION = array();
        //var_dump($_SESSION);
        if (!isset($_SESSION["bid"]) && !isset($_SESSION["buy"])) {
            //var_dump($_SESSION);
            //var_dump($_SESSION);
            die("Please back to Shop Online Home Page<br \><a href=\"shoponline.php\">Home</a>");
        }
        //var_dump($_POST);

        if (isset($_SESSION['buy'])) {
            $dom = new DomDocument();
            $dom->load('../../data/auction.xml');
            $x = $dom->getElementsByTagName('listing');
            foreach ($x as $item) {
                $listingID = $item->getElementsByTagName("listingID");
                $listingID = $listingID->item(0)->textContent;

                $itemName = $item->getElementsByTagName("itemName");
                $itemName = $itemName->item(0)->textContent;
                if ($listingID == $_SESSION['buy']["itemID"]) {
                    $winCustomer = $item->getElementsByTagName("winningCustomer");
                    $winCustomer->item(0)->nodeValue = $_SESSION["customerID"];

                    $buyNow = $item->getElementsByTagName("buyNowPrice");
                    $buyNow = $buyNow->item(0)->textContent;

                    $latestPrice = $item->getElementsByTagName("latestPrice");
                    $latestPrice->item(0)->nodeValue = $buyNow;

                    $status = $item->getElementsByTagName("status");
                    $status->item(0)->nodeValue = "SOLD";

                    echo "<h3>itemID: " . $listingID . "</h3>";
                    echo "<h3>item Name: " . $itemName . "</h3>";
                    echo "<h3>Buy Now Price: " . $buyNow . "</h3>";
                    echo "<h3>Thank you for purchasing this item.</h3>";
                }
            }
            $dom->save('../../data/auction.xml');
            unset($_SESSION['buy']);
        } else if (isset($_SESSION['bid'])) {
            $bidPrice = (float)$_POST["bidPrice"];
            $dom = new DomDocument();
            $dom->load('../../data/auction.xml');
            $x = $dom->getElementsByTagName('listing');

            foreach ($x as $item) {
                $listingID = $item->getElementsByTagName("listingID");
                $listingID = $listingID->item(0)->textContent;

                $itemName = $item->getElementsByTagName("itemName");
                $itemName = $itemName->item(0)->textContent;

                if ($listingID == $_SESSION['bid']["itemID"]) {

                    $currentPrice = $item->getElementsByTagName("latestPrice");
                    $latestPrice = $currentPrice->item(0)->textContent;

                    $buyNowPrice = $item->getElementsByTagName("buyNowPrice");
                    $buyNowPrice = $buyNowPrice->item(0)->textContent;
                    if ($bidPrice >= $buyNowPrice) {
                        echo "<h3>itemID: " . $listingID . "</h3>";
                        echo "<h3>item Name: " . $itemName . "</h3>";
                        echo "<h3>Last bid Price: " . $latestPrice . "</h3>";
                        echo "<h3>Current bid Price: " . $bidPrice . "</h3>";
                        echo "<h3>You had bid up the limit price. Thank you for purchasing this item.</h3>";

                        $winCustomer = $item->getElementsByTagName("winningCustomer");
                        $winCustomer->item(0)->nodeValue = $_SESSION["customerID"];

                        $currentPrice->item(0)->nodeValue = $bidPrice;

                        $status = $item->getElementsByTagName("status");
                        $status->item(0)->nodeValue = "SOLD";
                    } else if ($bidPrice > (float)$latestPrice) {
                        echo "<h3>itemID: " . $listingID . "</h3>";
                        echo "<h3>item Name: " . $itemName . "</h3>";
                        echo "<h3>Last bid Price: " . $latestPrice . "</h3>";
                        echo "<h3>Current bid Price: " . $bidPrice . "</h3>";
                        echo "<h3>Thank you! Your bid is recorded in ShopOnline.</h3>";

                        $winCustomer = $item->getElementsByTagName("winningCustomer");
                        $winCustomer->item(0)->nodeValue = $_SESSION["customerID"];

                        $currentPrice->item(0)->nodeValue = $bidPrice;
                    } else {
                        echo "<h3>itemID: " . $listingID . "</h3>";
                        echo "<h3>item Name: " . $itemName . "</h3>";
                        echo "<h3>Last bid Price: " . $latestPrice . "</h3>";
                        echo "<h3>Sorry, your bid is not valid</h3>";
                    }
                    $dom->save('../../data/auction.xml');
                }
            }

            unset($_SESSION['bid']);
            //var_dump($_SESSION);
            //echo $dom->getElementsByTagName('listing')->item(0)->textContent;
        }
        ?>
        <br \>
        <a href="shoponline.php">Home</a>
    </section>


</html>
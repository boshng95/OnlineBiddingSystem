<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 2 Web Application Development" />
    <meta name="keywords" content="XML" />
    <meta name="author" content="Bosh (Hou Jun Ng)" />
    <title>Assignment 1, Semester 3, 2019</title>
    <link href="styles/style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <h1>Ship Online</h1>
    </header>
    <nav>
        <a class="navigation" href="shoponline.php">Home</a>
        <a class="navigation" href="register.php">Register</a>
        <a class="navigation" href="listing.php">Listing</a>
        <a class="navigation" href="bidding.php">Bidding</a>
        <a class="navigation" href="maintenance.php">Maintenance</a>
        <a class="navigation" href="login.php">Log In</a>
        <a class="navigation">Log Out</a>
    </nav>
    <section>
        <?php
        session_start();
        if (!isset($_SESSION["id"])) {
            //var_dump($_SESSION);
            die("Please back to Shop Online Home Page<br \><a href=\"shoponline.php\">Home</a>");
        } else {

            echo "<h3>Thank you! Your item has been listed in ShopOnline.</h3>";
            echo "<h3>The item number is " . $_SESSION["id"] . ".</h3>";
            echo "<h3>Bidding starts now : " . $_SESSION["startTime"] . " on " . $_SESSION["startDate"] . "</h3>";


            unset($_SESSION["POST"]);
            unset($_SESSION["id"]);
            unset($_SESSION["startDate"]);
            unset($_SESSION["startTime"]);
            //var_dump($_SESSION);
            /*unset($_SESSION["itemName"]);
            unset($_SESSION["category"]);
            unset($_SESSION["newCategory"]);
            unset($_SESSION["startPrice"]);
            unset($_SESSION["reservePrice"]);
            unset($_SESSION["buyNowPrice"]);
            unset($_SESSION["itemDesc"]);
            unset($_SESSION["day"]);
            unset($_SESSION["hour"]);
            unset($_SESSION["min"]);
            unset($_SESSION["startDate"]);
            unset($_SESSION["startTime"]);*/
        }
        ?>
    </section>
    <footer>
        <br \>
        <a href="shoponline.php">Home</a>
    </footer>
</body>

</html>
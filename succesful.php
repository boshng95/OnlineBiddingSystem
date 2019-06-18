<!--
    Author: Ng Hou Jun (Bosh)
    Student ID: 101912342
    University: Swinburne University of Technology
    Assignment Topic: Assignment 2 (Shop Online )
    Lecture / Tutor: Mr. Wei Lai
-->
<?php
$link = "https://mercury.swin.edu.au/cos80021/s101912342/Assignment2/";
if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == $link) {
    die("Please log in to ShopOnline Login Page<br \><a href=\"login.php\">Home</a>");
}
?>
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
        <h1>Ship Online</h1>
    </header>
    <nav>
        <a class="navigation" href="shoponline.php">Home</a>
        <a class="navigation" href="register.php">Register</a>
        <a class="navigation" href="listing.php">Listing</a>
        <a class="navigation">Bidding</a>
        <a class="navigation">Maintenance</a>
        <a class="navigation" href="login.php">Log In</a>
        <a class="navigation">Log Out</a>
    </nav>
    <section>
        <h2>New User Register Succesfully</h2>

        <br \>
        <?php
        session_start();
        if (!isset($_SESSION["id"])) {
            die("Please back to Shop Online Login Page<br \><a href=\"login.php\">Home</a>");
        } else {
            echo "<p>Hi, " . $_SESSION["fname"] . " Welcome to Shop Online! </p>";
            echo "<p>Your customer id is " . $_SESSION["id"] . " and the password is " . $_SESSION["password"];
            unset($_SESSION["fname"]);
            unset($_SESSION["sname"]);
            unset($_SESSION["email"]);
            unset($_SESSION["password"]);
            unset($_SESSION["cPassword"]);
            unset($_SESSION["id"]);
            echo "<a href=\"login.php\">Home</a>";
        }

        ?>
        <br \>
    </section>
</body>
<footer>
</footer>

</html>
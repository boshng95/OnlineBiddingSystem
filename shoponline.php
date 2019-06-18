<!--
    Author: Ng Hou Jun (Bosh)
    Student ID: 101912342
    University: Swinburne University of Technology
    Assignment Topic: Assignment 2 (Ship Online)
    Lecture / Tutor: Mr. Wei Lai
-->
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
        $link = "https://mercury.swin.edu.au/cos80021/s101912342/Assignment2/";
        if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == $link) {
            die("Please log in to ShopOnline Admin Login Page<br \><a href=\"login.php\">Home</a>");
        }

        session_start();
        if (isset($_SESSION["loginEmail"]) && isset($_SESSION["loginPassword"])) {
            //var_dump($_SESSION);
            $xmldata = simplexml_load_file("../../data/customer.xml");
            foreach ($xmldata->children() as $customer) {
                if ($customer->email == $_SESSION["loginEmail"]) {
                    echo "<h2>Hi " . $customer->firstname . ", Welcome to ShopOnline</h2>";
                    echo "<h3>Please enjoy the bidding & listing procedure in ShopOnline</h3>";
                    $_SESSION["customerID"] =  (string)$customer->id;
                }
            }
        } else {
            if (isset($_POST["loginEmail"]) && isset($_POST["loginPassword"])) {
                $_SESSION["loginEmail"] = $_POST["loginEmail"];
                $_SESSION["loginPassword"] = $_POST["loginPassword"];
                $xmldata = simplexml_load_file("../../data/customer.xml");
                foreach ($xmldata->children() as $customer) {
                    if ($customer->email == $_SESSION["loginEmail"]) {
                        echo "<h2>Hi " . $customer->firstname . ", Welcome to ShopOnline</h2>";
                        echo "<h3>Please enjoy the bidding & listing procedure in ShopOnline</h3>";
                        $_SESSION["customerID"] =  (string)$customer->id;
                    }
                }
            } else {
                die("Please log in to ShopOnline Admin Login Page<br \><a href=\"login.php\">Home</a>");
            }
        }
        ?>
    </section>
</body>

</html>
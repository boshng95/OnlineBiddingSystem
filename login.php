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
    <script type="text/javascript" src="js/login.js"></script>
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
        <a class="navigation" href="login.php"><button>Log Out</button></a>
    </nav>
    <section>
        <form action="shoponline.php" method="POST" class="boxed" id="loginForm">
            <p>Email: <input type="text" id="loginEmail" name="loginEmail" size="50"></p>
            <p>Password: <input type="password" id="loginPassword" name="loginPassword" size="30"></p>
            <input type="button" value="Log In" onclick="loginShipOnline()" />
        </form>
        <span id="haha"></span>
        <br \>
        <a href="#">Home</a>
    </section>
    <footer>
    </footer>
</body>

</html>
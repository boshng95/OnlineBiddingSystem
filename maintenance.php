<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 1 Web Application Development" />
    <meta name="keywords" content="XML" />
    <meta name="author" content="Bosh (Hou Jun Ng)" />
    <title>Assignment 2, Semester 3, 2019</title>
    <link href="styles/style.css" rel="stylesheet" />
    <script type="text/javascript" src="js/maintenance.js"></script>
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
        <form action="maintenance.php" name="maintenance">
            <button type="button" onclick="maintain('update')">Process Auction Items</button>
            <button type="button" onclick="maintain('generate')">Generate Report</button>
        </form>
        <span id="update"></span>
        <span id="generate"></span>
    </section>
</body>

</html>
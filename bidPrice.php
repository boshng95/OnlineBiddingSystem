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
        if (!isset($_SESSION["loginEmail"]) || !isset($_SESSION["loginPassword"])) {
            die("Please log in to Shop Online Login Page<br \><a href=\"login.php\">Home</a>");
        }

        if (isset($_POST["buy"])) {
            $_SESSION["buy"] = $_POST;
            header("Location: bidResults.php");
        } else {
            $_SESSION["bid"] = $_POST;
        }

        ?>
        <form action="bidResults.php" method="POST" class="boxed" id="bidForm" name="bidForm">
            <p>
                <input type="hidden" />
                Please key in the price you want to bid for item ID:
                <?php echo $_POST["itemID"];
                ?> <br \>
                <input type="number" id="bidPrice" name="bidPrice" step="0.01" size="30" />
                <span id="bidPriceErr"></span>
            </p>
            <input type="button" value="Bid!" onclick="bidItem()" />
        </form>
        <div id="feedback"></div>
        <script>
        var xhr = false;
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }

        function bidItemPrice() {
            var bidPrice = document.getElementById("bidPrice").value;
            var itemID = <?php echo $_POST["itemID"]; ?>;
            var index;
            //itemID = parseInt(itemID);
            if (xhr.readyState == 4 && xhr.status == 200) {
                var serverResponse = xhr.responseXML;
                var auction = serverResponse.getElementsByTagName("listing");
                if (bidPrice === "") {
                    document.getElementById("bidPriceErr").innerHTML =
                        "&ensp;&ensp;&#10006;&ensp;Bid Price input field must not be blank";
                    validate = false;
                } else if (bidPrice <= 0) {
                    document.getElementById("bidPriceErr").innerHTML =
                        "&ensp;&ensp;&#10006;&ensp;Bid Price input field must more than 0";
                    validate = false;
                } else {
                    for (i = 0; i < auction.length; i++) {
                        if (itemID == auction[i].children[0].textContent) {
                            index = i;
                        }
                    }

                    var latestPrice = auction[index].children[4].textContent;
                    if (bidPrice > parseFloat(latestPrice)) {
                        document.bidForm.submit();
                    } else {
                        document.getElementById("bidPriceErr").innerHTML =
                            "&ensp;&ensp;&#10006;&ensp;Bid Price is lower than Start Price input field must more than 0 <br \> The start price is $" +
                            latestPrice;
                    }
                }

            }
        }

        function bidItem() {
            xhr.open("POST", "auction.php", true);
            xhr.onreadystatechange = bidItemPrice;
            xhr.send(null);
        }
        </script>
    </section>
</body>

</html>
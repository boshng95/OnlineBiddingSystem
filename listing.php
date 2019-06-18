<!--
    Author: Ng Hou Jun (Bosh)
    Student ID: 101912342
    University: Swinburne University of Technology
    Assignment Topic: Assignment 2 (Shop Online )
    Lecture / Tutor: Mr. Wei Lai
-->
<?php
session_start();
if (!isset($_SESSION["loginEmail"]) || !isset($_SESSION["loginPassword"])) {
    //var_dump($_SESSION);
    die("Please log in to Shop Online Login Page<br \><a href=\"login.php\">Home</a>");
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
    <script type="text/javascript" src="js/listing.js"></script>
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
        <form action="listing.php" method="POST" class="boxed" id="listingForm" name="listingForm">
            <p>
                Item Name: <input type="text" id="itemName" name="itemName" size="50">
                <span id="itemNameErr"></span>
            </p>

            <p>Item Category:
                <select id="category" name="category" onchange="createNewCategory()">
                    <option value="">Please Select</option>
                    <option value="other">Other</option>
                </select>
                <span id="categoryErr"></span>
            </p>
            <p id="new"></p>
            <p>
                Start Price: AUD$
                <input type="number" id="startPrice" name="startPrice" step="0.01" size="4" />
                <span id="startPriceErr"></span>
            </p>
            <p>
                Reserve Price: AUD$
                <input type="number" id="reservePrice" name="reservePrice" step="0.01" size="4" />
                <span id="reservePriceErr"></span>
            </p>
            <p>
                Buy It Now Price: AUD$
                <input type="number" id="buyNowPrice" name="buyNowPrice" step="0.01" size="4" />
                <span id="buyNowPriceErr"></span>
            </p>
            <p>
                Item Description:
                <input type="text" id="itemDesc" name="itemDesc" size="50">
                <span id="itemDescErr"></span>
            </p>
            <p>Duration:
                <select id="day" name="day">
                    <option value="0">Day</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
                <select id="hour" name="hour">
                    <option value="0">Hour</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                </select>
                <select id="min" name="min">
                    <option value="0">Min</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                    <option value="46">46</option>
                    <option value="47">47</option>
                    <option value="48">48</option>
                    <option value="49">49</option>
                    <option value="50">50</option>
                    <option value="51">51</option>
                    <option value="52">52</option>
                    <option value="53">53</option>
                    <option value="54">54</option>
                    <option value="55">55</option>
                    <option value="56">56</option>
                    <option value="57">57</option>
                    <option value="58">58</option>
                    <option value="59">59</option>
                    <option value="60">60</option>
                </select>
                <span id="durationErr"></span>
            </p>

            <input type="button" value="Listing" onclick="addList()" />
            <input type="reset" value="Reset" />
        </form>
        <br \>
        <a href="#">Home</a>
        <?php
        if (!isset($_POST["itemName"])) {
            //var_dump($_SESSION);
        } else {
            if (!isset($_POST["newCategory"])) {
                writeXML($_POST["category"]);
                //echo var_dump($_POST);
            } else {
                writeXML($_POST["newCategory"]);
                //echo var_dump($_POST);
            }
        }

        function writeXML($category)
        {
            $dom = new DomDocument();
            $dom->load('../../data/auction.xml');
            $element = $dom->getElementsByTagName('listing')->item(0);
            $clone = $element->cloneNode(true);

            $folder = $clone->getElementsByTagName("listingID");
            $folder->item(0)->nodeValue =  $dom->getElementsByTagName('listing')->length + 1;
            $id = $dom->getElementsByTagName('listing')->length + 1;

            $folder = $clone->getElementsByTagName("itemName");
            $folder->item(0)->nodeValue = $_POST["itemName"];

            $folder = $clone->getElementsByTagName("category");
            $folder->item(0)->nodeValue = $category;

            $folder = $clone->getElementsByTagName("desc");
            $folder->item(0)->nodeValue = $_POST["itemDesc"];

            $folder = $clone->getElementsByTagName("startPrice");
            $folder->item(0)->nodeValue = $_POST["startPrice"];

            $folder = $clone->getElementsByTagName("reservePrice");
            $folder->item(0)->nodeValue = $_POST["reservePrice"];

            $folder = $clone->getElementsByTagName("buyNowPrice");
            $folder->item(0)->nodeValue = $_POST["buyNowPrice"];

            $folder = $clone->getElementsByTagName("startDate");
            $startDate = date("d/m/Y", $_SERVER['REQUEST_TIME']);
            $folder->item(0)->nodeValue = $startDate;

            $folder = $clone->getElementsByTagName("startTime");
            $startTime = date("H:i", $_SERVER['REQUEST_TIME']);
            $folder->item(0)->nodeValue = $startTime;

            $folder = $clone->getElementsByTagName("day");
            $folder->item(0)->nodeValue = $_POST["day"];

            $folder = $clone->getElementsByTagName("hour");
            $folder->item(0)->nodeValue = $_POST["hour"];

            $folder = $clone->getElementsByTagName("minute");
            $folder->item(0)->nodeValue = $_POST["min"];

            $folder = $clone->getElementsByTagName("status");
            $folder->item(0)->nodeValue = "In Progress";

            $folder = $clone->getElementsByTagName("winningCustomer");
            $folder->item(0)->nodeValue = "nil";

            $folder = $clone->getElementsByTagName("latestPrice");
            $folder->item(0)->nodeValue = $_POST["startPrice"];

            $folder = $clone->getElementsByTagName("customerCreatedID");
            $folder->item(0)->nodeValue = $_SESSION["customerID"];
            //echo $clone->textContent;
            $element->parentNode->insertBefore($clone, $element);
            $dom->save('../../data/auction.xml');


            $_SESSION["POST"] = $_POST;
            $_SESSION["id"] = $id;
            $_SESSION["startDate"] = $startDate;
            $_SESSION["startTime"] = $startTime;
            //var_dump($_SESSION);
            echo '<script> window.location="listSuccesful.php"; </script> ';
        }
        ?>
    </section>
</body>

</html>
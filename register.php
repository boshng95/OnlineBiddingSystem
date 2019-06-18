<!--
    Author: Ng Hou Jun (Bosh)
    Student ID: 101912342
    University: Swinburne University of Technology
    Assignment Topic: Assignment 2 (Ship Online)
    Lecture / Tutor: Mr. Wei Lai
-->
<?php
//$link = "https://mercury.swin.edu.au/cos80021/s101912342/Assignment2/";
$link1 = "https://mercury.swin.edu.au/cos80021/s101912342/Assignment2/succesful.php/";
if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == $link1) {
    die("Please log in to ShopOnline Login Page<br \><a href=\"login.php\">Home</a>");
}
session_start();
if (isset($_SESSION["loginEmail"]) || isset($_SESSION["loginPassword"])) {
    //var_dump($_SESSION);
    die("Please log in to Shop Online Home Page. You already Logged In<br \><a href=\"shoponline.php\">Home</a>");
}
if (!file_exists("../../data/customer.xml")) {

    $domtree = new DOMDocument('1.0', 'UTF-8');
    $domtree->preserveWhiteSpace = false;
    $domtree->formatOutput = true;
    $xmlRoot = $domtree->createElement("customers");
    $xmlRoot = $domtree->appendChild($xmlRoot);

    $xmlCustomer = $domtree->createElement("customer");
    $xmlCustomer = $xmlRoot->appendChild($xmlCustomer);

    $xmlCustomer->appendChild($domtree->createElement('id', '1'));
    $xmlCustomer->appendChild($domtree->createElement('firstname', 'testing'));
    $xmlCustomer->appendChild($domtree->createElement('surname', 'testing'));
    $xmlCustomer->appendChild($domtree->createElement('email', 'testing@gmail.com'));
    $xmlCustomer->appendChild($domtree->createElement('password', 'testing'));
    $domtree->save("../../data/customer.xml");
}
?>
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
        <form method="POST" action="register.php" class="boxed" name="registerForm">
            <p>
                First Name: <input type="text" name="fname" size="30" required>
                <span id="fnameErr"></span>
            </p>
            <p>
                Surname: <input type="text" name="sname" size="30" required>
                <span id="snameErr"></span>
            </p>
            <p>
                Email Address: <input type="text" name="email" size="50" required>
                <span id="emailErr"></span>
            </p>
            <p>
                Password: <input type="password" name="password" size="30" required>
                <span id="passwordErr"></span>
            </p>
            <p>
                Confirm Password: <input type="password" name="cPassword" size="30" required>
                <span id="cPasswordErr"></span>
            </p>
            <input type="button" value="Register" onclick="registerShipOnline()" />
        </form>
        <script>
        var xhr = false;
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }

        function register() {
            var fname = document.registerForm.fname.value;
            var sname = document.registerForm.sname.value;
            var email = document.registerForm.email.value;
            var password = document.registerForm.password.value;
            var cPassword = document.registerForm.cPassword.value;
            if (xhr.readyState == 4 && xhr.status == 200) {
                var serverResponse = xhr.responseXML;
                var header = serverResponse.getElementsByTagName("customer");
                //alert("HAHA");
                if (validateInput(fname, sname, email, password, cPassword, header)) {

                    document.registerForm.submit();
                    xhr.open("POST", "register.php", true)
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send(null);
                }
            }
        }

        function registerShipOnline() {
            xhr.open("POST", "customer.php", true);
            xhr.onreadystatechange = register;
            xhr.send(null);
        }

        function validateInput(fname, sname, email, password, cPassword, header) {
            var detected;
            var emailReg =
                /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (fname == "") {
                document.getElementById("fnameErr").innerHTML =
                    "&ensp;&ensp;&#10006;&ensp;First name input field must not be blank";
                detected = false;
            } else {
                document.getElementById("fnameErr").innerHTML = "";
                detected = true;
            }

            if (sname == "") {
                document.getElementById("snameErr").innerHTML =
                    "&ensp;&ensp;&#10006;&ensp;Last name input field must not be blank";
                detected = false;
            } else {
                document.getElementById("snameErr").innerHTML = "";
                detected = true;
            }

            if (email == "") {
                document.getElementById("emailErr").innerHTML =
                    "&ensp;&ensp;&#10006;&ensp;Emaill address input field must not be blank";
                detected = false;
            } else {
                document.getElementById("emailErr").innerHTML = "";
                detected = true;
            }

            if (!emailReg.test(email)) {
                document.getElementById("emailErr").innerHTML =
                    "&ensp;&ensp;&#10006;&ensp;Emaill address input not match to valid format";
                detected = false;
            }

            if (password == "") {
                document.getElementById("passwordErr").innerHTML =
                    "&ensp;&ensp;&#10006;&ensp;Password input field must not be blank";
                detected = false;
            } else {
                document.getElementById("passwordErr").innerHTML = "";
                detected = true;
            }

            if (cPassword == "") {
                document.getElementById("cPasswordErr").innerHTML =
                    "&ensp;&ensp;&#10006;&ensp;Confirm password input field must not be blank";
                detected = false;
            } else {
                document.getElementById("cPasswordErr").innerHTML = "";
                detected = true;
            }

            if (password != cPassword) {
                document.getElementById("passwordErr").innerHTML =
                    "&ensp;&ensp;&#10006;&ensp;Password input not match with confirm password";
                document.getElementById("cPasswordErr").innerHTML =
                    "&ensp;&ensp;&#10006;&ensp;Confirm password input not match with original password";
                detected = false;
            }

            for (i = 0; i < header.length; i++) {
                if (email === header[i].children[3].textContent) {
                    document.getElementById("emailErr").innerHTML =
                        "&ensp;&ensp;&#10006;&ensp;Emaill address used before, please choose another one";
                    detected = false;
                }
            }

            return detected;
        }
        </script>
        <?php
        if (!isset($_POST["fname"])) { } else {
            //echo "Register Succesfully";
            $dom = new DomDocument();
            $dom->load('../../data/customer.xml');
            $element = $dom->getElementsByTagName('customer')->item(0);
            $clone = $element->cloneNode(true);

            $folder = $clone->getElementsByTagName("id");
            $folder->item(0)->nodeValue =  $dom->getElementsByTagName('customer')->length + 1;
            $id = $dom->getElementsByTagName('customer')->length + 1;

            $folder = $clone->getElementsByTagName("firstname");
            $folder->item(0)->nodeValue = $_POST["fname"];

            $folder = $clone->getElementsByTagName("surname");
            $folder->item(0)->nodeValue = $_POST["sname"];

            $folder = $clone->getElementsByTagName("email");
            $folder->item(0)->nodeValue = $_POST["email"];

            $folder = $clone->getElementsByTagName("password");
            $folder->item(0)->nodeValue = $_POST["password"];

            $element->parentNode->insertBefore($clone, $element);
            $dom->save('../../data/customer.xml');


            $to = $_POST["email"];

            $subject = "Welcome to ShopOnline";

            $message = "Dear " . $_POST["fname"] . ", welcome to use ShopOnline! Your customer id is " . $id . " and the password is " . $_POST["password"] . ".";

            $headers = "Content-Type: text/html; charset=utf-8\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Return-Path: <101912342@student.swin.edu.au>\r\n";
            $headers .= "From: <registration@shoponline.com.au>\r\n";
            $headers .= "Reply-To: <101912342@student.swin.edu.au>\r\n";

            $result = mail(
                $to,
                $subject,
                $message,
                $headers,
                "-r 101912342@student.swin.edu.au"
            );
            if ($result == true) {
                echo "<p>Message Sent</p>";
                session_start();
                $_SESSION = $_POST;
                $_SESSION["id"] = $id;
                echo '<script> window.location="succesful.php"; </script> ';
                return true;
            } else {
                return false;
            }

            //unset($_POST);
        }

        ?>
    </section>
    <footer>
    </footer>
</body>

</html>
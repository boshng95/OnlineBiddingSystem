var xhr = false;
if (window.XMLHttpRequest) {
  xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

function getUserList() {
  var detected = false;
  var email = document.getElementById("loginEmail").value;
  var password = document.getElementById("loginPassword").value;

  if (xhr.readyState == 4 && xhr.status == 200) {
    var serverResponse = xhr.responseXML;
    var header = serverResponse.getElementsByTagName("customer");
    //alert(header[0].children[3].textContent);
    if (header === null) {
      alert("No such user");
    } else {
      for (i = 0; i < header.length; i++) {
        if (
          header[i].children[3].textContent === email &&
          header[i].children[4].textContent === password
        ) {
          detected = true;
          //alert("Login user");
          document.getElementById("loginForm").submit();
          //window.location.href = "shiponline.php";
        }
      }
      if (detected === false) {
        alert("No such user");
      }
    }
  }
}

function loginShipOnline() {
  xhr.open("POST", "customer.php", true);
  xhr.onreadystatechange = getUserList;
  xhr.send(null);
}

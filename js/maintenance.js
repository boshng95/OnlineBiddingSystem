var xhr = false;
if (window.XMLHttpRequest) {
  xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

function update(action) {
  //console.log(action);
  if (xhr.readyState == 4 && xhr.status == 200) {
    if (action === "update") {
      var serverResponse = xhr.responseText;
      document.getElementById("update").innerHTML = serverResponse;
      document.getElementById("generate").innerHTML = "";
    } else {
      //var serverResponse = xhr.responseText;
      document.getElementById("update").innerHTML = "";
      //document.getElementById("generate").innerHTML = serverResponse;
      xml = loadXMLDoc("auction.php");
      xsl = loadXMLDoc("auctionReport.xsl");
      xsltProcessor = new XSLTProcessor();
      xsltProcessor.importStylesheet(xsl);
      resultDocument = xsltProcessor.transformToFragment(xml, document);
      document.getElementById("generate").appendChild(resultDocument);
    }
  }
}

function loadXMLDoc(filename) {
  if (window.ActiveXObject) {
    xhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } else {
    xhttp = new XMLHttpRequest();
  }
  xhttp.open("GET", filename, false);
  try {
    xhttp.responseType = "msxml-document";
  } catch (err) {} // Helping IE11
  xhttp.send("");
  return xhttp.responseXML;
}

function maintain(action) {
  var params = "action=" + action;
  xhr.open("POST", "maintain.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(params);
  xhr.onreadystatechange = function() {
    update(action);
  };
}

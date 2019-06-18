var totalCount = 0;

var xhr = false;
if (window.XMLHttpRequest) {
  xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

xhr.open("POST", "auction.php", true);
xhr.onreadystatechange = getBiddingView;
xhr.send(null);

function getBiddingView() {
  var view = document.getElementById("biddingView");
  if (xhr.readyState == 4 && xhr.status == 200) {
    var serverResponse = xhr.responseXML;
    var categories = serverResponse.getElementsByTagName("listing");
    totalCount = categories.length;
    for (i = 0; i < categories.length; i++) {
      if (categories[i].children[12].textContent === "In Progress") {
        var dateArray = categories[i].children[7].textContent.split("/");
        var element = dateArray[0];
        dateArray.splice(0, 1);
        dateArray.splice(1, 0, element);
        dateArray = dateArray.join("/");
        dateArray = dateArray + " " + categories[i].children[8].textContent;
        var startDate = new Date(dateArray);
        var endDate = new Date(dateArray);
        //console.log("Original: " + date);
        endDate.setDate(
          endDate.getDate() + parseInt(categories[i].children[9].textContent)
        );
        endDate.setHours(
          endDate.getHours() + parseInt(categories[i].children[10].textContent)
        );
        endDate.setMinutes(
          endDate.getMinutes() +
            parseInt(categories[i].children[11].textContent)
        );

        var countDate =
          endDate.getMonth() +
          1 +
          "/" +
          endDate.getDate() +
          "/" +
          endDate.getFullYear() +
          " " +
          endDate.getHours() +
          ":" +
          endDate.getMinutes() +
          ":00";

        view.innerHTML +=
          '<div class="boxed">' +
          "<p>Item No: " +
          categories[i].children[0].textContent +
          "</p>" +
          "<p>Item Name: " +
          categories[i].children[1].textContent +
          "</p>" +
          "<p>Category: " +
          categories[i].children[2].textContent +
          "</p>" +
          "<p>Description: " +
          categories[i].children[3].textContent +
          "</p>" +
          "<p>Buy-it-Now Price: " +
          categories[i].children[6].textContent +
          "</p>" +
          "<p>Bid Price: " +
          categories[i].children[14].textContent +
          "</p>" +
          '<p>Duration Left: <span id="time' +
          categories[i].children[0].textContent +
          '" data-countdown="' +
          countDate +
          '"></span></p>' +
          "<form method='post' action='bidPrice.php' id='bidPrice' name='bidPrice'>" +
          '<input type="hidden" id="itemID" name="itemID" value=' +
          categories[i].children[0].textContent +
          " />" +
          "<button type='submit' value='bid' id='bid" +
          categories[i].children[0].textContent +
          "' name='bid'>Place Bid</button>" +
          "<button type='submit' value='buy' id='buy" +
          categories[i].children[0].textContent +
          "' name='buy'>Buy it Now</button></form>";
      }
    }
  }

  $(function() {
    $("[data-countdown]").each(function() {
      var $this = $(this),
        finalDate = $(this).data("countdown");
      $this.countdown(finalDate, function(event) {
        $this.html(event.strftime("%D days %H:%M:%S"));

        if (event.elapsed) {
          var itemID = this.id.substr(4);
          document.getElementById("buy" + itemID).disabled = true;
          document.getElementById("bid" + itemID).disabled = true;
        }
      });
    });
  });
}

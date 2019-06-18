var xhr = false;
if (window.XMLHttpRequest) {
  xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) {
  xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

xhr.open("POST", "auction.php", true);
xhr.onreadystatechange = getCategoryList;
xhr.send(null);

function getCategoryList() {
  var categoryArr = [];
  var categoryList = document.getElementById("category");

  if (xhr.readyState == 4 && xhr.status == 200) {
    var serverResponse = xhr.responseXML;
    var categories = serverResponse.getElementsByTagName("category");
    // add all category from XML
    for (i = 0; i < categories.length; i++) {
      x = categories[i].textContent.toLowerCase();
      categoryArr.push(x);
    }
    // scan & remove if any duplicate category
    let findDuplicates = categoryArr =>
      categoryArr.filter((e, i) => categoryArr.indexOf(e) >= i);

    //append only unique category
    for (i = 0; i < categories.length; i++) {
      if (findDuplicates(categoryArr)[i] != undefined) {
        var opt = document.createElement("option");
        opt.appendChild(
          document.createTextNode(findDuplicates(categoryArr)[i])
        );
        opt.value = findDuplicates(categoryArr)[i];
        categoryList.appendChild(opt);
      }
    }
  }
}

function createNewCategory() {
  var x = document.getElementById("category").value;
  //console.log(x);
  if (x === "other") {
    document.getElementById("new").innerHTML =
      '<p>New Category: <input type="text" id="newCategory" name="newCategory" size="50"/><span id="newCategoryErr"></span></p>';
  } else {
    document.getElementById("new").innerHTML = "";
  }
}

function addList() {
  var name = document.listingForm.itemName.value;
  var category = document.listingForm.category.value;
  var startPrice = document.listingForm.startPrice.value;
  var reservePrice = document.listingForm.reservePrice.value;
  var buyNowPrice = document.listingForm.buyNowPrice.value;
  var desc = document.listingForm.itemDesc.value;
  var day = document.listingForm.day.value;
  var hour = document.listingForm.hour.value;
  var minute = document.listingForm.min.value;

  if (category === "other") {
    var newCategory = document.listingForm.newCategory.value;
    if (
      validateInput(
        name,
        category,
        startPrice,
        reservePrice,
        buyNowPrice,
        desc
      ) === true &&
      validateNewCategory(newCategory) === true &&
      validateDuration(day, hour, minute) === true
    ) {
      document.listingForm.submit();
    }
  } else {
    if (
      validateInput(
        name,
        category,
        startPrice,
        reservePrice,
        buyNowPrice,
        desc
      ) === true &&
      validateDuration(day, hour, minute) === true
    ) {
      document.listingForm.submit();
    }
  }
}

function addListing() {
  xhr.open("POST", "addListing.php", true);
  xhr.onreadystatechange = addList;
  xhr.send(null);
}

function validateDuration(day, hour, min) {
  var dayToMinute = parseInt(day) * 1440;
  var hourToMinute = parseInt(hour) * 60;
  min = parseInt(min);
  totalMin = dayToMinute + hourToMinute + min;
  if (totalMin >= 1) {
    return true;
  } else {
    document.getElementById("durationErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Duration input field must be more than/equal to 1 min";
  }
  return false;
}

function validateNewCategory(newCategory) {
  var validate;
  if (newCategory === "") {
    document.getElementById("newCategoryErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;New Category input field must not be blank";
    validate = false;
  } else {
    document.getElementById("newCategoryErr").innerHTML = "";
    validate = true;
  }
  return validate;
}

function validateInput(
  name,
  category,
  startPrice,
  reservePrice,
  buyNowPrice,
  desc
) {
  var validate;
  if (name === "") {
    document.getElementById("itemNameErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Item Name input field must not be blank";
    validate = false;
  } else {
    document.getElementById("itemNameErr").innerHTML = "";
    validate = true;
  }

  if (category === "") {
    document.getElementById("categoryErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Category input field must not be blank";
    validate = false;
  } else {
    document.getElementById("categoryErr").innerHTML = "";
    validate = true;
  }

  if (startPrice === "") {
    document.getElementById("startPriceErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Start Price input field must not be blank";
    validate = false;
  } else if (startPrice <= 0) {
    document.getElementById("startPriceErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Start Price input field must more than 0";
    validate = false;
  } else {
    document.getElementById("startPriceErr").innerHTML = "";
    validate = true;
  }

  if (reservePrice === "") {
    document.getElementById("reservePriceErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Reserve Price input field must not be blank";
    validate = false;
  } else if (reservePrice <= 0) {
    document.getElementById("reservePriceErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Reserve Price input field must more than 0";
    validate = false;
  } else {
    document.getElementById("reservePriceErr").innerHTML = "";
    validate = true;
  }

  if (buyNowPrice === "") {
    document.getElementById("buyNowPriceErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Buy Now Price input field must not be blank";
    validate = false;
  } else if (buyNowPrice <= 0) {
    document.getElementById("buyNowPriceErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Buy Now Price input field must more than 0";
    validate = false;
  } else {
    document.getElementById("buyNowPriceErr").innerHTML = "";
    validate = true;
  }

  if (desc === "") {
    document.getElementById("itemDescErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Item Description input field must not be blank";
    validate = false;
  } else {
    document.getElementById("itemDescErr").innerHTML = "";
    validate = true;
  }

  if (!(parseFloat(startPrice) < parseFloat(reservePrice))) {
    document.getElementById("startPriceErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Start Price must lower than Reserve Price";
    document.getElementById("reservePriceErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Start Price must lower than Reserve Price";
    validate = false;
  }

  if (!(parseFloat(reservePrice) < parseFloat(buyNowPrice))) {
    document.getElementById("reservePriceErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Reserve Price must lower than Buy Now Price";
    document.getElementById("buyNowPriceErr").innerHTML =
      "&ensp;&ensp;&#10006;&ensp;Reserve Price must lower than Buy Now Price";
    validate = false;
  }

  return validate;
}

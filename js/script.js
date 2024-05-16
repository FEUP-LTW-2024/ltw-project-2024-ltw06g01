function print_wishlist() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../api/print_wishlist.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
    xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 400) {
        var wishlistItems = JSON.parse(xhr.responseText);
        var container = document.querySelector(".print_stuff");
        container.innerHTML = ""; 
        var div = document.createElement("div");
        div.className = 'profile_listings';
        var wishlistList = document.createElement("ul");
        for (var i = 0; i < wishlistItems.length; i++) {

          var item = wishlistItems[i];

          var listItem = document.createElement("li");
          listItem.innerHTML =

            "<div class='atc'>" +

            "<img class='slistings' src='" + item.image + "' >" +

            "<p id='slisting_name'>" + item.name + "</p>" +
            "<p id = 'slisting_price'>" + item.price + "</p>"

            +"<form method= 'POST' action = '../actions/remove_wishlist_action.php'>"
            +"<input type='hidden' name='IdListing' value='" + item.IdListing + "'>"
            +   "<button type='submit'>"
            +     "<img src ='../img/heart.png' id = 'coracao'>"
            +   "</button>"
            +"</form> "

            +"</div>"

          wishlistList.appendChild(listItem);

        }

        div.appendChild(wishlistList);
        container.appendChild(div);
      }
    };
    xhr.send('print_wishlist=true'); 
}
function print_self_listings(){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../api/print_self_listings.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
    xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 400) {
        var listingItems = JSON.parse(xhr.responseText);
        var container = document.querySelector(".print_stuff");
        container.innerHTML = ""; 
        var div = document.createElement("div");
        div.className = 'profile_listings';
        var listingList = document.createElement("ul");
        for (var i = 0; i < listingItems.length; i++) {
          var item = listingItems[i];
          var listItem = document.createElement("li");
          listItem.innerHTML =

            "<div class='atc'>" +

            "<img class='slistings' src='" + item.image + "' >" +
            "<p id='slisting_name'>" + item.name + "</p>" +
            "<p id = 'slisting_price'>" + item.price + "</p>"

            +"<form method= 'POST' action = '../actions/remove_listing_action.php'>"
            +"<input type='hidden' name='IdListing' value='" + item.IdListing + "'>"
            +   "<button type='submit'>"
            +     "<img src ='../img/trash.png' id = 'lixo'>"
            +   "</button>"
            +"</form> "

            +"</div>";

          listingList.appendChild(listItem);
        }
        div.appendChild(listingList);
        container.appendChild(div);
      }
    };
    xhr.send('print_self_listings=true'); 
}
  
function print_sold_listings(){
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../api/print_sold_listings.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 400) {
      var listingItems = JSON.parse(xhr.responseText);
      var container = document.querySelector(".print_stuff");
      container.innerHTML = ""; 
      var div = document.createElement("div");
      div.className = 'profile_listings';
      var listingList = document.createElement("ul");
      for (var i = 0; i < listingItems.length; i++) {
        var item = listingItems[i];
        var listItem = document.createElement("li");
        listItem.innerHTML =
          "<img class='slistings' src='" +
          item.image +
          "' >" +
          "<p id='slisting_name'>" +
          item.name +
          "</p>" +
          "<p id = 'slisting_price'>" +
          item.price +
          "</p>"
          ;
        listingList.appendChild(listItem);
      }
      div.appendChild(listingList);
      container.appendChild(div);
    }
  };
  xhr.send('print_sold_listings=true'); 
}
document.addEventListener("DOMContentLoaded", function(event) {
  const wishlistForms = document.querySelectorAll('#wishlist_form');

  wishlistForms.forEach(function(form) {
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      const data = new FormData(form); 
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../api/add_wishlist.php', true);
      const dataObject = {};
      for (const [key, value] of data.entries()) {
        dataObject[key] = value;
      }
      const jsonData = JSON.stringify(dataObject);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.send(jsonData);
    });
  });
});

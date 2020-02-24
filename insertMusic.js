document.getElementById('clearImageFile').addEventListener('click', function() {
  document.getElementById('imageFile').value = '';
});

function validateForm(){
  /* Get Checked Radio using a one liner */
  var selectedRating = document.querySelector('input[name="rating"]:checked'); // Returns Null if no element is selected
  if( selectedRating === null) {
    alert("Rating must be filled out");
    return false;
  }
    // var title = document.getElementById("titleText").value;
    // if (title == "") {
    //   alert("Title must be filled out");
    //   return false;
    // }

    // var image = document.getElementById("imageText").value;
    // if (image == "") {
    //   alert("Image must be filled out");
    //   return false;
    // }
    
    // // /* Get checked radio  using a loop */
    // // var rating = document.getElementsByName('rating'); // Get a collection of HTML Radio objects with the name rating
    // // var selectedRating = 0;

    // // for( var i = 0; i < rating.length; i++ ) { // Loop through the collection
    // //   if( rating[i].checked === true ) { // DOnt really need === true, but it's easier for a learned to read
    // //     selectedRating = rating[i].value
    // //   }
    // // }
    
    // // if( selectedRating === 0) {
    // //   alert("Rating must be filled out");
    // //   return false;
    // // }

  

    // var artist = document.getElementById("artistText").value;
    // if (artist == "") {
    //   alert("Artist must be filled out");
    //   return false;
    // }

    // var genre = document.getElementById("genreText").value;
    // if (genre == "") {
    //   alert("Genre must be filled out");
    //   return false;
    // }

    // var year = document.getElementById("yearText").value;
    // if (year == "") {
    //   alert("Year formed must be filled out");
    //   return false;
    // } else if (year < 0){
    //   alert("Year must be greater than 0");
    //   return false;
    // }

    // var origin = document.getElementById("originText").value;
    // if (origin == "") {
    //   alert("Origin must be filled out");
    //   return false;
    // }

    // var price = document.getElementById("priceText").value;
    // if (price == "") {
    //   alert("Price must be filled out");
    //   return false;
    // } else if (price < 0){
    //   alert("Price must be greater than $0.00");
    //   return false;
    // }
}
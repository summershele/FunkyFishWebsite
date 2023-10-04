let slideIndex = 0; // Start at 0 because we will immediately increment it

 

// Next/previous controls

function plusSlides(n) {

  slideIndex += n;

  showSlides();

}

 

// Thumbnail image controls

function currentSlide(n) {

  slideIndex = n - 1;  // Subtract 1 to handle zero-based indexing

  showSlides();

}

 

function showSlides() {

  let slides = document.getElementsByClassName("mySlides");

  let dots = document.getElementsByClassName("dot");

 

  // Reset slides and dots

  for (let i = 0; i < slides.length; i++) {

    slides[i].style.display = "none";

  }

  for (let i = 0; i < dots.length; i++) {

    dots[i].className = dots[i].className.replace(" active", "");

  }

 

  // Cycle slide index

  slideIndex++;

  if (slideIndex > slides.length) {

    slideIndex = 1;

  }

 

  // Show the current slide and set the active dot

  slides[slideIndex-1].style.display = "block";

  if (dots.length > 0) {

    dots[slideIndex-1].className += " active";

  }

 

  // Schedule the next rotation

  setTimeout(showSlides, 2000);

}

 

// Start the slideshow

showSlides();

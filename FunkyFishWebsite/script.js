let slideIndex = 0;
let slideTimer; // Store the timer ID

// Next/previous controls
function plusSlides(n) {
  slideIndex += n;
  showSlides();
}

// Thumbnail image controls
function currentSlide(n) {
  slideIndex = n - 1;
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

  // Clear any existing timers
  clearTimeout(slideTimer);

  // Schedule the next rotation
  slideTimer = setTimeout(showSlides, 2000);
}

// Start the slideshow
showSlides();

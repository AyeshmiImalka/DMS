


// Get the button
let mybutton = document.getElementById("myBtn");
mybutton.addEventListener(myBtn,topFunction);

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}




function adjustLayoutForScreenSize() {
    const certificateFooter = document.querySelector('.certificate-footer');
    const formSignatures = certificateFooter.querySelectorAll('.form-signature');
    const screenWidth = window.innerWidth;
  
    // Check if the screen width is less than or equal to a threshold, e.g., 600px
    if (screenWidth <= 600) {
      // Move the date to the top on small screens
      certificateFooter.insertBefore(formSignatures[1], formSignatures[0]);
    } else {
      // Restore the original order on larger screens (if needed)
      certificateFooter.appendChild(formSignatures[1]);
    }
  }
  
  // Add a listener for the resize event
  window.addEventListener('resize', adjustLayoutForScreenSize);
  
  // Adjust layout on initial load
  adjustLayoutForScreenSize();






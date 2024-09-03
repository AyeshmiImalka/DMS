


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




  const dragDropArea = document.getElementById('drag-drop-area');
const submitButton = document.getElementById('submit-button');
const resetButton = document.getElementById('reset-button');
const downloadButton = document.getElementById('download-button');

// Drag and drop file upload
dragDropArea.addEventListener('dragover', (event) => {
  event.preventDefault();
  dragDropArea.classList.add('dragover');
});

dragDropArea.addEventListener('dragleave', () => {
  dragDropArea.classList.remove('dragover');
});

dragDropArea.addEventListener('drop', (event) => {
  event.preventDefault();
  dragDropArea.classList.remove('dragover');
  const files = event.dataTransfer.files;
  fileInput.files = files;
});

// Handle file selection from browse button
fileInput.addEventListener('change', () => {
  const files = fileInput.files;
  // Handle file upload here (validation, upload logic, etc.)
  console.log('Selected files:', files);
});

// Form submission handler (replace with your actual submission logic)
submitButton.addEventListener('click', () => {
  // Validate form fields and files before submission
  console.log('Submitting form...');
  // You would typically submit the form data and files using AJAX or a form submission approach
});

// Reset button handler
resetButton.addEventListener('click', () => {
  fileInput.value = ''; // Clear file selection
  // Reset any other form fields as needed
});

// Download form button handler
downloadButton.addEventListener('click', () => {
  // Create a downloadable version of the form content (HTML, PDF, etc.)
  console.log('Downloading form...');
  // Your code to generate and download the form data
});




// Add event listeners to buttons for click event
document.getElementById('submit-button').addEventListener('click', function() {
  alert('Form submitted!');
});

document.getElementById('reset-button').addEventListener('click', function() {
  if (confirm('Are you sure you want to reset the form?')) {
      document.getElementById('declaration-form').reset();
  }
});

document.getElementById('download-button').addEventListener('click', function() {
  alert('Form downloading...');
  // Add your download logic here
});


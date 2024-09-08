<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--font-awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="main.css">
    <title>FAQ</title>

    <style>
      /* header css part*/
      .navbar-background {
            background-image: url('user/images/navback.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .navbar {
            padding: 2rem 0;
        }

        .navbar-brand-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand-container img {
            height: 50px;
            width: auto;
        }

        .navbar-brand-container img.leftone {
            height: 70px;
        }

        .navbar-center-container {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: black;
        }

        .navbar-center-text {
            font-weight: bold;
            display: block;
        }

        .search-container {
            position: relative;
        }

        .search-container input {
            padding-right: 3rem;
        }

        .search-container .bi-search {
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            color: grey;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-container .bi-search:hover {
            color: darkgrey;
            text-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        /* Styles for the tab bar */
        .tab-bar {
            display: flex;
            background-color: #e3f2fd;
            border-bottom: 2px solid #e9ecef;
            padding: 0.25rem 0;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tab-bar a {
            padding: 0.5rem 2rem;
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            transition: background-color 0.3s, color 0.3s;
        }

        .tab-bar a:hover {
            background-color: #bbdefb;
            color: #007bff;
        }

        .tab-bar .active {
            background-color: #007bff;
            color: white;
            border-radius: 0.25rem;
        }

        /* Mobile and tablet responsive styles */
        @media (max-width: 992px) {
            .navbar {
                padding: 1rem 0;
            }

            .navbar-center-container {
                left: 40%;
                transform: translateX(-50%);
            }

            .search-container {
                display: none;
            }

            .navbar-toggler {
                border: none;
            }

            .tab-bar {
                display: none;
            }

            .navbar-collapse {
                background-color: #f0f0f0;
                padding: 1rem;
            }

            .navbar-nav .nav-item {
                padding: 0.5rem 0;
            }

            .navbar-nav .nav-link {
                color: #007bff;
                font-weight: 600;
            }
        }

        @media (max-width: 768px) {
            .navbar-center-container {
                position: static;
                transform: none;
                text-align: left;
                margin-top: 1rem;
                padding-left: 1rem;
            }

            .navbar-brand-container {
                justify-content: space-between;
                width: 100%;
            }

            .navbar-center-container span {
                display: block;
            }

            .search-container {
                display: block;
                width: 100%;
                padding: 0.5rem 1rem;
            }

            .search-container input {
                width: calc(100% - 2rem);
            }

            .search-container .bi-search {
                right: 0.5rem;
            }

            .tab-bar {
                flex-direction: column;
                padding: 1rem 0;
            }

            .tab-bar a {
                padding: 0.5rem 1rem;
                text-align: left;
            }
        }

        #back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
    border-radius: 50%;
    padding: 5px 10px;
    
}

#back-to-top i {
    font-size: 18px;
}

/*FAQ section starts*/
.hero-section {
    height: 70vh;
    background-image: url("user/images/faq.jpg");
    background-position: center;
    background-size: cover;
    display: flex;
    align-items: center;
    padding: 0 20px;
  }

    </style>
</head>

<body>
  
          <!--header starts-->
          <nav class="navbar navbar-expand-lg navbar-background">
        <div class="container-fluid">
            <div class="navbar-brand-container">
                <img src="user/images/leftone.png" alt="Left Image One" class="leftone">
                <img src="user/images/lefttwo.jpg" alt="Left Image Two">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Additional navbar items can be added here -->
                </ul>
                <div class="navbar-center-container">
                    <span class="navbar-center-text" style="font-size: x-large;">Document Management System</span>
                    <span class="navbar-center-text" style="font-size: large;">Department of Ayurveda</span>
                    <span class="navbar-center-text" style="font-size: medium;">Private Sector</span>
                </div>
                <div class="search-container d-flex ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <i class="bi bi-search"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Tab bar -->
    <div class="tab-bar">
        <a href="index.php" >Home</a>
        <a href="about_us.php">About Us</a>
        <a href="login_form.php" >Register/Login</a>
        <a href="contactUs.php" >Contact Us</a>
        <a href="faq.php" class="active">FAQ</a>
    </div>

    <!-- Bootstrap JS (including Popper.js for dropdowns and other components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery for handling search field toggle -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.bi-search').on('click', function() {
                $('.search-container input').toggle(); // Toggle the search field
            });
        });
    </script>
  
    <!--header ends-->


<!--img with notice section starts-->
<section class="hero-section">
<div class="content">
  <h2 style="color: white">Any Questions ?</h2>
  <p>We are ready to answer for frequently asked Questions.</p>

</div>
</section>
<!-- <script>
const head = document.querySelector("head");
const hamburgerBtn = document.querySelector("#hamburger-btn");
const closeMenuBtn = document.querySelector("#close-menu-btn");
// Toggle mobile menu on hamburger button click
hamburgerBtn.addEventListener("click", () => head.classList.toggle("show-mobile-menu"));
// Close mobile menu on close button click
closeMenuBtn.addEventListener("click", () => hamburgerBtn.click());
</script> -->
<!--img with notice section ends-->


<!--questions part starts -->
<div class="questions">
  <h2 style="color: #318BFF">Frequently Asked Questions</h2>
  <div class="faq">
      <button class="accordion">
          1. How do I get the information what are the services provided by 
          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
  <div class="faq">
    <button class="accordion">
      2.	How can I get information about the registration of manufacturing centers?
      <i class="fa-solid fa-chevron-down"></i>
    </button>
    <div class="pannel">
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
        saepe molestiae distinctio asperiores cupiditate consequuntur dolor
        ullam, iure eligendi harum eaque hic corporis debitis porro
        consectetur voluptate rem officiis architecto.
      </p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">
      3.	How can I get information about the registration of Ayurvedic drug stores?
      <i class="fa-solid fa-chevron-down"></i>
    </button>
    <div class="pannel">
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
        saepe molestiae distinctio asperiores cupiditate consequuntur dolor
        ullam, iure eligendi harum eaque hic corporis debitis porro
        consectetur voluptate rem officiis architecto.
      </p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">
      4.	How can I get information about the
       registration of Ayurveda Medicine Transportation?
      <i class="fa-solid fa-chevron-down"></i>
    </button>
    <div class="pannel">
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
        saepe molestiae distinctio asperiores cupiditate consequuntur dolor
        ullam, iure eligendi harum eaque hic corporis debitis porro
        consectetur voluptate rem officiis architecto.
      </p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">
      5.	How can I get information 
      about the registration of Ayurveda Pharmacies?
      <i class="fa-solid fa-chevron-down"></i>
    </button>
    <div class="pannel">
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
        saepe molestiae distinctio asperiores cupiditate consequuntur dolor
        ullam, iure eligendi harum eaque hic corporis debitis porro
        consectetur voluptate rem officiis architecto.
      </p>
    </div>
  </div>

  <div class="faq">
    <button class="accordion">
      6.	How can I get information about the registration of Ayurveda Patient Care Services Centers?
      <i class="fa-solid fa-chevron-down"></i>
    </button>
    <div class="pannel">
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
        saepe molestiae distinctio asperiores cupiditate consequuntur dolor
        ullam, iure eligendi harum eaque hic corporis debitis porro
        consectetur voluptate rem officiis architecto.
      </p>
    </div>
  </div>
  <div class="faq">
      <button class="accordion">
          7.	How can I get information about the registration of 
          Ayurveda Patient Care Services in Hospitals?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          8.	How can I get information about the registration of Ayurveda patient care 
          services in Panchakarma institutes in hotel premises?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          9.	How can I get information about the 
          registration of Institutes ; stores for imported medicines?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          10.	How much does
           it cost to register a manufacturing center ?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          11.	How much does it cost to register an Ayurvedic drug store?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          12.	How much does it cost
           to get an Ayurveda Medicine Transportation license?          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          13.	How much does
           it cost to register an Ayurveda Pharmacy ?          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          14.	How much does it cost to register an Ayurveda
           Patient Care Services Center?          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          15.	How much does it cost to register an
           Ayurveda Patient Care Services in Hospital?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          16.	How much does it cost to register an Ayurveda patient care services in
           Panchakarma institutes in hotel premises?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          17.	How do I submit my application form?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          18.	How many samples do I
          need to submit for local product registration?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          19.	How many samples do I need to submit for imported product registration?
        <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
    <div class="faq">
      <button class="accordion">
          20.	How can I get information on all the registered institutes,
           pharmacies, hospitals, and products under the department of Ayurveda?          <i class="fa-solid fa-chevron-down"></i>
      </button>
      <div class="pannel">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
          saepe molestiae distinctio asperiores cupiditate consequuntur dolor
          ullam, iure eligendi harum eaque hic corporis debitis porro
          consectetur voluptate rem officiis architecto.
        </p>
      </div>
    </div>
</div>

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
      this.classList.toggle("active");
      this.parentElement.classList.toggle("active");

      var pannel = this.nextElementSibling;

      if (pannel.style.display === "block") {
        pannel.style.display = "none";
      } else {
        pannel.style.display = "block";
      }
    });
  }
</script>
<!--questions part ends -->



<!--Footer section starts-->
    <div class=" my-5">
        <!--Footer Start-->
        <footer class="text-center text-lg-start text-white" style="background-color: #2d3443">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row my-4">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <img src="user/images/lefttwo.jpg" height="70" alt="" loading="lazy" />
                        <p class="text-uppercaseb-4">Department of Ayurveda</p>

                        <div class="mt-4">
                            <!-- Facebook -->
                            <a href="https://www.facebook.com/people/Department-of-Ayurveda/100057396431760/"
                                class="btn btn-outline-light btn-floating m-1" class="text-white" role="button">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <!-- Twitter -->
                            <a href="https://ayurveda.gov.lk/" class="btn btn-outline-light btn-floating m-1"
                                class="text-white" role="button">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <!-- Youtube -->
                            <a href="https://www.youtube.com/@departmentofayurveda7911"
                                class="btn btn-outline-light btn-floating m-1" class="text-white" role="button">
                                <i class="fab fa-youtube"></i></a>
                        </div>


                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold text-warning">Quick Links</h6>
                        <p>
                            <a href="#" class="text-white" style="text-decoration: none;">Home</a>
                        </p>
                        <p>
                            <a href="#" class="text-white" style="text-decoration: none;">Registration</a>
                        </p>
                        <p>
                            <a href="#" class="text-white" style="text-decoration: none;">About Us</a>
                        </p>
                        <p>
                            <a href="#" class="text-white" style="text-decoration: none;">Contact Us</a>
                        </p>
                        <p>
                            <a href="#" class="text-white" style="text-decoration: none;">FAQ</a>
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h6>
                        <p><i class="fas fa-home mr-3"></i> Department of Ayurveda, Nawinna, Maharagama, Sri Lanka.</p>
                        <p><i class="fas fa-envelope mr-3"></i> departmentofayurveda @gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> (+94) 11 2896911</p>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

                        <!--Google map-->

                        <div class="ratio ratio-1x1">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.2840349321023!2d79.91519137483785!3d6.856519919204164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a806cf14c8d%3A0x2c45ea9d148fdfef!2sDepartment%20of%20Ayurveda!5e0!3m2!1sen!2sus!4v1699798015889!5m2!1sen!2sus"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <!--Google Maps-->
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © Copyright 2023 -
                <a class="text-white" href="#" style="text-decoration: none;"> Department of Ayurveda, Sri Lanka</a>
                <!-- Back to Top -->
    <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button">
      <i class="fas fa-chevron-up"></i>
    </a>
            </div>
            <!-- Copyright -->
        </footer>

        <!--Footer End-->

    </div>
    <!-- End of .container -->
    <!--Footer section ends-->

   











    <!--jquery cdn link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>

<script>
//FAQ part
$(document).ready(function(){
	$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
});


document.addEventListener('DOMContentLoaded', () => {
    const qaButton = document.getElementById('qaButton');
    const qaInfo = document.getElementById('qaInfo');

    qaButton.addEventListener('click', () => {
        // Toggle the display of the Q&A info content
        qaInfo.style.display = qaInfo.style.display === 'none' ? 'block' : 'none';
    });
});

    </script>

</body>

</html>
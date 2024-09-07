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
    <title>About Us</title>

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
        <a href="index.php">Home</a>
        <a href="about_us.php"  class="active">About Us</a>
        <a href="login_form.php">Register/Login</a>
        <a href="contactUs.php">Contact Us</a>
        <a href="faq.php">FAQ</a>
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

<body>
    <!--ABOUT US   Starts-->
<div class="container1">
    <div class="text-section">
      <h6 style="color: #6B6969">Let us introduce</h6>
      <h2 style="color: #1e90ff"><b>About Us</b></h2>
      <p>The Department of Ayurveda is a government organization in Sri Lanka that is responsible for 
        promoting, regulating, and preserving the practice of Ayurveda and traditional indigenous medicine in the country. It operates under the Ministry of Health and plays a crucial role in healthcare service delivery, policy development, regulation, education, and research in the field of Ayurveda.</p>
      <p>The Document Management System for the Private sector entities of Department Of 
        Ayurveda is a fresh concept for the people who are willing to join with us.</p>
      <div id="more-info1">
        <p>Here is more information about the Department of Ayurveda. [Add additional content here] The Document Management System for the 
            Private sector entities of Department Of Ayurveda is a fresh concept for the people 
            who are willing to join with us The Document Management System for the Private sector entities of Department Of Ayurveda is a fresh concept for the people who are willing to join with us</p>
      </div>
    </div>
    <div class="image-section">
      <img src="user/images/au_img.jpg" alt="img1" style="width: 80%; margin-left:5%;">
    </div>
  </div>
  <!-- About us section ends -->




  <!--VISION/MISSION section starts-->
<div class="container2">
    <div class="column">
      <h2 style="color: #1e90ff"><b>Our Vision</b></h2>
      <p>Our vision is to foster optimal well-being and promote good health for all through the profound wisdom of Ayurveda and traditional indigenous medicine</p>
      
      <div class="more-info" id="vision">
        <p>Continued information about the vision...</p>
      </div>
    </div>
    <div class="column">
      <h2 style="color: #1e90ff"><b>Our Mission</b></h2>
      <p>Our mission is to design and implement national-level programs that advance the cause of good health for all.</p>
      
      <div class="more-info" id="mission">
        <p>Continued information about the mission...</p>
      </div>
    </div>
  </div>
  <!-- vision/mission section ends -->


  <!-- Objectives section starts -->
  <div class="container3">
    <div class="text-section3">
      
      <h6 style="color: #6B6969" >Let us introduce</h6>
      <h2 style="color: #1e90ff"><b>Our Objectives</b></h2>
      <p>Our objectives are to provide a high-quality public health service system of Ayurvedic and Traditional medicine that is accessible and affordable to all. We aim to promote the use of traditional systems of medicine by educating the public about their benefits and effectiveness, and by partnering with healthcare providers to integrate these systems into mainstream healthcare</p>
      <p>The Document Management System for the Private sector entities of Department Of 
        Ayurveda is a fresh concept for the people who are willing to join with us.</p>
      <div id="more-info2">
        <p>Here is more information about the Department of Ayurveda. [Add additional content here] The Document Management System for the 
            Private sector entities of Department Of Ayurveda is a fresh concept for the people 
            who are willing to join with us The Document Management System for the Private sector entities of Department Of Ayurveda is a fresh concept for the people who are willing to join with us</p>
      </div>
    </div>
    <div class="image-section3">
      <img src="user/images/us_img2.jpg" alt="img 2" style="width: 60%; margin-left:10%;">
    </div>
  </div>
  <!-- Objectives section ends -->


<!-- Activities part start -->
  <div class="container5">
    <div class="image-section5">
        <img src="user/images/us_img2.jpg" alt="img 3" style="margin-top: -6%; margin-bottom: 3%;">
    </div>
    <div class="text-section3">
        <h6 style="color: #6B6969">Let us introduce</h6>
        <h2 style="color: #1e90ff"><b>Our Activities</b></h2>
        <p>Our objectives are to provide a high-quality public health service system of Ayurvedic and Traditional medicine that is accessible and affordable to all. We aim to promote the use of traditional systems of medicine by educating the public about their benefits and effectiveness, and by partnering with healthcare providers to integrate these systems into mainstream healthcare.</p>
        <p>The Document Management System for the Private sector entities of Department Of 
        Ayurveda is a fresh concept for the people who are willing to join with us.</p>
        <div id="more-info5" style="display: none;">
            <p>Here is more information about the Department of Ayurveda. [Add additional content here] The Document Management System for the 
                Private sector entities of Department Of Ayurveda is a fresh concept for the people 
                who are willing to join with us The Document Management System for the Private sector entities of Department Of Ayurveda is a fresh concept for the people who are willing to join with us</p>
        </div>
    </div>
</div>
<!-- Activities part ends -->




</body>


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


</body>

</html>

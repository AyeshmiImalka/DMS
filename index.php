<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--font-awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--CSS-->
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="other.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Home</title>

    <style>
        .button-container {
            text-align: center;
        }

        .testimonial-btn {
            background: #1e90ff;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .testimonial-btn:hover {
            color: black;
        }



        /* Popup container */
        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            max-width: 90%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            /* Center the heading */
        }

        .popup h2 {
            color: #318BFF;
            font-weight: bold;
            margin-top: 0;
            font-size: 24px;
            margin-bottom: 15px;
            text-align: center;
        }

        .popup label {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            text-align: left;
            /* Align labels to the left */
        }

        .popup input[type="text"],
        .popup input[type="file"],
        .popup textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .popup textarea {
            resize: vertical;
        }

        /* File input design */
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .file-input-label {
            display: inline-block;
            padding: 8px 20px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
        }

        .file-input:hover .file-input-label {
            background-color: #e5e5e5;
        }

        /* Star rating design */
        .star-rating {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .star {
            font-size: 24px;
            cursor: pointer;
            padding: 0 5px;
            transition: color 0.3s;
        }

        .star:hover,
        .star:hover~.star {
            color: gold;
        }

        .popup-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .popup-buttons .button-wrapper {
            flex: 1;
            margin: 0 5px;
        }

        .popup-buttons button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-testimonial-btn {
            background: #1e90ff;
            color: white;
            border: none;
        }

        .add-testimonial-btn:hover {
            background-color: darkblue;
        }

        .cancel-btn {
            background: #ff6347;
            color: white;
            border: none;
        }

        .cancel-btn:hover {
            background-color: darkred;
        }

        /* Button container */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .testimonial-btn {
            background: #1e90ff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .testimonial-btn:hover {
            background-color: darkblue;
        }

        /* Popup container section ends */

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

        .bg-secondary {
            border-radius: 50%;
            background-color: rgb(87 169 242) !important;
        }


        .test {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
}

.box {
    flex: 0 0 33%; /* 3 boxes per row */
    scroll-snap-align: start;
    padding: 10px;
    box-sizing: border-box;
}

.box img {
    max-width: 100%;
    height: auto;
}

.test::-webkit-scrollbar {
    width: 0;
    background: transparent; /* Hide scrollbar */
}

.slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
            width: 100%;
        }

        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {opacity: 0.4} 
            to {opacity: 1}
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
    <!-- <div class="cont">

        <div class="first-row">

            <div class="col-one">
                <img src="images/leftone.png" class="leftone">
                <img src="images/lefttwo.jpg" class="lefttwo">
            </div>

            <div class="col-two">
                <p class="p1" style="font-size: 198%;"><b>DOCUMENT MANAGEMENT SYSTEM</b></p>
                <p class="p2" style="font-size: 138%;">PRIVATE SECTOR</p>
                <p class="p2" style="font-size: 158%;">Department of Ayurveda</p>
            </div>

            <div class="col-three">
                <div class="row-one">
                    <input type="text" id="search" placeholder="Search Here">
                    <select id="select">
                        <option value="english">English</option>
                        <option value="sinhala">Sinhala</option>
                        <option value="tamil">Tamil</option>
                    </select>
                </div>

                <div class="row-two">
                    <input id="login" type="button" value="Login">
                    <input id="signup" type="button" value="Signup">
                </div>
            </div>

        </div>

        <div class="second-row">

            <a href="home.php" style="background-color: #318BFF; color: white;">Home</a>


            <a href="about_us.php">About Us</a>


            <a href="login_form.php">Register</a>


            <a href="contactUs.php">Contact Us</a>

            <a href="faq.php">FAQ</a>
        </div>
    </div> -->

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
        <a href="index.php" class="active">Home</a>
        <a href="about_us.php">About Us</a>
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

    <br><br><br><br><br>
    <!--header ends-->




    <!-- Carousel starts -->
    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="images/C1.jpeg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/C2.jpeg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/C3.jpeg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/C4.jpeg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="images/C5.jpeg" style="width:100%">
        </div>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <br><br><br><br>

    <script>
$(document).ready(function(){
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    slides[slideIndex-1].style.display = "block";  
    $(slides[slideIndex-1]).fadeIn(100);
    setTimeout(showSlides, 1500); // Change image every 3 seconds
  }
});
</script>
    <!-- Carousel ends -->

  




    <!--img with text & button starts-->
    <div class="second_part">
        <div class="back">
            <div class="left-part">
                <!--<img src="images/OIP (26).jpg" style="width: 50%; border-radius: 15px;">-->
            </div>
            <div class="right-part">
                <h2 style="color: #318BFF">Join With Us</h2>
                <br>
                <p class="des">Don't let your private sector business dream a reality.</p>
                <p class="des">Register and join with us today through an easy process.</p>
                <button class="reg-btn" onclick="window.location.href = 'register_form.php';">Register Here</button>

            </div>
        </div>

    </div>
    <br><br>
    <!--img with text & button ends-->




    <!--News section starts-->
    <div class="container py-5">
        <div class="py-5">
            <h6 class="update">Stay up to date</h6>
            <h2 class="News_title">Latest News</h2>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- News Card 1 -->
            <div class="col">
                <div class="card h-100 p-3">
                    <img src="images/img10.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="badge bg-secondary">
                            <h5 class="mt-2">03<br>June</h5>
                        </span>
                        <h5 class="card-title">Intern Training Appointment for 204 Graduates of Ayurveda, Sidda, Unani.</h5>
                        <p class="card-text" style="font-size: small" data-description="Appointments for internship medical training for 204 graduates of 4 indigenous medical faculties in the island were made on June 03, 2024 at the Bandaranaike Memorial Ayurvedic Research Institute in Maharagama Navinne with the participation of Health Secretary Dr. Palitha Mahipala. Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?" data-short-description="Appointments for internship medical training for 204 graduates of 4 indigenous medical faculties...">Appointments for internship medical training for 204 graduates of 4 indigenous medical faculties...</p>
                        <p class="toggle-button" onclick="toggleDescription(this)">See More..</p>
                    </div>
                </div>
            </div>
            <!-- News Card 2 -->
            <div class="col">
                <div class="card h-100 p-3">
                    <img src="images/img3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="badge bg-secondary">
                            <h5 class="mt-2">12<br>Sunday</h5>
                        </span>
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text" style="font-size: small" data-description="Appointments for internship medical training for 204 graduates of 4 indigenous medical faculties in the island were made on June 03, 2024 at the Bandaranaike Memorial Ayurvedic Research Institute in Maharagama Navinne with the participation of Health Secretary Dr. Palitha Mahipala. Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?" data-short-description="Appointments for internship medical training for 204 graduates of 4 indigenous medical faculties...">Appointments for internship medical training for 204 graduates of 4 indigenous medical faculties...</p>
                        <p class="toggle-button" onclick="toggleDescription(this)">See More..</p>
                    </div>
                </div>
            </div>
            <!-- News Card 3 -->
            <div class="col">
                <div class="card h-100 p-3">
                    <img src="images/img4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="badge bg-secondary">
                            <h5 class="mt-2">13<br>Sunday</h5>
                        </span>
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text" style="font-size: small" data-description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?" data-short-description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?</p>
                        <p class="toggle-button" onclick="toggleDescription(this)">See More..</p>
                    </div>
                </div>
            </div>
            <!-- News Card 4 -->
            <div class="col">
                <div class="card h-100 p-3">
                    <img src="images/img5.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="badge bg-secondary">
                            <h5 class="mt-2">12<br>Sunday</h5>
                        </span>
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text" style="font-size: small" data-description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?" data-short-description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?</p>
                        <p class="toggle-button" onclick="toggleDescription(this)">See More..</p>
                    </div>
                </div>
            </div>
            <!-- News Card 5 -->
            <div class="col">
                <div class="card h-100 p-3">
                    <img src="images/img2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="badge bg-secondary">
                            <h5 class="mt-2">12<br>Sunday</h5>
                        </span>
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text" style="font-size: small" data-description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?" data-short-description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?</p>
                        <p class="toggle-button" onclick="toggleDescription(this)">See More..</p>
                    </div>
                </div>
            </div>
            <!-- News Card 6 -->
            <div class="col">
                <div class="card h-100 p-3">
                    <img src="images/img11.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="badge bg-secondary">
                            <h5 class="mt-2">12<br>Sunday</h5>
                        </span>
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text" style="font-size: small" data-description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?" data-short-description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis eligendi dolore aliquam cupiditate maiores inventore adipisci vero at, repellendus officiis?</p>
                        <p class="toggle-button" onclick="toggleDescription(this)">See More..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDescription(element) {
            // Get the card's description element
            var descriptionElement = element.previousElementSibling;

            // Toggle between full and short description
            if (element.innerText === "See More..") {
                descriptionElement.innerHTML = descriptionElement.getAttribute('data-description');
                element.innerText = "See Less..";
            } else {
                descriptionElement.innerHTML = descriptionElement.getAttribute('data-short-description');
                element.innerText = "See More..";
            }
        }
    </script>
    <!--News section Ends-->




    <!--Our team section starts-->
    <div class="wrapper">
        <div class="title">
            <h6 class="update">Introducing</h6>
            <h2 class="News_title">Our Committee</h2>
        </div>
        <div class="card_Container">
        
      <div class="card">
          <div class="imbBx">
              <img src="images/honramesh.jpg" alt="dr.ramesh">
          </div>
          <div class="content">
              <div class="contentBx">
                  <h3>Hon. Dr. Ramesh Pathirana<br><span>Minister of Health</span></h3>
              </div>
          </div>
      </div>

      <div class="card">
          <div class="imbBx">
              <img src="images/statemini.jpg" alt="">
          </div>
          <div class="content">
              <div class="contentBx">-
                  <h3>Hon. Sisira Jayakody (Attorney-at-Law) <br><span>State Minister​</span></h3>
              </div>                   
          </div>
      </div>

      <div class="card">
        <div class="imbBx">
            <img src="images/Sec_Health.jpg" alt="">
        </div>
        <div class="content">
            <div class="contentBx">
                <h3>Dr. P. G. Mahipala <br><span>Secretary of Health</span></h3>
            </div>                   
        </div>
    </div>


            <div class="card_btn" onclick="location.href='contactUs.php#wrapper';">
                <img src="images/rightbtn.png" style="width: 60%;">
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    <br><br><br><br>
    <!--Our team section ends-->



    <!--Footer section starts-->
    <div class=" my-5">
        <!--Footer Start-->
        <footer class="text-center text-lg-start text-white" style="background-color: #2d3443;">
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

   
        <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }

            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    

            for (let i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";

            setTimeout(showSlides, 3000); // Change image every 3 seconds
        }
    </script>

        <!--Footer End-->

    </div>
    <!-- End of .container -->
    <!--Footer section ends-->

    













    <!--jquery cdn link-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>

  


    <script>
        function openPopup() {
            document.getElementById('popupContainer').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popupContainer').style.display = 'none';
        }

        function addTestimonial() {
            // Implement the functionality to add the testimonial
            alert('Testimonial added successfully!');
            closePopup();
        }

        // Star rating functionality
        const stars = document.querySelectorAll('.star');
        stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = star.getAttribute('data-value');
                stars.forEach(s => {
                    if (s.getAttribute('data-value') <= value) {
                        s.innerHTML = '&#9733;';
                        s.style.color = 'gold'; // Filled star
                    } else {
                        s.innerHTML = '&#9734;';
                        s.style.color = 'black'; // Empty star
                    }
                });
            });
        });
    </script>

    <script>
        //Display the selected image name
        const fileInput = document.getElementById('image');
        const fileNameDisplay = document.getElementById('fileNameDisplay');

        fileInput.addEventListener('change', (e) => {
            const fileName = fileInput.files[0].name;
            fileNameDisplay.textContent = `File selected: ${fileName}`;
        });
    </script>

</body>

</html>
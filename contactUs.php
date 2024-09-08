<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact_Us</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">

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
        <a href="index.php" >Home</a>
        <a href="about_us.php">About Us</a>
        <a href="login_form.php" >Register/Login</a>
        <a href="contactUs.php" class="active">Contact Us</a>
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


  <div class=" my-5">

    <!--image with text section starts-->
      <div class="imgSider_Container">
      <div class="imgSider" style="background-color: #cbedfd;">
        <div class="row gx-5">
          <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
              <div class="position-relative h-100">
                  <img class="position-absolute w-100 h-100" src="user/images/contactus-Img.jpg" style="object-fit: cover;">
              </div>
          </div>
          <div class="col-lg-6 pb-5">
          <p style="color: #6B6969">Let us introduce</p>
            <h2 class="mb-4" style="color: #1e90ff">Contact Us</h2>
              <p class="mb-5"  style="color: black">We value open communication and are committed to providing excellent customer service. 
                Our Contact Us page serves as a gateway for you to reach out to us with any questions, concerns, or feedback you may have. <br><br>We understand the importance of addressing your needs promptly and effectively. 
                Whether you have inquiries about products or services, need assistance with an order, 
                or simply want to share your thoughts, our dedicated team is here to assist you.</p>
              
              <a href="#contact_wrapper" style="background-color: #1e90ff; color: white; text-decoration: none; " >Send a Quick message</a>
          </div>
        </div>
    </div>
    </div>
  
    <!--image with text section ends-->

    <!--Our team section starts-->
    <div id="wrapper" class="wrapper">
  <div class="title">
      <h6 class="update">Introducing</h6>
      <h2 class="team_title">Our committee</h2>
  </div>
  <div class="card_Container">
      <div class="card">
          <div class="imbBx">
              <img src="user/images/honramesh.jpg" alt="dr.ramesh">
          </div>
          <div class="content">
              <div class="contentBx">
                  <h3>Hon. Dr. Ramesh Pathirana<br><span>Minister of Health</span></h3>
              </div>
          </div>
      </div>

      <div class="card">
          <div class="imbBx">
              <img src="user/images/statemini.jpg" alt="">
          </div>
          <div class="content">
              <div class="contentBx">-
                  <h3>Hon. Sisira Jayakody (Attorney-at-Law) <br><span>State Minister​</span></h3>
              </div>                   
          </div>
      </div>

      <div class="card">
        <div class="imbBx">
            <img src="user/images/Sec_Health.jpg" alt="">
        </div>
        <div class="content">
            <div class="contentBx">
                <h3>Dr. P. G. Mahipala <br><span>Secretary of Health</span></h3>
            </div>                   
        </div>
    </div>

      <div class="card">
          <div class="imbBx">
              <img src="user/images/Con4.jpg" alt="">
          </div>
          <div class="content">
              <div class="contentBx">
                  <h3>Dr. M. D. J. Abeygunawardena <br><span>Commissioner</span></h3>
              </div>
          </div>
      </div>
      <div class="card">
        <div class="imbBx">
            <img src="user/images/Con5.jpg" alt="">
        </div>
        <div class="content">
            <div class="contentBx">
                <h3>Mr. K.V. Athula <br><span>Deputy Commissioner</span></h3>
            </div>
        </div>
    </div>
    <div class="card">
      <div class="imbBx">
          <img src="user/images/con6.png" alt="">
      </div>
      <div class="content">
          <div class="contentBx">
              <h3>Mrs. Geethani lokuwella <br><span>Assistant commissioner (Admin)</span></h3>
          </div>
      </div>
   </div>
   <div class="card">
      <div class="imbBx">
        <img src="user/images/img-3.jpg" alt="">
      </div>
      <div class="content">
        <div class="contentBx">
            <h3>Dr. P. Hewagamage <br><span>Assistant Commissioner (Technical)</span></h3>
        </div>
     </div>
   </div>
<div class="card">
  <div class="imbBx">
      <img src="user/images/Untitled-1-1.jpg" alt="">
  </div>
  <div class="content">
      <div class="contentBx">
          <h3>Dr. W.L.M.J.A. Wasala <br><span>assistant commisioner (devolopment)</span></h3>
      </div>
  </div>
</div>

<div class="card">
  <div class="imbBx">
      <img src="user/images/Con10.jpg" alt="">
  </div>
  <div class="content">
      <div class="contentBx">
          <h3>Mrs. M.T.C. Peiris <br><span>Accountant (Salary)</span></h3>
      </div>
  </div>
</div>
<div class="card">
  <div class="imbBx">
      <img src="user/images/Con11.jpg" alt="">
  </div>
  <div class="content">
      <div class="contentBx">
          <h3>Mr. Anjana Liyanage <br><span>Accountant (Account)</span></h3>
      </div>
  </div>
</div>
<div class="card">
  <div class="imbBx">
      <img src="user/images/Frame_10-removebg-preview.png" alt="">
  </div>
  <div class="content">
      <div class="contentBx">
          <h3>Dr. N.W.D. Kumara <br><span>Registar (Exam)</span></h3>
      </div>
  </div>
</div>
<div class="card">
  <div class="imbBx">
      <img src="user/images/Con13.jpg" alt="">
  </div>
  <div class="content">
      <div class="contentBx">
          <h3>Dr. A.H. Madhavi Y. Perera <br><span>Medical Officer (Investigation)</span></h3>
      </div>
  </div>
</div>
<div class="card">
    <div class="imbBx">
        <img src="user/images/Con13-1.jpg" alt="">
    </div>
    <div class="content">
        <div class="contentBx">
            <h3>Mrs. Chathuri Madhavi <br><span>Internal Audit</span></h3>
        </div>
    </div>
  </div>
  <div class="card">
    <div class="imbBx">
        <img src="user/images/con14.jpg" alt="">
    </div>
    <div class="content">
        <div class="contentBx">
            <h3>Dr. S.K.P. Tharanga <br><span>Medical Officer (Supervision & Operation-Hospital Admin)</span></h3>
        </div>
    </div>
  </div>
  <div class="card">
    <div class="imbBx">
        <img src="user/images/Con15.jpg" alt="">
    </div>
    <div class="content">
        <div class="contentBx">
            <h3>Dr. I.D.K.D. Disanayaka <br><span>Medical Officer (Supervision & Operation-Sanrakshana Saba)</span></h3>
        </div>
    </div>
  </div>
  <div class="card">
    <div class="imbBx">
        <img src="user/images/Con17.jpg" alt="">
    </div>
    <div class="content">
        <div class="contentBx">
            <h3>Dr. Senaka Kodikara <br><span>Medical Officer Coordinator - IT & Media</span></h3>
        </div>
    </div>
  </div>

          </div>
      </div>
  </div>
</div>
<!--Our team section ends-->


<!--Contact details ends-->

<!--content box starts-->
<div class="row" id="content_box">
    <h2 class="contact_details">Contact Details</h2>
    <p class="contact_info">We appreciate your interest in our Services and look forward to hearing from you.  
        Don’t hesitate to reach out to us today – we’re here to help!.  You can contact us through various channels, 
        including phone, email, or by visiting our physical location. Our knowledgeable and friendly staff are ready to provide you with the information and support you require.</p>
<div class="contentBox_container">
  <div class="box">
      <div class="icon">
          <a href="departmentofayurveda @gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a>
      </div>
      <div class="content">
        <p>departmentofayurveda @gmail.com</p>
      </div>
  </div>
  
      <div class="box">
          <div class="icon">
              <a href="(+94) 11 2896911"><i class="fa fa-phone" aria-hidden="true"></i></a>
          </div>
          <div class="content">
            <p class="tel">(+94) 11 2896911</p>
          </div>   
      </div>

        <div class="box">
              <div class="icon">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
              </div>
              <div class="content">
                <p class="twitter">Department of Ayurveda, Nawinna, Maharagama, Sri Lanka.</p>
              </div>  
        </div>
    </div>
  <!--content box ends-->

  <!--contact form starts-->
  <div class="contact_wrapper" id="contact_wrapper">
    <div class="container">
        <div class="form_wrap">
            <form>
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="head_text">Get In Touch</h2>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <input class="input_info" type="text" placeholder="Your Name">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <input class="input_info" type="text" placeholder="Your Email">
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <input class="input_info custom_mt" type="text" placeholder="Your Subject">
                    </div>
                    <div class="col-12">
                        <textarea class="input_info textarea_info mt_30" placeholder="Your Message"></textarea>
                        <div class="text-center">
                            <button type="submit" class="make_btn mt_30">Send Message</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--contact form ends-->

    <!--Footer Start-->
    <footer class="text-center text-lg-start text-white" style="background-color: #2d3443">
      <!-- Grid container -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row my-4">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <img src="user/images/lefttwo.jpg" height="70" alt="Logo" loading="lazy" />
            <p class="text-uppercaseb-4">Department of Ayurveda</p>
  
            <div class="mt-4">
                <!-- Facebook -->
                <a href="https://www.facebook.com/people/Department-of-Ayurveda/100057396431760/" class="btn btn-outline-light btn-floating m-1" class="text-white" role="button">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <!-- Twitter -->
                <a href="https://ayurveda.gov.lk/" class="btn btn-outline-light btn-floating m-1" class="text-white" role="button">
                    <i class="fab fa-twitter"></i>
                </a>
                 <!-- Youtube -->
                 <a href="https://www.youtube.com/@departmentofayurveda7911" class="btn btn-outline-light btn-floating m-1" class="text-white" role="button">
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
              <a href="#" class="text-white" style="text-decoration: none;">About Us</a>
            </p>
            <p>
              <a href="#" class="text-white" style="text-decoration: none;">Registration</a>
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
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.2840349321023!2d79.91519137483785!3d6.856519919204164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a806cf14c8d%3A0x2c45ea9d148fdfef!2sDepartment%20of%20Ayurveda!5e0!3m2!1sen!2sus!4v1699798015889!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
    
   
    
      <!-- Copyright -->
    </footer>
    
     
  </div>
  <!-- End of .container -->
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
<?php
include 'config_form.php';

session_start();

$error = '';
if (isset($_POST['submit'])) {
    //$name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    //$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    //$mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($conn, $_POST['mobile']) : '';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];
    //$cpass = isset($_POST['confirm_password']) ? md5($_POST['confirm_password']) : '';
    $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : '';

    $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];
            header('Location:admin/dashboard.php');
            echo "logged in";
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            header('Location:user/dashboard.php');
            echo "logged in";
        }
    } else {
        $error = 'Incorrect email or password!';
    }
} else {
    // If the form is not submitted, do not display any error message
    $error = '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
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
        <a href="login_form.php" class="active">Register/Login</a>
        <a href="contactUs.php" >Contact Us</a>
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
</head>

<body>
    <div class="form-container">
        <form id="loginForm" action="" method="post">
            <h3>Login now</h3>

            <?php if (!empty($error)) : ?>
                <span id="error_msg" class="error_msg" style="background-color: red;"><?php echo $error; ?></span>
            <?php endif; ?>

            <input type="text" name="username" required placeholder="Username" id="username">
            <input type="password" name="password" required placeholder="Password" id="password">
            <input type="submit" name="submit" value="Login" class="form-btn">

            <div class="forgot">
                <p><a href="forgot_password.php">Forgot your password?</a></p>
            </div>

            <p>Don't have an account? <a href="register_form.php">Register now</a></p>
        </form>
    </div>

    <script>

    

        //Click text field and clear it.
        document.getElementById('username').addEventListener('click', clearErrorAndFields);



        // Function to clear error message and form fields
        function clearErrorAndFields() {
            //document.getElementById('error_msg').innerText = '';
            document.getElementById('username').value = "";
            document.getElementById('password').value = "";
            document.getElementById('error_msg').style.display = "none";
            //document.querySelector('input[name="username"]').value = '';
            //document.querySelector('input[name="password"]').value = '';
        }

        // Add click event listener to the document
        document.addEventListener('click', function(event) {
            // Check if the click was outside the form
            if (!document.getElementById('loginForm').contains(event.target)) {
                clearErrorAndFields();
            }
        });
    </script>
</body>

</html>
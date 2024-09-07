<?php 

session_start();

include "config_form.php";

$error = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $_SESSION['email'] = $email;

    $query = "SELECT * FROM user_form WHERE email = '$email'";

    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['email'] == $email) {
            //mail_config_codes
                  include "user/mail_config.php";
                  header("Location:otp.php");
        } else {
            echo "<script>alert('Email is not Registered one..')</script>";
        }
    }
} 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

      <style>
    .fp-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        padding-bottom: 60px;
        background: #eee;
    }

    .form {
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 1);
        background: #ffff;
        text-align: center;
        width: 400px;
        margin-top: 50px;
    }

    .form h2 {
        color: #318BFF;
        text-transform: uppercase;
        font-family: inter, sans-serif;
        margin-bottom: 10px;
        color: #333;
    }

    .form input {
        width: 100%;
        padding: 10px 15px;
        font-size: 17px;
        margin: 8px 0;
        background: #eee;
        border-radius: 5px;
        border: none; /* Remove the border */
    }

    .form input[type="submit"] {
        background: #318BFF;
        color: #fff;
        text-transform: capitalize;
        font-size: 20px;
        cursor: pointer;
        width: 90%; 
        border: none; /* Remove the border */
    }

    .form input[type="submit"]:hover {
        background: #D4E6FD;
        color: #318BFF;
        border: none; /* Ensure no border on hover */
    }

    .form p {
        font-family: inter, sans-serif;
        margin-top: 10px;
        font-size: 20px;
        color: #333;
    }

    .form p a {
        color: #318BFF;
    }

    #error {
        background-color: red;
        color: white;
        font-weight: bold;
    }

    .error_msg {
        color: red;
        background-color: white;
        padding: 5px;
        width: 100rem;
    }


    </style>
</head>

<body>
    <div class="fp-container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="<?php $_PHP_SELF; ?>" method="POST" autocomplete="">
                    <h2 class="text-center" style="color: #318BFF;">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <?php if (!empty($error)) : ?>
                        <span id="error_msg" class="error_msg" style="background-color: red;"><?php echo $error; ?></span>
                    <?php endif; ?>
                    <div class="form-group">
                        <input class="form-control" style="width: 90%;" type="email" name="email" 
                        placeholder="Enter email address" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="submit" value="Continue" onclick="show()">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function show() {
        document.getElementById('error').style.display = "flex";
    }
</script>
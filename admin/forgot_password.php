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
                  include "mail_config.php";
                  header("Location:otp.php");
        } else {
            $error = "Email is not Registered..";
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
            /* Adjust the width to match the given style */
            margin-top: 50px;
            /* Adjust the margin for better alignment */
        }

        .form h2 {
            font-size: 30px;
            text-transform: uppercase;
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
        }

        .form input[type="submit"] {
            background: #318BFF;
            color: #ffff;
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
        }

        .form input[type="submit"]:hover {
            background: #D4E6FD;
            color: #318BFF;
        }

        .form p {
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
            /* Set the text color to red */
            background-color: white;
            /* Set the background color to white */
            padding: 5px;
            /* Add some padding for better appearance */
            color: white;
            width: 100rem;
        }
    </style>
</head>

<body>
    <div class="fp-container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="<?php $_PHP_SELF; ?>" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <?php if (!empty($error)) : ?>
                        <span id="error_msg" class="error_msg" style="background-color: red;"><?php echo $error; ?></span>
                    <?php endif; ?>
                    <div class="form-group">
                        <input class="form-control" style="width: 90%;" type="email" name="email" placeholder="Enter email address" required>
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
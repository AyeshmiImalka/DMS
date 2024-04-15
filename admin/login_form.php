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
            header('Location:dashboard.php');
            echo "logged in";
        } elseif ($row['user_type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            header('Location:user_page.php');
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
    <!--CSS link-->
    <link rel="stylesheet" href="style.css">
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
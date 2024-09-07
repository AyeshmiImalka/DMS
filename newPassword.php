
<?php 

session_start();

include 'config_form.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <!--CSS link-->
    <link rel="stylesheet" href="style.css">
</head>


<?php

if(isset($_POST['submit'])) {
    if(isset($_POST['npassword']) && isset($_POST['cnpassword'])) {
        if($_POST['npassword'] == $_POST['cnpassword']) {
            $password = $_POST['cnpassword'];
            $email = $_SESSION['email'];
            $query = "UPDATE user_form SET password = '$password' WHERE email = '{$_SESSION['email']}' ";
            $result = mysqli_query($conn, $query);
            if(!$result) {
             echo "<script>".  mysqli_error($conn) . "</script>";
            } else {
             session_unset();
             session_destroy();
             session_start();
             $_SESSION['notice'] = "Password Updated!!";
             header("Location:login_form.php");
            }
        } else {
            echo "<script>alert('Password is not matched with confirm password. Try Again.')</script>";
        }

    }
}

?>



<body>
    <div class="form-container">
        <form id="loginForm" action="" method="post">
            <h3>New Password</h3>


            <input type="password" name="npassword"  id="password">
            <input type="password" name="cnpassword" id="password">
            <div class="content_list">
                <p>Password must contains</p>
                <ul class="requirement-list">
                    <li>
                        <i class="fa-solid fa-circle"></i>
                        <span>At least 8 characters length</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle"></i>
                        <span>At least 1 number (0...9)</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle"></i>
                        <span>At least 1 lowercase letter (a...z)</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle"></i>
                        <span>At least 1 special symbol (!...$)</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-circle"></i>
                        <span>At least 1 uppercase letter (A...Z)</span>
                    </li>
                </ul>
            </div>
            <input type="submit" name="submit" value="Login" class="form-btn">

        </form>
    </div>

    <script>

    const passwordInput = document.querySelector("input[name='password']");
    const requirementList = document.querySelectorAll(".requirement-list li");

    const requirements = [
        {regex: /.{8}/, index: 0},
        {regex: /[0-9]/, index: 1},
        {regex: /[a-z]/, index: 2},
        {regex: /[^A-Za-z0-9]/, index: 3},
        {regex: /[A-Z]/, index: 4},
    ]

    passwordInput.addEventListener("keyup", (e) => {
        requirements.forEach(item => {
            const isValid = item.regex.test(e.target.value);
            const requirementItem = requirementList[item.index];

            if(isValid) {
                requirementItem.firstElementChild.className = "fa-solid fa-check";
                requirementItem.classList.add("valid");
            } else {
                requirementItem.firstElementChild.className = "fa-solid fa-circle";
                requirementItem.classList.remove("valid");
            }
        });
    });
</script>

</body>

</html>
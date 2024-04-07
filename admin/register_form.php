<?php
include 'config_form.php';

if(isset($_POST['submit'])){
    if($_POST['password'] == $_POST['confirm_password']) {
        //Getting form data and escape string
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        //$pass = md5($_POST['password']);
        $pass = $_POST['password'];
        $cpass = md5($_POST['confirm_password']);
        $user_type = $_POST['user_type'];
    }

    
        $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass' ";
    
        $result = mysqli_query($conn, $select);
    
        if(mysqli_num_rows($result) > 0){
            $error[] = 'user already exist!';
    
        }else{
            $insert = "INSERT INTO user_form(username, password, email, mobile, name, user_type) VALUES('$username','$pass','$email','$mobile','$name','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
            }
        }
    

    /*
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    //$pass = md5($_POST['password']);
    $pass = $_POST['password'];
    $cpass = md5($_POST['confirm_password']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist!';

    }else{
        if($pass != $cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO user_form(name, email, mobile, username, password, user_type) VALUES('$name','$email','$mobile','$username','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
    */



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <!--CSS link-->
    <link rel="stylesheet" href="style.css">
    <!--Font awesome ink-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="form-container">
        <form action="<?php $_PHP_SELF; ?>" method="post">
            <h3>Register now</h3>

            <?php
if(isset($error)){
    foreach($error as $error){
        echo '<span class="error_msg" style="background-color:red;">'.$error.'</span>';
    }
}
?>

            <input type="text" name="name" required placeholder="Name">
            <input type="email" name="email" required placeholder="Email">
            <input type="number" name="mobile" required placeholder="Mobile number">
            <input type="text" name="username" required placeholder="Username">
            <input type="password" name="password" required placeholder="Password">
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
            <input type="password" name="confirm_password" required placeholder="Confirm password">
            <select name="user_type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account? <a href="login_form.php">Login </a></p>
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
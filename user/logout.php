<?php 
@include '../config_form.php';

session_start();

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location:../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Logout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .logout-container {
            max-width: 400px; /* added a max-width for better responsiveness */
            margin: 40px auto; /* added some margin for better spacing */
            text-align: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .logout-container h2 {
            margin-bottom: 20px;
        }
        .logout-container .btn {
            margin: 10px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2 style="color: #318BFF;">Are you sure you want to log out?</h2>
        <p>This will end your current session and you will need to log in again to access your account.</p> <!-- added a paragraph to provide more context -->
        <form method="POST" action="">
            <button type="submit" name="logout" class="btn btn-danger">Yes, Logout</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>


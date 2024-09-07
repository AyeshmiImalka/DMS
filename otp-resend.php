<?php 

session_start();


if(isset($_SESSION['email'])) {
    include "mail_config.php";
    header("Location:otp.php");
}

?>


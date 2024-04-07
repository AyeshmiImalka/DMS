<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}
  $_SESSION['email'] = $email;

?>

<?php 
include('includes/adminProfile_content.php');

?>
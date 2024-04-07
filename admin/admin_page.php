<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}

?>


<?php 
include('includes/adminDashboard_content.php');

?>
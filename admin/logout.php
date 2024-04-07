<?php 
include 'config_form.php';

session_start();
session_unset();
session_destroy();

header('location:login_form.php');

?>


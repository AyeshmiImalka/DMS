<?php
@include 'config_form.php';
session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $regId = mysqli_real_escape_string($conn, $_POST['regId']);
    $regName = mysqli_real_escape_string($conn, $_POST['regName']);
    $regDate = mysqli_real_escape_string($conn, $_POST['regDate']);
    $licenseYears = mysqli_real_escape_string($conn, $_POST['licenseYears']);
    $renewalUpdate = mysqli_real_escape_string($conn, $_POST['renewalUpdate']);

    // Insert the new record into the database
    $sql = "INSERT INTO manufacturingcenters_db (Reg_id, Reg_name, Reg_date, `LicenseRenewal(yrs)`, Renewal_update) 
            VALUES ('$regId', '$regName', '$regDate', '$licenseYears', '$renewalUpdate')";

    if (mysqli_query($conn, $sql)) {
        echo 1; // Success response
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Detailed error response
    }
} else {
    echo "Invalid request method"; // Invalid request method response
}

mysqli_close($conn);
?>

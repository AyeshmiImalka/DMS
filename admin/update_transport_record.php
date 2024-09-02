<?php
@include 'config_form.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $regId = mysqli_real_escape_string($conn, $_POST['regId']);
    $regName = mysqli_real_escape_string($conn, $_POST['regName']);
    $regDate = mysqli_real_escape_string($conn, $_POST['regDate']);
    $licenseYears = mysqli_real_escape_string($conn, $_POST['licenseYears']);
    $renewalUpdate = mysqli_real_escape_string($conn, $_POST['renewalUpdate']);
    $vehicle_type = mysqli_real_escape_string($conn, $_POST['vehicleType']);


    // SQL query to update transportservices_db
    $sql1 = "UPDATE transportservices_db 
             SET Reg_name = '$regName', Reg_date = '$regDate', Vehicle_type = '$vehicle_type', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
             WHERE Reg_id = '$regId'";

    
    // Execute all four queries
    $success1 = mysqli_query($conn, $sql1);
    
   

    if ($success1 ) {
        echo 1; // Success response
    } else {
        echo "Error: " . ($success1 ? '' : mysqli_error($conn)); // Detailed error response
    }
} else {
    echo "Invalid request method"; // Invalid request method response
}

mysqli_close($conn);
?>

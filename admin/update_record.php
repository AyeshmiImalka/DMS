<?php
@include 'config_form.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $regId = mysqli_real_escape_string($conn, $_POST['regId']);
    $regName = mysqli_real_escape_string($conn, $_POST['regName']);
    $regDate = mysqli_real_escape_string($conn, $_POST['regDate']);
    $licenseYears = mysqli_real_escape_string($conn, $_POST['licenseYears']);
    $renewalUpdate = mysqli_real_escape_string($conn, $_POST['renewalUpdate']);

    // Update the record in the database
    $sql = "UPDATE manufacturingcenters_db 
            SET Reg_name = '$regName', Reg_date = '$regDate', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
            WHERE Reg_id = '$regId'";

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

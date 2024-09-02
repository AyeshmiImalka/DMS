<?php
@include 'config_form.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $regId = mysqli_real_escape_string($conn, $_POST['regId']);
    $regName = mysqli_real_escape_string($conn, $_POST['regName']);
    $regDate = mysqli_real_escape_string($conn, $_POST['regDate']);
    $licenseYears = mysqli_real_escape_string($conn, $_POST['licenseYears']);
    $renewalUpdate = mysqli_real_escape_string($conn, $_POST['renewalUpdate']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);


    // SQL query to update hospitals_db
    $sql1 = "UPDATE hospitals_db 
             SET Reg_name = '$regName', Reg_date = '$regDate', `Location` = '$location', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
             WHERE Reg_id = '$regId'";

    // SQL query to update panchakarmacenters_db
    $sql2 = "UPDATE panchakarmacenters_db 
             SET Reg_name = '$regName', Reg_date = '$regDate', `Location` = '$location', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
             WHERE Reg_id = '$regId'";

    // SQL query to update ayurvedainstitutions_db
    $sql3 = "UPDATE ayurvedainstitutions_db 
             SET Reg_name = '$regName', Reg_date = '$regDate', `Location` = '$location', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
             WHERE Reg_id = '$regId'";


    
    // Execute all four queries
    $success1 = mysqli_query($conn, $sql1);
    $success2 = mysqli_query($conn, $sql2);
    $success3 = mysqli_query($conn, $sql3);
   

    if ($success1 ) {
        echo 1; // Success response
    } else {
        echo "Error: " . ($success1 ? '' : mysqli_error($conn))
        . ($success2 ? '' : mysqli_error($conn)) 
        . ($success3 ? '' : mysqli_error($conn))  ; // Detailed error response
    }
} else {
    echo "Invalid request method"; // Invalid request method response
}

mysqli_close($conn);
?>

<?php
@include 'config_form.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $regId = mysqli_real_escape_string($conn, $_POST['regId']);
    $regName = mysqli_real_escape_string($conn, $_POST['regName']);
    $regDate = mysqli_real_escape_string($conn, $_POST['regDate']);
    $licenseYears = mysqli_real_escape_string($conn, $_POST['licenseYears']);
    $renewalUpdate = mysqli_real_escape_string($conn, $_POST['renewalUpdate']);

    // SQL query to update manufacturingcenters_db
    $sql1 = "UPDATE manufacturingcenters_db 
             SET Reg_name = '$regName', Reg_date = '$regDate', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
             WHERE Reg_id = '$regId'";

    // SQL query to update drugstores_db
    $sql2 = "UPDATE drugstores_db 
             SET Reg_name = '$regName', Reg_date = '$regDate', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
             WHERE Reg_id = '$regId'";

    // SQL query to update pharmacies_db
    $sql3 = "UPDATE pharmacies_db 
             SET Reg_name = '$regName', Reg_date = '$regDate', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
             WHERE Reg_id = '$regId'";

    // SQL query to update suppliers_db
    $sql4 = "UPDATE suppliers_db 
             SET Reg_name = '$regName', Reg_date = '$regDate', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
             WHERE Reg_id = '$regId'";

    // SQL query to update distributors_db
    $sql5 = "UPDATE distributors_db 
             SET Reg_name = '$regName', Reg_date = '$regDate', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
             WHERE Reg_id = '$regId'";

    // Execute all four queries
    $success1 = mysqli_query($conn, $sql1);
    $success2 = mysqli_query($conn, $sql2);
    $success3 = mysqli_query($conn, $sql3);
    $success4 = mysqli_query($conn, $sql4);
    $success5 = mysqli_query($conn, $sql5);
    


    if ($success1 && $success2 && $success3 && $success4 && $success5 ) {
        echo 1; // Success response
    } else {
        echo "Error: " . ($success1 ? '' : mysqli_error($conn)) 
                      . ($success2 ? '' : mysqli_error($conn)) 
                      . ($success3 ? '' : mysqli_error($conn))
                      . ($success4 ? '' : mysqli_error($conn))
                      . ($success5 ? '' : mysqli_error($conn)); // Detailed error response
    }
} else {
    echo "Invalid request method"; // Invalid request method response
}

mysqli_close($conn);
?>

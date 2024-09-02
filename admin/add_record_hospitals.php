<?php
@include 'config_form.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reg_id = mysqli_real_escape_string($conn, $_POST['regId']);
    $reg_name = mysqli_real_escape_string($conn, $_POST['regName']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $reg_date = mysqli_real_escape_string($conn, $_POST['regDate']);
    $license_years = mysqli_real_escape_string($conn, $_POST['licenseYears']);
    $renewal_update = mysqli_real_escape_string($conn, $_POST['renewalUpdate']);

    $sql = "INSERT INTO hospitals_db (Reg_ID, Reg_name, `Location`, Reg_date, `LicenseRenewal(yrs)`, Renewal_update) VALUES ('$reg_id', '$reg_name', '$location', '$reg_date', '$license_years', '$renewal_update')";

    if (mysqli_query($conn, $sql)) {
        echo 1; // Success
    } else {
        // Output the SQL error
        echo "Error: " . mysqli_error($conn);
    }
}
?>

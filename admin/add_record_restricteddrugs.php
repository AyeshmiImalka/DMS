<?php
@include 'config_form.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reg_id = mysqli_real_escape_string($conn, $_POST['regId']);
    $reg_name = mysqli_real_escape_string($conn, $_POST['regName']);
    $manufacturer = mysqli_real_escape_string($conn, $_POST['manufacturer']);
    $reg_date = mysqli_real_escape_string($conn, $_POST['regDate']);
    $license_years = mysqli_real_escape_string($conn, $_POST['licenseYears']);
    $renewal_update = mysqli_real_escape_string($conn, $_POST['renewalUpdate']);

    $sql = "INSERT INTO restricteddrugs_db (Reg_id, Reg_name, Manufacturer, Reg_date, `LicenseRenewal(yrs)`, Renewal_update) VALUES ('$reg_id', '$reg_name', '$manufacturer', '$reg_date', '$license_years', '$renewal_update')";

    if (mysqli_query($conn, $sql)) {
        echo 1; // Success
    } else {
        // Output the SQL error
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php
@include 'config_form.php';

$regId = $_POST['regId'];
$regName = $_POST['regName'];
$regDate = $_POST['regDate'];
$licenseYears = $_POST['licenseYears'];
$renewalUpdate = $_POST['renewalUpdate'];

$sql = "UPDATE manufacturingcenters_db
        SET Reg_name = '$regName', Reg_date = '$regDate', `LicenseRenewal(yrs)` = '$licenseYears', Renewal_update = '$renewalUpdate'
        WHERE Reg_id = '$regId'";

if (mysqli_query($conn, $sql)) {
    echo 'Record updated successfully';
} else {
    echo 'Error: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>

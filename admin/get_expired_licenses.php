<?php
@include 'config_form.php';
session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
    exit();
}

// Check which table's data is being requested
$table = isset($_GET['table']) ? $_GET['table'] : '';

$expired_licenses = [];

if ($table === 'drugstores') {
    // Fetch expired licenses from drugstores_db
    $sql = "SELECT Reg_id, Reg_name, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM drugstores_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
} elseif ($table === 'manufacturing') {
    // Fetch expired licenses from manufacturingcenters_db
    $sql = "SELECT Reg_id, Reg_name, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM manufacturingcenters_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'pharmacy') {
    // Fetch expired licenses from pharmacies_db
    $sql = "SELECT Reg_id, Reg_name, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM pharmacies_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'transport') {
    // Fetch expired licenses from manufacturingcenters_db
    $sql = "SELECT Service_id, Service_name, Vehicle_type, Registration_date, `LicenseRenewal(yrs)`, Renewal_update FROM pharmacies_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'supplier') {
    // Fetch expired licenses from suppliers_db
    $sql = "SELECT Reg_id, Reg_name, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM suppliers_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'distributor') {
    // Fetch expired licenses from distributors_db
    $sql = "SELECT Reg_id, Reg_name, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM distributors_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'localdrug') {
    // Fetch expired licenses from localdrugs_db
    $sql = "SELECT Reg_id, Reg_name, Manufacturer, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM localdrugs_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'localproduct') {
    // Fetch expired licenses from localproducts_db
    $sql = "SELECT Reg_id, Reg_name, Manufacturer, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM localproducts_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'importeddrug') {
    // Fetch expired licenses from importeddrugs_db
    $sql = "SELECT Reg_id, Reg_name, Manufacturer, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM importeddrugs_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'importedproduct') {
    // Fetch expired licenses from importedproducts_db
    $sql = "SELECT Reg_id, Reg_name, Manufacturer, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM importedproducts_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'restricteddrug') {
    // Fetch expired licenses from restricteddrugs_db
    $sql = "SELECT Reg_id, Reg_name, Manufacturer, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM restricteddrugs_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'cannabies') {
    // Fetch expired licenses from cannabies_db
    $sql = "SELECT Reg_id, Reg_name, Manufacturer, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM cannabies_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'hospital') {
    // Fetch expired licenses from hospitals_db
    $sql = "SELECT Reg_id, Reg_name, `Location`, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM hospitals_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'panchakarma') {
    // Fetch expired licenses from panchakarmacenters_db
    $sql = "SELECT Reg_id, Reg_name, `Location`, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM panchakarmacenters_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'institutions') {
    // Fetch expired licenses from ayurvedainstitutions_db
    $sql = "SELECT Reg_id, Reg_name, `Location`, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM ayurvedainstitutions_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}elseif ($table === 'transport') {
    // Fetch expired licenses from transportservices_db
    $sql = "SELECT Reg_id, Reg_name, Vehicle_type, Reg_date, `LicenseRenewal(yrs)`, Renewal_update FROM transportservices_db WHERE Renewal_update < CURDATE()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $expired_licenses[] = $row;
        }
    }
}



// Return data as JSON
echo json_encode($expired_licenses);
?>

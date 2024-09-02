<?php
include 'config_form.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Update advertisement_requests table
    $sql_ad = "UPDATE advertisement_requests SET viewed = 1 WHERE id = $id";
    $result_ad = mysqli_query($conn, $sql_ad);

    // Update manufacturing_centers_registration_requests table
    $sql_mc = "UPDATE manufacturing_centers_registration_requests SET viewed = 1 WHERE id = $id";
    $result_mc = mysqli_query($conn, $sql_mc);

    // Update private_ayurvedic_drug_stores_registration_requests table
    $sql_ds = "UPDATE private_ayurvedic_drug_stores_registration_requests SET viewed = 1 WHERE id = $id";
    $result_ds = mysqli_query($conn, $sql_ds);

    // Update private_ayurvedic_pharmacies_registration_requests table
    $sql_ph = "UPDATE private_ayurvedic_pharmacies_registration_requests SET viewed = 1 WHERE id = $id";
    $result_ph = mysqli_query($conn, $sql_ph);

    // Update transport_services_registration_requests table
    $sql_ts = "UPDATE transport_services_registration_requests SET viewed = 1 WHERE id = $id";
    $result_ts = mysqli_query($conn, $sql_ts);

    // Update suppliers_registration_requests table
    $sql_su = "UPDATE suppliers_registration_requests SET viewed = 1 WHERE id = $id";
    $result_su = mysqli_query($conn, $sql_su);

     // Update distributors_registration_requests table
     $sql_dis = "UPDATE distributors_registration_requests SET viewed = 1 WHERE id = $id";
     $result_dis = mysqli_query($conn, $sql_dis);

     // Update local_drugs_registration_requests table
     $sql_ld = "UPDATE local_drugs_registration_requests SET viewed = 1 WHERE id = $id";
     $result_ld = mysqli_query($conn, $sql_ld);

     // Update local_products_registration_requests table
     $sql_lp = "UPDATE local_products_registration_requests SET viewed = 1 WHERE id = $id";
     $result_lp = mysqli_query($conn, $sql_lp);

     // Update imported_drugs_registration_requests table
     $sql_id = "UPDATE imported_drugs_registration_requests SET viewed = 1 WHERE id = $id";
     $result_id = mysqli_query($conn, $sql_id);

     // Update imported_products_registration_requests table
     $sql_ip = "UPDATE imported_products_registration_requests SET viewed = 1 WHERE id = $id";
     $result_ip = mysqli_query($conn, $sql_ip);

     // Update restricted_drugs_registration_requests table
     $sql_rd = "UPDATE restricted_drugs_registration_requests SET viewed = 1 WHERE id = $id";
     $result_rd = mysqli_query($conn, $sql_rd);

     // Update cannabis_registration_requests table
     $sql_ca = "UPDATE cannabis_registration_requests SET viewed = 1 WHERE id = $id";
     $result_ca = mysqli_query($conn, $sql_ca);

     // Update private_ayurveda_hospital_registration table
     $sql_hs = "UPDATE private_ayurveda_hospital_registration SET viewed = 1 WHERE id = $id";
     $result_hs = mysqli_query($conn, $sql_hs);

     // Update panchakarma_centers_registration_requests table
     $sql_pc = "UPDATE panchakarma_centers_registration_requests SET viewed = 1 WHERE id = $id";
     $result_pc = mysqli_query($conn, $sql_pc);

     // Update private_ayurveda_institutions_registration_requests table
     $sql_ins = "UPDATE private_ayurveda_institutions_registration_requests SET viewed = 1 WHERE id = $id";
     $result_ins = mysqli_query($conn, $sql_ins);
 

    if ($result_ad && $result_mc && $result_ds && $result_ph && $result_ts && $result_su && $result_dis && $result_ld && $result_lp && $result_id && $result_ip && $result_rd && $result_ca && $result_hs && $result_pc && $result_ins) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo 0;
}
?>

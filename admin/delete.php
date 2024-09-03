<?php
// delete.php

// Validate and sanitize the incoming ID
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id <= 0) {
    // Handle invalid ID
    echo "Invalid ID";
    exit;
}

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'document_management_system');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define the tables and their corresponding ID columns
$tables = [
    'pharmacies_db' => 'Reg_id',
    'manufacturingcenters_db' => 'Reg_id',
    'drugstores_db' => 'Reg_id',
    'transportservices_db' => 'Reg_id', // Assuming service_id is the ID column in transportservices_db
    'suppliers_db' => 'Reg_id', // Assuming supplier_id is the ID column in suppliers_db
    'distributors_db' => 'Reg_id',
    'localdrugs_db' => 'Reg_id',
    'localproducts_db' => 'Reg_id',
    'importeddrugs_db' => 'Reg_id',
    'importedproducts_db' => 'Reg_id',
    'restricteddrugs_db' => 'Reg_id',
    'cannabies_db' => 'Reg_id ',
    'hospitals_db' => 'Reg_id',
    'panchakarmacenters_db' => 'Reg_id',
    'ayurvedainstitutions_db' => 'Reg_id',
    'payment_records' => 'payment_id ',
    'advertisement_requests' => 'id',
    'local_drugs_registration_requests' => 'id',
    'manufacturing_centers_registration_requests' => 'id',
    'private_ayurvedic_drug_stores_registration_requests' => 'id',
    'private_ayurvedic_pharmacies_registration_requests' => 'id',
    'transport_services_registration_requests' => 'id',
    'suppliers_registration_requests' => 'id',
    'distributors_registration_requests' => 'id',
    'local_products_registration_requests' => 'id',
    'imported_drugs_registration_requests' => 'id',
    'imported_products_registration_requests' => 'id',
    'restricted_drugs_registration_requests' => 'id',
    'cannabis_registration_requests' => 'id',
    'private_ayurveda_hospital_registration' => 'id',
    'panchakarma_centers_registration_requests' => 'id',
    'private_ayurveda_institutions_registration_requests' => 'id'
];

$success = false; // Flag to indicate if any deletion was successful

foreach ($tables as $table => $idColumn) {
    // Construct the DELETE query for each table
    $sql = "DELETE FROM $table WHERE $idColumn = $id";
    $result = mysqli_query($conn, $sql);

    // Check if the record was deleted
    if ($result && mysqli_affected_rows($conn) > 0) {
        $success = true; // Set flag to true if any deletion was successful
    }
}

// Check if any deletion was successful
if ($success) {
    echo 1; // Return 1 to indicate success
} else {
    echo 0; // Return 0 to indicate failure
}

// Close the database connection
mysqli_close($conn);
?>

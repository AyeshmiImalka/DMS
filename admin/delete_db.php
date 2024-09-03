<?php
include 'config_form.php';

if (isset($_POST['ids']) && isset($_POST['db'])) {
    $ids = $_POST['ids'];
    $db = $_POST['db'];

    // Define column names for different databases
    $db_columns = [
        'pharmacies_db' => 'id', // Replace 'id' with the actual column name for pharmacies_db
        'manufacturingcenters_db' => 'Reg_id'
    ];

    // Validate the database name to prevent SQL injection
    $valid_dbs = array_keys($db_columns);
    if (!in_array($db, $valid_dbs)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid database']);
        exit;
    }

    // Get the column name for the specified database
    $column = $db_columns[$db];

    foreach ($ids as $id) {
        $id = mysqli_real_escape_string($conn, $id);
        $sql = "DELETE FROM $db WHERE $column='$id'";
        mysqli_query($conn, $sql);
    }

    echo json_encode(['status' => 'success']);
}
?>

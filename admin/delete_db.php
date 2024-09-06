<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'document_management_system');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['id']) && isset($_POST['table'])) {
    $id = $_POST['id'];
    $table = $_POST['table'];

    // List of allowed tables
    $allowed_tables = array(
        'manufacturingcenters_db',
        'pharmacies_db',
        'drugstores_db',
        'transportservices_db',
        'suppliers_db',
        'distributors_db',
        'localdrugs_db',
        'localproducts_db',
        'importeddrugs_db',
        'importedproducts_db',
        'restricteddrugs_db',
        'cannabies_db',
        'hospitals_db',
        'panchakarmacenters_db',
        'ayurvedainstitutions_db'
    );

    // Define the ID column for each table
    $id_columns = array(
        'manufacturingcenters_db' => 'Reg_id',
        'pharmacies_db' => 'Reg_id',
        'drugstores_db' => 'Reg_id',
        'transportservices_db' => 'Reg_id',
        'suppliers_db' => 'Reg_id',
        'distributors_db' => 'Reg_id',
        'localdrugs_db' => 'Reg_id',
        'localproducts_db' => 'Reg_id',
        'importeddrugs_db' => 'Reg_id',
        'importedproducts_db' => 'Reg_id',
        'restricteddrugs_db' => 'Reg_id',
        'cannabies_db' => 'Reg_id',
        'hospitals_db' => 'Reg_id',
        'panchakarmacenters_db' => 'Reg_id',
        'ayurvedainstitutions_db' => 'Reg_id'
    );

    // Validate the table and column
    if (in_array($table, $allowed_tables) && array_key_exists($table, $id_columns)) {
        $id_column = $id_columns[$table];

        // Prepare the SQL query to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM $table WHERE $id_column = ?");
        $stmt->bind_param("s", $id);

        // Execute the query and check for errors
        if ($stmt->execute()) {
            echo 1; // Return success
        } else {
            echo "Error: " . $stmt->error; // Check for errors
        }

        // Close the statement
        $stmt->close();
    } else {
        echo 0; // Return failure if the table or ID column is not found
    }
}

// Close the database connection
$conn->close();
?>

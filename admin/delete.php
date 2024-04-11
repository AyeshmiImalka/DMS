<?php
// delete.php

// Connect to the database
$conn = mysqli_connect('localhost','root','','document_management_system');

// Check connection
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

// Get the ID from the AJAX request
$id = $_POST['id'];

// Delete the record from the database
$sql = "DELETE FROM manufacturingcenters_db WHERE Reg_id = $id";
$sql = "DELETE FROM drugstores_db WHERE Reg_id = $id";
$sql = "DELETE FROM pharmacies_db WHERE Reg_id = $id";
$result = mysqli_query($conn, $sql);

// Check if the record was deleted
if (mysqli_affected_rows($conn) > 0) {
    echo 1; // Return 1 to indicate success

}

// Close the database connection
mysqli_close($conn);
?>
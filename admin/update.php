<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'document_management_system');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$id = $_POST['id'];
$name = $_POST['name'];
$date = $_POST['date'];
$license = $_POST['license'];
$renewal = $_POST['renewal'];

// Update the database
$sql = "UPDATE drugstores_db SET Reg_name='$name', Reg_date='$date', LicenseRenewal(yrs)=$license, Renewal_update='$renewal' WHERE Reg_id=$id";
$result = mysqli_query($conn, $sql);

// Check if the update was successful
if ($result) {
    echo 1;
} else {
    echo 0;
}

// Close the database connection
mysqli_close($conn);
?>
<?php
@include 'config_form.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $sql = "SELECT * FROM localproducts_db WHERE Reg_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row); // Return the record data as JSON
    } else {
        echo json_encode([]); // Return an empty array if no record found
    }
}
?>


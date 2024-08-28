<?php
@include 'config_form.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $sql = "SELECT * FROM manufacturingcenters_db WHERE Reg_id = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo json_encode(mysqli_fetch_assoc($result));
    } else {
        echo json_encode([]);
    }
} else {
    echo "Invalid request method";
}

mysqli_close($conn);
?>

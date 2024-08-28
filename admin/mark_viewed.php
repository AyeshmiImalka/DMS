<?php
include 'config_form.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "UPDATE advertisement_requests SET viewed = 1 WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo 0;
}
?>

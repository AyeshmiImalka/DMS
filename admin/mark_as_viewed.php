<?php
session_start();
include 'config_form.php';

if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
    exit();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare SQL statement to update the status
    $sql = "UPDATE manufacturing_centers_registration_requests SET status = 'Viewed' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }

    mysqli_stmt_close($stmt);
} else {
    echo 0; // No ID provided
}

mysqli_close($conn);
?>

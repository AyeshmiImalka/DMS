<?php
// mark_viewed.php
session_start();

// Include database configuration
include 'config_form.php';

// Check if ID is provided
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Prepare and execute SQL statement to update the viewed status
    $sql = "UPDATE manufacturing_centers_registration_requests SET is_viewed = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Execute the statement and return success status
    if ($stmt->execute()) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }

    $stmt->close();
}

$conn->close();
?>

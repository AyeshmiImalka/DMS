<?php
include('config_form.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notificationId = $_POST['notificationId'] ?? 0;

    if ($notificationId > 0) {
        // Prepare statement to mark the notification as read
        $stmt = $conn->prepare("UPDATE notifications SET is_read = 1 WHERE id = ?");
        $stmt->bind_param('i', $notificationId);

        // Execute the statement
        if ($stmt->execute()) {
            // Prepare statement to delete the notification
            $stmt = $conn->prepare("DELETE FROM notifications WHERE id = ?");
            $stmt->bind_param('i', $notificationId);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete notification.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update notification.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid notification ID.']);
    }

    $conn->close();
}
?>

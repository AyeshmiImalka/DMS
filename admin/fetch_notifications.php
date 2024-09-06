<?php
@include 'config_form.php';
session_start();// Ensure you include your database connection file

$user_id = $_SESSION['admin_id']; // Assuming the admin's ID is stored in the session

// Fetch unread notifications
$query = "SELECT * FROM notifications WHERE user_id = ? AND is_read = FALSE ORDER BY created_at DESC";
$stmt = $pdo->prepare($query);
$stmt->execute([$user_id]);
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mark notifications as read (optional)
$updateQuery = "UPDATE notifications SET is_read = TRUE WHERE user_id = ? AND is_read = FALSE";
$updateStmt = $pdo->prepare($updateQuery);
$updateStmt->execute([$user_id]);

echo json_encode($notifications);
?>

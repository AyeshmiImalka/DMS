<?php
// Include the database configuration file
include('config_form.php');

// Fetch all notifications from the database
$query = "SELECT * FROM notifications ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/vendor/styles/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .notification-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .notification-card h5 {
            color: #007bff;
        }
        .notification-card p {
            color: #333;
        }
        .notification-card small {
            color: #888;
        }
        .btn-back {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4">Notifications</h1>

    <?php
    if (mysqli_num_rows($result) > 0) {
        // Loop through each notification and display it
        while ($notification = mysqli_fetch_assoc($result)) {
            ?>
            <div class="notification-card">
                <h5><?php echo htmlspecialchars($notification['title']); ?></h5>
                <p><?php echo htmlspecialchars($notification['message']); ?></p>
                <small>Received on: <?php echo date("F j, Y, g:i a", strtotime($notification['created_at'])); ?></small>
            </div>
            <?php
        }
    } else {
        echo "<p>No notifications yet.</p>";
    }
    ?>

    <a href="dashboard.php" class="btn-back">Back to Dashboard</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

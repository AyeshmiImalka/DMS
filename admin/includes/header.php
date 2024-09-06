<?php
    // Include the database connection file
    include('config_form.php');

    // Start the session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
// Check if the admin is logged in
if (!isset($_SESSION['admin_name'])) {
	header("Location: login.php"); // Redirect to login if not logged in
	exit;
}

// Fetch unread notifications count (assuming a column 'is_read' exists in the notifications table)
$sqlUnreadCount = "SELECT COUNT(*) AS unread_count FROM notifications WHERE is_read = 0";
$resultUnreadCount = mysqli_query($conn, $sqlUnreadCount);
$unreadData = mysqli_fetch_assoc($resultUnreadCount);
$unreadCount = $unreadData['unread_count'] ?? 0; // Default to 0 if no result

// Fetch all notifications to display
$sqlNotifications = "SELECT * FROM notifications ORDER BY created_at DESC";
$resultNotifications = mysqli_query($conn, $sqlNotifications);
$notifications = mysqli_fetch_all($resultNotifications, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Department Of Ayurveda Sri Lanka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/vendor/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/vendor/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/vendor/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="assets/vendor/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/src/plugins/fullcalendar/fullcalendar.css" />
    <link rel="stylesheet" type="text/css" href="assets/vendor/styles/style.css" />

	<style>
		/* Styling for the notifications dropdown */
.notification-menu {
    width: 350px;
    padding: 10px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.notification-list {
    max-height: 350px;
    overflow-y: auto;
}

.notification-item {
    display: flex;
    flex-direction: column;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #c9ecff;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

.notification-item:hover {
    background-color: #f1f1f1;
}

.notification-card {
    display: flex;
    flex-direction: column;
}

.notification-title {
    font-weight: bold;
    font-size: 14px;
    color: #333;
}

.notification-message {
    font-size: 12px;
    color: #777;
}

.notification-time {
    font-size: 10px;
    color: #aaa;
    margin-top: 5px;
    text-align: right;
}

.no-notification-message {
    text-align: center;
    color: #777;
}

.notification-active {    
    font-size: 12px;
    font-weight: bold;
	position: absolute;
    top: -1px;
    right: 0px;
   padding: 0px 7px;
   border-radius: 50%;
   background: red;
   color: white;
    }

	</style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258" crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
	 <!-- SweetAlert for notifications -->
	 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <h5>Admin Dashboard</h5>
    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a href="calender.php" class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="icon-copy bi bi-calendar"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <!-- Notification Dropdown -->
<div class="dropdown">
    <a class="dropdown-toggle no-arrow" href="notification.php" role="button" data-toggle="dropdown">
        <i class="icon-copy bi bi-bell"></i>
        <!-- Display unread notification count -->
        <span class=" notification-active"><?php echo $unreadCount; ?></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right notification-menu">
        <div class="notification-list mx-h-350 customscroll">
		<ul>
    <?php if (!empty($notifications)): ?>
        <?php foreach ($notifications as $notification): ?>
            <li class="notification-item" data-id="<?php echo $notification['id']; ?>" onclick="markAsRead(<?php echo $notification['id']; ?>, this)">
                <div class="notification-card">
                    <h5 class="notification-title"><?php echo htmlspecialchars($notification['message']); ?></h5>
                    <p class="notification-message">
                        <?php echo htmlspecialchars($notification['message']); ?>
                    </p>
                    <small class="notification-time"><?php echo date("F j, Y, g:i a", strtotime($notification['created_at'])); ?></small>
                </div>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li class="no-notification-message">
            No notifications yet.
        </li>
    <?php endif; ?>
</ul>

        </div>
    </div>
</div>

        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <?php

$sql_fetch = "SELECT * FROM admin_profiles WHERE admin_name = '{$_SESSION['admin_name']}'";
$result_fetch = mysqli_query($conn, $sql_fetch);
if ($result_fetch && mysqli_num_rows($result_fetch) > 0) {
    $row = mysqli_fetch_assoc($result_fetch);
    $profilePicture = $row['profile_picture'];
}

?>
<span class="user-icon">
    <img src="<?php

                // Display profile picture
                if (!empty($profilePicture)) {
                    $profilePicturePath = "uploads/" . $profilePicture;
                    echo $profilePicturePath ;
                } else {
                    echo "assets/img/default_profile_picture.png";
                }

                ?>" class="avatar-photo" style="width: 55px; height: 55px; object-fit: cover;">
</span>
                    <span class="user-name"><?php echo $_SESSION['admin_name']?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="adminSettings.php"><i class="bi bi-person-circle"></i> Profile</a>
                    <a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Header -->

<?php include('includes/side_bar.php'); ?>

<script>
        function markAsRead(notificationId, notificationItem) {
            $.ajax({
                url: 'mark_notification_as_read.php',
                type: 'POST',
                data: { notificationId: notificationId },
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status === 'success') {
                        // Remove the notification from the UI
                        $(notificationItem).remove();
                        
                        // Update the unread count
                        var badge = $('.notification-active');
                        var unreadCount = parseInt(badge.text()) || 0;
                        
                        if (unreadCount > 0) {
                            unreadCount--;
                            badge.text(unreadCount);
                            
                            // Update the badge visibility and color
                            if (unreadCount === 0) {
                                badge.hide();
                            } else {
                                badge.show();
                            }
                        }
                    } else {
                        console.error('Error marking notification as read:', result.message);
                    }
                },
                error: function(error) {
                    console.error('Error marking notification as read:', error);
                }
            });
        }

        $(document).ready(function() {
            var unreadCount = parseInt($('.notification-active').text()) || 0;
            if (unreadCount > 0) {
                $('.notification-active').show();
            } else {
                $('.notification-active').hide();
            }
        });
    </script>


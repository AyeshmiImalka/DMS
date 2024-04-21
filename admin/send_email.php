<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Status</title>
    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .success-message {
            color: green;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

// Email account credentials
$emailUsername = 'finalprojecttesting24@gmail.com'; // Your Gmail email address
$emailPassword = 'ylum itye oioq xqsb'; // Your Gmail password

// Retrieve form data
$emailTo = $_POST['email_address'];
$subject = $_POST['email_subject'];
$message = $_POST['email_message'];
$status = $_POST['email_status']; // Get the status from the form

// Initialize PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $emailUsername;
    $mail->Password = $emailPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recipients
    $mail->setFrom($emailUsername);
    $mail->addAddress($emailTo);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send email
    if ($mail->send()) {
        // Email sent successfully, now update the status in the database
        require 'config_form.php'; // Include your database connection file

        // Prepare and execute the SQL update query
        $update_query = "UPDATE local_drugs_registration_requests SET status = ? WHERE contact_email = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ss", $status, $emailTo);
        $stmt->execute();
        $stmt->close();

        echo "<p class='success-message'>Email sent successfully!</p>";
    } else {
        echo "<p class='error-message'>Failed to send email.</p>";
    }
} catch (Exception $e) {
    echo "<p class='error-message'>Failed to send email. Error: {$mail->ErrorInfo}</p>";
}
?>

    </div>
</body>
</html>

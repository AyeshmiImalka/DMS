<?php
@include 'config_form.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_id = mysqli_real_escape_string($conn, $_POST['paymentId']);
    $reg_name = mysqli_real_escape_string($conn, $_POST['regName']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $transaction_type = mysqli_real_escape_string($conn, $_POST['transactionType']);

    $sql = "INSERT INTO payment_records (payment_id, customer_name, amount, `date`, `time`, transaction_type) VALUES ('$payment_id', '$reg_name', '$amount', '$date', '$time', '$transaction_type')";

    if (mysqli_query($conn, $sql)) {
        echo 1; // Success
    } else {
        // Output the SQL error
        echo "Error: " . mysqli_error($conn);
    }
}
?>

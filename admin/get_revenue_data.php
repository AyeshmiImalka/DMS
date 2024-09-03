<?php
@include 'config_form.php';
header('Content-Type: application/json');

// Get the current year
$current_year = date('Y');

$sql = "SELECT MONTHNAME(date) as month, SUM(amount) as revenue 
        FROM payment_records 
        WHERE YEAR(date) = '$current_year' 
        GROUP BY MONTH(date) 
        ORDER BY MONTH(date)";
        
$result = mysqli_query($conn, $sql);

$data = [['Time Period', 'Revenue']];

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = [$row['month'], (int)$row['revenue']];
    }
}

echo json_encode($data); 
?>

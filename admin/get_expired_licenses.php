<?php
@include 'config_form.php';
session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
}

$sql = "SELECT * FROM manufacturingcenters_db WHERE Renewal_update < CURDATE()";
$result = mysqli_query($conn, $sql);

$output = '';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>';
        $output .= '<td>' . $row["Reg_id"] . '</td>';
        $output .= '<td>' . $row["Reg_name"] . '</td>';
        $output .= '<td>' . $row["Reg_date"] . '</td>';
        $output .= '<td>' . $row["LicenseRenewal(yrs)"] . '</td>';
        $output .= '<td>' . $row["Renewal_update"] . '</td>';
        $output .= '</tr>';
    }
} else {
    $output = '<tr><td colspan="5">No expired licenses found</td></tr>';
}

echo $output;
?>

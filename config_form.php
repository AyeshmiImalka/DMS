<?php
    $conn = mysqli_connect('localhost','root','','document_management_system');

     // Check connection
     if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "<script>console.log('Connected successfully')</script>";
    }
    


?>


<?php
    $conn = mysqli_connect('localhost','root','','document_management_system');

     // Check connection
     if (!$conn) {
        echo "Connection failed: ". mysqli_connect_error();
    }


?>


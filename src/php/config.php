<?php 

$conn = mysqli_connect("localhost", "root", "Password123#@!", "chatapp");

if (mysqli_connect_errno($conn)) {
    echo "Database not connect: ". mysqli_connect_error();
}


?>
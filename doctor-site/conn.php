<?php 
$con=mysqli_connect("localhost", "root", "", "ehc appointment system");

if (mysqli_connect_error()) {
    echo "failed to connect to MySQL:". mysqli_connect_error();
}
?>
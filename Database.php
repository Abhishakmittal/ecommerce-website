<?php



$con = mysqli_connect("localhost","root","","Myshop");


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>
<?php
 session_start(); 

$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$roll=$_GET['roll'];
$sql = "UPDATE `student` SET `gp_id`='' WHERE `roll_no`='$roll'";
if ($conn->query($sql) === TRUE) {
header('location:group_info.php');
}
?>
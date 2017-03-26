<?php
//include 'connection.php';
$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id=$_GET['id'];
$sql = "DELETE FROM stock where item_id='$id'";
if ($conn->query($sql) === TRUE) {
header('location:item.php');
}

?>
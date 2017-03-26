


<?php
$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id=$_GET['id'];

$sql1 = "DELETE FROM student where roll_no='$id'";
if ($conn->query($sql1) === TRUE) {?>
<script type="text/javascript">
   alert("Student is deleted successfully");
 
   window.location.href='home.php';
</script>

<?php
}
?>


<?php

$group=$_GET['d1'];
$branch=$_GET['d2'];
$sem=$_GET['d3'];



//database connectivity
$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1= "DELETE FROM `group` WHERE `group_name`='$group' and `branch`='$branch' and `sem`='$sem'";
$sql2= "UPDATE `student` SET `gp_id`='' WHERE `gp_id`='$group' and `branch`='$branch' and `semester`='$sem'";




if (($conn->query($sql1) === TRUE)&&($conn->query($sql2) === TRUE))
{
?>
   <script type="text/javascript">
   alert("Group is deleted successfully");
 
   window.location.href='home.php';
</script>

<?php 
}
else{
  echo "Error: " . $sql1 . "<br>" . $conn->error;
   echo "Error: " . $sql2 . "<br>" . $conn->error;

}


$conn->close();

?>



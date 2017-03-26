<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!---->
   <link rel="stylesheet" href="assets/js/jquery-ui.css">
  


</head>
<body>
<?php
//define variables and set to empty values
$nameErr = $emailErr =$passErr="";
$name = $email_id = $phone_no = $password =$confirm_password=$company_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } 
  	$name=test_input($_POST["name"]);
	$phone_no = test_input($_POST["qty"]);
	$password = test_input($_POST["details"]);
	$company_name = test_input($_POST["manuf"]);

if(!$phone_no){
$passErr="Please mention no of items";
}

if(!$company_name){
$emailErr="Please enter the manufacturer name";
}

if(!($nameErr||$emailErr||$passErr))
{//database connectivity

//include 'connection.php';
$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO stock values('','$name','$company_name','$password','$phone_no','$phone_no')";
if ($conn->query($sql) === TRUE) {
?>
    <script src="bootbox.min.js"></script>
   <script>
   alert("Done");
</script>


<?php
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

}
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>



    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="create_user.php" class="btn btn-info square-btn-adjust">Create user account</a>

<a href="edit_account.php" class="btn btn-primary square-btn-adjust">Edit your account</a>
<a href="change_password.php" class="btn btn-success square-btn-adjust">Change password</a> 
<a href="index.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <?php
                include 'menu.php';
                ?>

               
            </div>
            
        </nav>  
          <?php 
include 'connection.php';
?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Stock Entry</h2>   
                       
                       
                    </div>
                    
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <div class="row">

             <div class="col-xs-12" align="center">
             <div class="panel panel-success">
                        <div class="panel-heading">
                           Item List 
                        </div>
                        <div class="panel-body" style="overflow:auto;max-height:300px;">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Manufacturer</th>
                                            <th>Quantity</th>
                                            <th>Exp Date</th>
                                             <th>Edit</th>
                                             <th>Delete</th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
include 'connection_2.php';

?>
<?php
$result = mysql_query('SELECT * FROM `stock`');
if($result == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row=mysql_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" ."<a  href='stock_edit.php?id=".$row['item_id']."'>".$row['item_id']."</a>"."</td>";
  echo "<td>" . "<a href='blank_2.php?id=".$row['item_id']."'>".$row['item_name']."</a>". "</td>";
  echo "<td>" . "<a href='blank_2.php?id=".$row['item_id']."'>".$row['manufacturer']."</a>". "</td>";
    echo "<td>" . "<a href='blank_2.php?id=".$row['item_id']."'>".$row['quantity']."</a>". "</td>";
      echo "<td>" . "<a  href='modify_item.php?id=".$row['item_id']."'>"."<input type='submit' class='btn btn-success btn-sm' value='Edit'>"."</a>". "</td>";

     echo "<td>" . "<a  href='delete_item.php?id=".$row['item_id']."'>"."<input type='submit' class='btn btn-danger btn-sm' value='Delete'>"."</a>". "</td>";
  echo "</tr>";
}
echo "</table>";
?>
                                </table>
                            </div>
                        </div>
                    </div>
				</div>
            
            <!-- /.row -->
            </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>

    <script src="assets/js/jquery-ui.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    
    
   
</body>
</html>

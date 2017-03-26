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
   <style>
.error {color: #FF0000;
		font-size:15px;}
		
</style>


</head>
<body>
<?php
//define variables and set to empty values
$nameErr = $emailErr =$passErr="";
$name = $email_id = $phone_no = $password =$confirm_password=$company_name = "";
if ($_SERVER["REQUEST_METHOD"] != "POST")
{
session_start();
$id=$_GET['id'];
$_SESSION['id']=$id;

include 'connection_2.php';
               
$sql = mysql_query("SELECT * FROM stock where item_id='$id'");
if($sql == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
	$row=mysql_fetch_array($sql);
$name=$row['item_name'];
$company_name=$row['manufacturer'];
$password=$row['other_details'];
$phone_no=$row['quantity'];


}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
session_start();
$id=$_SESSION['id'];

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

$sql = "UPDATE stock SET item_name='$name',manufacturer='$company_name',other_details='$password',quantity='$phone_no' WHERE item_id='$id'";

if ($conn->query($sql) === TRUE) {
session_destroy();
?>
    <script src="bootbox.min.js"></script>
   <script>
   
   
   alert("Done");
   window.location.href='item.php';
   
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
 <a href="login.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                     <h2>Edit Item Details</h2>   
                       
                       
                    </div>
                    
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <div class="row">
                <div class="col-xs-6" align="center">
                
                    <div class="panel panel-primary">
                        <div class="panel-heading" align="center">
                           <small> Please fill up the form below</small>
                        </div>
                        <div class="panel-body" align="center" style="background:#fff;">
                            <div class="row" style="padding-left:30px;padding-right:30px;"  >
                                    <form role="form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                    
									<p><span class="error"> *  Mandatory field.</span></p>
                                        <div class="form-group">
                                            <label>Name<span class="error"> *</span></label>&nbsp;&nbsp;&nbsp;<input  style="float:left;" class="form-control" name="name" value="<?php echo $name;?>" placeholder="Please enter item name" name="T1" size="20"><span class="error"> <?php echo $nameErr;?></span>
                                                    </div>              
                                        <div class="form-group">
                                            <label>Manuf    </label><span class="error"> *&nbsp;&nbsp;&nbsp;<?php echo $emailErr;?></span>
                                     		 <input class="form-control" name="manuf" value="<?php echo $company_name;?>"placeholder="Please enter manufacturer name">
                                     		 <label>Other details</label>
											<!--<input class="form-control" name="details" value="<?php echo $company_name;?>" placeholder="Any information?">-->
											   <textarea class="form-control" name="details" value="<?php echo $password;?>" placeholder="Any information?" rows="3"></textarea>
											</div>
                                         <div class="form-group">
                                            <label >Quantity    </label><span class="error"> *&nbsp;&nbsp;&nbsp;   </label><span class="error"><?php echo $passErr;?></span>
                                            <input class="form-control" name="qty" value="<?php echo $phone_no;?>"placeholder="Please enter no of items">
                                          
                                        </div>
                                        <button type="reset"  class="btn btn-info">Reset</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-success">Edit</button>
                                        
                                    </form>
                                    
                                </div>
                                	
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <div class="col-xs-6" align="center">
             <div class="panel panel-default">
                        <div class="panel-heading">
                           Item List 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                             <th>ID</th>
                                            <th>Name</th>
                                            <th>Manufacturer</th>
                                            <th>Quantity</th>
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
      echo "<td>" . "<a  href='modify_item.php?id=".$row['item_id']."'>"."<input type='submit' value='Edit'>"."</a>". "</td>";

     echo "<td>" . "<a  href='delete_item.php?id=".$row['item_id']."'>"."<input type='submit' value='Delete'>"."</a>". "</td>";
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
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

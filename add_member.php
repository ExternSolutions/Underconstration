<?php session_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Group Creation</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
<script type="text/javascript">
function f()
{
window.location.href='home.php';
}
</script>
 
   <style>
.error {color: #FF0000;
		font-size:15px;}
		
</style>

</head>
<body>
<?php
//define variables and set to empty values
$roll_no='';
if ($_SERVER["REQUEST_METHOD"]!="POST") 
{
$_SESSION["group"]=$_GET['q1'];
$_SESSION["sem"]=$_GET['q2'];

$_SESSION["branch"]=$_GET['q3'];

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$roll_no=$_POST['roll_no'];
//database connectivity
$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$group=$_SESSION["group"];
 include 'connection_2.php';
$result = mysql_query("SELECT * FROM `student` where roll_no='$roll_no'");
if($result == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

if(mysql_fetch_array($result)==NULL)
{
?>
 <script type="text/javascript">
 alert("Student is not registered");
 
            
</script>
<?php
}
else
{
$sql = " UPDATE `student` SET `gp_id`='$group' WHERE `roll_no`='$roll_no'";


if ($conn->query($sql) === TRUE) {
?>
    <script src="bootbox.min.js"></script>
   <script type="text/javascript">
  
	 bootbox.alert("Member is added successfully!", function() {
    
    		
                //window.location.href="add_member.php";
            });
</script>


<?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();

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
                <a class="navbar-brand" href="admin.php">Admin</a> 
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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12"align="center">
                     <h2> <font color="#669999" size="5">Group information</font></h2>   
                       
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <div class="row">
                 <div class="col-sm-6" align="center">
                 <div class="panel panel-primary" >
                        <div class="panel-heading" align="center">
                           <small> Please fill up the form below</small>
                        </div>
                        <div class="panel-body" align="center" style="background:#ccc;">
                        <form role="form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                        <div class="form-group">
                                            <label>Enter Roll No.</label>
                                            <input class="form-control" name="roll_no"  placeholder="Please enter roll no here" name="T1" size="30">
                                            
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm"> <label>Add </label></button>
                                         <button type="button" class="btn btn-primary btn-sm" onclick='f()'><label>Finish</label></button>

                                        </form>
                        </div>
                        </div>
   						
				
				</div>
				
                <div class="col-sm-6" align="center">
                <h3>Members</h3>
                <hr/>
                  <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                             <th>Roll number</th>
                                            <th>Name</th>
                                            <th>Branch</th>
                                            <th>semester</th>
                                            <th>Delete member</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
include 'connection_2.php';

?>
<?php
$group=$_SESSION["group"];
$branch=$_SESSION["branch"];
$sem=$_SESSION["sem"];

$result =  mysql_query("SELECT * FROM `student` where `branch`='$branch' and `semester`='$sem' and `gp_id`='$group'");
if($result == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row=mysql_fetch_array($result))
{
?>
  <tr>
         <td><?php echo $row['roll_no'] ?></td>
         <td><?php echo $row['name'] ?></td>
         <td><?php echo $row['branch'] ?></td>
           <td><?php echo $row['semester'] ?></td>
         

         <td><a href="delete_member.php?roll=<?php echo $row['roll_no']; ?>" class="btn btn-danger btn-xs" role="button">Delete</a></td>


      </tr>




<?php }?>
                                </tbody>
                                </table>
                            </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    
    
   
</body>
</html>

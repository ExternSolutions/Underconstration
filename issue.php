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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$roll= test_input($_POST["roll"]);
	$grp = test_input($_POST["grp"]);
	$item=$_POST["item"];
	$slno=$_POST["slno"];


//if(!$phone_no){
//$passErr="Please mention no of quantity";
//}

//if(!$password){
//$passErr="Please write some details";
//}

if(!($nameErr||$emailErr||$passErr))
{//database connectivity
$dt= date("Y-m-d");
include 'connection_2.php';
$chk = mysql_query("SELECT * FROM issue where item_name='$item' AND sl_no='$slno'");
if($chk == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
$num_rows = mysql_num_rows($chk);
if($num_rows!=0)
{
$row=mysql_fetch_array($chk);
$chk1=$row['return_date'];
if($chk1=='0000-00-00')
{?>
 <script>
   alert("This SL No is already issued");
</script>
<?php
}
}
else{
$chk2 = mysql_query("SELECT * FROM stock where item_name='$item'");
if($chk2 == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
$row1=mysql_fetch_array($chk2);
$chk3=$row1['available'];
//echo $chk3;
if($chk3=='0')
{?>
<script>
   alert("Stock Nill");
</script>

<?php
}
else{

$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO issue values('$roll','$grp','$item','$slno','$dt','')";
if ($conn->query($sql) === TRUE) {
$sql1 = "UPDATE stock SET `available`=(`available`-1) WHERE `item_name` = '$item'";
if ($conn->query($sql1) === TRUE) {
?>
    <script src="bootbox.min.js"></script>
   <script>
   alert("Done.....!");
</script>


<?php
}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

//$conn->close();
}
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
$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Issue</h2>   
                       
                       
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
                        <div class="panel-body" align="center" style="background:#ccc;">
                            <div class="row" style="padding-left:30px;padding-right:30px;"  >
                                    <form role="form"  method="post" name="f1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                    
									<p><font color="#FF0000"><span class="error"> * Group Id or Roll No</span></font></p>
                                        <div class="form-group">
                                            <label>Roll No</label>&nbsp;&nbsp;&nbsp;<input  style="float:left;" class="form-control" name="roll" placeholder="Please enter item name" size="20"><span class="error"> <?php echo $nameErr;?></span>
                                                    </div>              
                                        <div class="form-group">
                                            <label>Group Id</label>
                                     		 <input class="form-control" name="grp" placeholder="Please enter manufacturer name" size="20">
                                     		 <label>Select Item</label>
                                     		 <select class="form-control" id="sel1"  name="item">
                                     		 <option >Select Item</option>

                                     		 <?php
                                     		 include 'connection_2.php';
$result = mysql_query('SELECT * FROM `stock`');
if($result == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row=mysql_fetch_array($result))
{
 
 // echo "<td>" ."<a  href='stock_edit.php?id=".$row['item_id']."'>".$row['item_id']."</a>"."</td>";
 echo "<option> ".$row['item_name']."</option>";
 }
?>
 </select>
    <div class="form-group">
     <label>SL. No</label>

<input  style="float:left;" class="form-control" name="slno" placeholder="Please enter Sl No">
</div>
											   </div><br><br>
                                         <button type="reset"  class="btn btn-info">Reset</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary">Issue</button>
                                        
                                    </form>
                                    
                                </div>
                                	
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  
                </div>
                <!-- /.col-lg-12 -->
            </div>
             
            <div class="col-xs-6" align="center">
                
                    <div class="panel panel-success">
                        <div class="panel-heading" align="center">
                           Check issued items
                        </div>
                        <div class="panel-body" align="center" style="background:#fff;">
                            <div class="row" style="padding-left:30px;padding-right:30px;"  >
                                    <form role="form"  method="post" name="f2" action="check_issued_items.php">
                                    
									<p><font color="#FF0000"><span class="error"> Enter either  Roll No or Group Id </span></font></p>
                                        <div class="form-group">
                                            <label>Roll No<span class="error"> *</span></label>&nbsp;&nbsp;&nbsp;<input  style="float:left;" class="form-control" name="roll_no" placeholder="Please enter roll no here" size="20"><span class="error"> <?php echo $nameErr;?></span>
                                                    </div>
                                                    <div class="form-group">
                                            <label>Group name<span class="error"> *</span></label>&nbsp;&nbsp;&nbsp;<input  style="float:left;" class="form-control" name="group_name" placeholder="Please enter group name here" size="20"><span class="error"> <?php echo $nameErr;?></span>
                                                    </div>              
                                        <br><br>
                                         <button type="reset"  class="btn btn-info">Reset</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-success">Check</button>
                                        
                                    </form>
                                    
                                </div>
                                	
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  
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

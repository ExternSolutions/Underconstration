<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create User</title>
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

 
   <style>
.error {color: #FF0000;
		font-size:15px;}
		
</style>

</head>
<body>
<?php
//define variables and set to empty values
$nameErr = $passErr=$userErr="";
$name = $pass=$pass1=$user="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
     $name = test_input($_POST["name"]);
	  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white spaces are allowed";
     }
   
  
   if (empty($_POST["pass"])) {
     $passErr = "password is required";
   } else {
     $passx= md5(test_input($_POST["pass"]));
	
    
   }
   if (empty($_POST["user_name"])) {
     $userErr = "username is required";
   }else
       $user=$_POST["user_name"];

			if(empty($_POST["pass"])||empty($_POST["pass1"]))
					{
					$passErr="Please provide and confirm password";
					}
					else if($_POST["pass"]!=$_POST["pass1"])
					{
					$passErr="Password mismatch";
					
					}
					

	

 if(!($nameErr||$userErr||$passErr))
{//database connectivity
$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO user values('$user','$name','$passx')";


if ($conn->query($sql) == TRUE) {
?>
    <script src="bootbox.min.js"></script>
   <script type="text/javascript">
  
	
	

   
    bootbox.alert("Account is created!", function() {
    
    		
               // window.location.href="home.php";
            });
</script>


<?php
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  
?>
  <script type="text/javascript">
  alert("Please choose another username");
	</script>
	
<?php
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
font-size: 16px;"><a href="create_user.php" class="btn btn-info square-btn-adjust">Create user account</a>

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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2> User Account Creation</h2>   
                       
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <div class="row">
                <div class="col-sm-12" align="center">
                <div class="col-xs-1"></div>
                <div class="col-xs-9">
                    <div class="panel panel-info" >
                        <div class="panel-heading" align="center">
                           <small> Please fill up the form below</small>
                        </div>
                        <div class="panel-body" align="center" style="background:#ccc;">
                            <div class="row" >
                               <div class="col-sm-2"></div>
                                
                               		<div class="col-sm-8">
                                    <form role="form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                    
									<p><span class="error"> *  Mandatory field.</span></p>
                                        <div class="form-group">
                                            <label>Name<span class="error"> *&nbsp;&nbsp;&nbsp;   </label><span class="error"><?php echo $nameErr;?></span>
                                            <input   class="form-control" name="name" value="<?php echo $name;?>" placeholder="Please enter student name here" name="T1" size="20">
                                           
                                        </div>
                                        
                                        <div class="form-group ">
                                            <label >Enter a username<span class="error"> *</span></label>&nbsp;&nbsp;&nbsp;<span class="error" > <?php echo $userErr;?></span>
											
                                            <input  class="form-control" name="user_name" value="<?php echo $user;?>" placeholder="Please enter username here">
											
											
                                        </div>
                                        <div class="form-group ">
                                            <label >Enter a password<span class="error"> *</span></label>&nbsp;&nbsp;&nbsp;<span class="error" > <?php echo $passErr;?></span>
											
                                            <input  class="form-control" type="password" name="pass" value="<?php echo $pass;?>" >
											
											
                                        </div>
                                        <div class="form-group ">
                                            <label >Confirm password</label>
											
                                            <input  class="form-control"  type="password"   name="pass1" value="<?php echo $pass1;?>">
											
											
                                        </div>

                                         
                                        
                                         

                                        <br>
                                        <button type="reset"  class="btn btn-warning btn-sm"> Reset </button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary btn-sm"> Register</button>
                                        
                                    </form>
                                    
                                </div>
                                	<div class="col-sm-2"></div>

                               </div>
                                
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        </div>
                        <div class="col-xs-2"></div>

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
    
    
   
</body>
</html>

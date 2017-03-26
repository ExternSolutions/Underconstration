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

 
   <style>
.error {color: #FF0000;
		font-size:15px;}
		
</style>

</head>
<body>
<?php
//define variables and set to empty values
$nameErr="";
$name =$branch=$sem="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Group name is required";
   } else {
     $name = test_input($_POST["name"]);
	 
   }
  
  
    $branch=$_POST["branch"];
    
     $sem=$_POST["sem"];
    session_start();

   $_SESSION["group"]=$name;
   $_SESSION["branch"]=$branch;
   $_SESSION["sem"]=$sem;   


	


 if(!$nameErr)
{//database connectivity

$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO `group` VALUES ('$sem','$branch','$name')";


if ($conn->query($sql) === TRUE) {
?>
    <script src="bootbox.min.js"></script>
   <script type="text/javascript">
  
	
	

   
    bootbox.alert("You have created group successfully!", function() {
    
    		
                window.location.href="group_info.php";
            });
</script>


<?php
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    ?>
    <script type="text/javascript">
     alert("This group name is already registered, please choose another name");
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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2> Group Creation</h2>   
                       
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <div class="row">
                <div class="col-sm-12" align="center">
                
                    <div class="panel panel-primary" >
                        <div class="panel-heading" align="center">
                           <small> Please fill up the form below</small>
                        </div>
                        <div class="panel-body" align="center" style="background:#ccc;">
                            <div class="row" >
                               <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                               	<div class="row">
                               	<div class="col-sm-1"></div>
                               		<div class="col-sm-10">
                                    <form role="form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                    
									<p><span class="error"> *  Mandatory field.</span></p>
                                        <div class="form-group">
                                            <label> Group Name<span class="error"> *&nbsp;&nbsp;&nbsp;   </label><span class="error"><?php echo $nameErr;?></span>
                                            <input   class="form-control" name="name" value="<?php echo $name;?>" placeholder="Please enter group name here" name="T1" size="20">
                                           
                                        </div>
                                        
                                        
                                        <div class="row">
                               			<div class="col-sm-2"></div>
										<div class="col-sm-8">

                                        <div class="form-group">
                                            <label for="sel1" >Select Branch    </label>
                                     		 <select class="form-control" id="sel1"  name="branch">
        									<option >civil</option>
     										<option >Mechanical</option>
        									<option>Computer</option>
        									<option >Electrical</option>
        									<option >Instrumentation</option>


    										 </select>
												</div>
                                           <div class="form-group" >
                                            <label for="sel2" >Select Semester    </label>
                                             <select class="form-control" id="sel2"   name="sem">
        									
      										<option >1st</option>
        									<option>2nd</option>
        									<option >3rd</option>
											<option >4th</option>
											<option >5th</option>
											<option >6th</option>
											<option >7th</option>
											<option >8th</option>
 										 </select>
                                        </div>
                                         
                                     		 </div>
												<div class="col-sm-2"></div>

												</div>

                                         
                                        
                                         

                                        <br>
                                        <button type="reset"  class="btn btn-warning btn-sm"> <label>Reset </label></button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary btn-sm"> <label>Create</label></button>
                                        
                                    </form>
                                    
                                </div>
                                	<div class="col-sm-1"></div>

                               </div>
                                
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
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
    
    
   
</body>
</html>

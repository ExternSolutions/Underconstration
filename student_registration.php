<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Registration</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

   <!--For Calendar-->
   <link rel="stylesheet" href="assets/js/jquery-ui.css">
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>

 
   <style>
.error {color: #FF0000;
		font-size:15px;}
		
</style>

</head>
<body>


  <script>
      $(function() {
        $( "#datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true
        });
      });
  </script>


<?php
//define variables and set to empty values
$nameErr = $rollErr=$emailErr=$passErr="";
$name = $roll_no=$group_id=$branch=$sem=$course="";
$name = $email_id = $phone_no = $password =$confirm_password=$company_name =$price= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
	  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white spaces are allowed";
     }
   }
  
   if (empty($_POST["roll_no"])) {
     $rollErr = "Roll no is required";
   } else {
     $roll_no= test_input($_POST["roll_no"]);
	
    
   }
    $branch=$_POST["branch"];
    
     $sem=$_POST["sem"];
       $course=$_POST["course"];


	$group_id = test_input($_POST["group_id"]);


 if(!($nameErr||$rollErr))
{//database connectivity
$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO student values('$roll_no','$name','$branch','$sem','$group_id','','$course')";


if ($conn->query($sql) == TRUE) {
?>
    <script src="bootbox.min.js"></script>
   <script type="text/javascript">
  
	
	

   
    bootbox.alert("You have successfully registered!", function() 
    {
    
    		
               // window.location.href="home.php";
            });
</script>


<?php
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
   ?>
   <script type="text/javascript">
     alert("This student is already registered");
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
                        <h2> Item Registration</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <div class="row">
                <div class="col-sm-12" align="center">
                        <div class="panel panel-primary">
                            <div class="panel-heading" align="center">
                                <small> Item Entry Details</small>
                            </div>
                            <div class="panel-body" align="center" style="background:#ccc;">
                                <div class="row" style="padding-left:30px;padding-right:30px;"  >
                                    <form class="form-horizontal" role="form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                        <p><span class="error"> * Mandatory field.</span></p>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Name<span class="error"> *</span></label>
                                            <div class="col-sm-10">
                                                <input  style="float:left;" class="form-control" name="name" value="<?php echo $name;?>" placeholder="Please enter item name" name="T1" size="20"><span class="error"> <?php echo $nameErr;?></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Manufacturer<span class="error"> *<?php echo $emailErr;?></span></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="manuf" value="<?php echo $company_name;?>"placeholder="Please enter manufacturer name">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-sm-2" >Quantity<span class="error">*<?php echo $passErr;?></span></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="qty" value="<?php echo $phone_no;?>"placeholder="Please enter no of items">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Price<span class="error">*<?php echo $price;?></span></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="price" value="<?php echo $price;?>"placeholder="Please enter no of items">
                                            </div>
                                        </div>    

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" >Exp Date<span class="error">*<?php echo $passErr;?></span></label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="expdate" type="text" id="datepicker">
                                            </div>
                                        </div>
                                        <button type="reset"  class="btn btn-info">Reset</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        
                                    </form>
                                    
                                </div>
                                  
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  
                </div>
                <!-- /.col-lg-12 -->
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
    
    
   
</body>
</html>

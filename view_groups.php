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
$group_name=$group_sem=$group_branch='';
 include 'connection_2.php';
$result = mysql_query("SELECT * FROM `group`");
if($result == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

if(mysql_fetch_array($result)==NULL)
{
?>
 <script type="text/javascript">
 alert("No group!");
 window.location.href='home.php';
</script>
<?php
}


if ($_SERVER["REQUEST_METHOD"] == "POST") 

  
{

session_start();

$group_name=$_SESSION["group"]=$_POST["name"];
$group_sem=$_SESSION["sem"]=$_POST["sem"];

$group_branch=$_SESSION["branch"]=$_POST["branch"];
 //modification
  include 'connection_2.php';
$result = mysql_query("SELECT * FROM `group` where group_name='$group_name' and sem='$group_sem' and branch='$group_branch'");
if($result == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

if(mysql_fetch_array($result)==NULL)
{
?>
 <script type="text/javascript">
 alert("Group does not exist");
 
            
</script>
<?php
}
else
{
?>
 

   <script src="bootbox.min.js"></script>
   <script type="text/javascript">
  window.location.href="group_info.php";
            
</script>

<?php
}}
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
                    <div class="col-md-12"align="center">
                     <h2> <font color="#669999" size="5">View group details</font></h2>   
                       
                       
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
                                    
									
                                        
                                        
                                        <div class="row">
                               			<div class="col-sm-2"></div>
										<div class="col-sm-8">
										<div class="form-group">
                                            <label for="sel1" >Select Group Name   </label>
                                     		 <select class="form-control" id="sel1"  name="name">
        									 <?php
                                     		 include 'connection_2.php';
$result = mysql_query('SELECT * FROM `group`');
if($result == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

while($row=mysql_fetch_array($result))
{
 
 
 echo "<option> ".$row['group_name']."</option>";
 }
?>


    										 </select>
												</div>

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
                                        
                                       
                                        <button type="submit" class="btn btn-primary btn-sm"> <label>Search</label></button>
                                        
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

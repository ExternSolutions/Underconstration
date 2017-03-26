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
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
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
font-size: 16px;"> 
<a href="create_user.php" class="btn btn-info square-btn-adjust">Create user account</a>

<a href="edit_account.php" class="btn btn-primary square-btn-adjust">Edit your account</a>
<a href="change_password.php" class="btn btn-success square-btn-adjust">Change password</a> 
<a href="logout.php" value="logout" class="btn btn-danger square-btn-adjust">Logout</a>
</div>
</div>
  

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
                     <h2>Admin Dashboard</h2>   
                        <h5>Stock Management System </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-6"><a href="student_registration.php">         
                    <div class="panel panel-back noti-box">
                      <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-graduation-cap"></i>
                      </span>
                      <div class="text-box" >
                    <p class="main-text">Stock Entry</p>
                     </div>
             </div>
		     </div></a>
                    <div class="col-md-3 col-sm-6 col-xs-6"> <a href="item.php">          
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Stock</p>
                    </div>
             </div>
		     </div></a>
                    <div class="col-md-3 col-sm-6 col-xs-6"> <a href="issue.php">          
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-check"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Sales</p>
					</div>
             </div></a>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6"> <a href="return.php">          
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-backward"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Return</p>
                    
                </div>
             </div></a>
		     </div>
			</div>
                 <!-- /. ROW  -->
                <hr />                
              
                 <!-- /. ROW  -->
                
                 <!-- /. ROW  -->
                
                 <!-- /. ROW  -->
                     
                 <!-- /. ROW  -->           
    		</div>
    		<div class="row">
    		<div class="col-md-3">
  <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div class="panel-footer back-footer-green">
                            <i class="glyphicon glyphicon-ok-sign"></i>
                            <h3> Available Stock</h3>
                             
                        </div>
                        
                    </div>
                    </div>
                    
    		<div class="col-xs-9" align="center">
             <div class="panel panel-primary" >
             
                        <div class="panel-heading">
                          <label> Item List </label>
                        </div>
                        <div class="panel-body" style="overflow:auto;max-height:300px;">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead >
                                        <tr>
                                            
                                            <th>Name</th>
                                            <th>Manufacturer</th>
                                            <th>Quantity</th>
                                            <th>Available now</th>

                                             
                                        </tr>
                                    </thead>
                                    <tbody >
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
 
  echo "<td>" . "<a href='blank_2.php?id=".$row['item_id']."'>".$row['item_name']."</a>". "</td>";
  echo "<td>" . "<a href='blank_2.php?id=".$row['item_id']."'>".$row['manufacturer']."</a>". "</td>";
    echo "<td>" . "<a href='blank_2.php?id=".$row['item_id']."'>".$row['quantity']."</a>". "</td>";
     echo "<td>" . "<a href='blank_2.php?id=".$row['item_id']."'>".$row['available']."</a>". "</td>";

      
  echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
	
                               
                            </div>
                        </div>
                    </div>
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
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

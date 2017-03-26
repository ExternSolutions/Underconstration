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
font-size: 16px;"> hi hi hi hi &nbsp; <a href="login.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                       <form class="form-inline"  role="form" name="f2" method="get" action="search_roll.php">	
                                            <input  class="form-control" name="roll_no" value="" placeholder="Please enter roll no here">
                                            <button class="btn btn-primary btn-sm"> 
										Search </button></form>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
 
 <div class="panel panel-default">
                        <div class="panel-heading">
                            Details</div>
                        <!-- /.panel-heading -->
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
<?php
include 'connection_2.php';
               $id=$_GET['roll_no'];
$sql = mysql_query("SELECT * FROM student where roll_no='$id'");
if($sql == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
	$row=mysql_fetch_array($sql);
	//echo "";
	echo "<tr>";
	 echo "<td>Roll No:</td>";
    echo "<td>" . "<a href='#'>".$row['roll_no']."</a>". "</td>";
     echo "</tr>";

    echo "<tr>";
	 echo "<td>Name</td>";
    echo "<td>" . "<a href='#'>".$row['name']."</a>". "</td>";
 echo "</tr>";

    echo "<tr>";
	 echo "<td>Branch</td>";
    echo "<td>" . "<a href='#'>".$row['branch']."</a>". "</td>";
 echo "</tr>";

    echo "<tr>";
	 echo "<td>Semester</td>";
    echo "<td>" . "<a href='#'>".$row['semester']."</a>". "</td>";
 echo "</tr>";
    echo "<tr>";
	 echo "<td>Group</td>";
    echo "<td>" . "<a href='#'>".$row['gp_id']."</a>". "</td>";
 echo "</tr>";
   echo "<tr>";
	 echo "<td>Course</td>";
    echo "<td>" . "<a href='#'>".$row['course']."</a>". "</td>";
 echo "</tr>";




?>

		</table>
</form>
    </div>                    <!-- /.panel-body -->
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
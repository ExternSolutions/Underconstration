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
<?php
//define variables and set to empty values
$nameErr = $rollErr="";
$name = $roll_no=$group_id=$branch=$sem=$course="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $branch=$_POST["branch"];
         $sem=$_POST["sem"];
       $course=$_POST["course"];
}?>
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
                     <div class="col-xs-8" align="center">
                        <form class="form-inline"  role="form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                            <div class="row">
                            </form>                       
               
                       <!-- /. ROW  -->
                </div>
    </div>
     <div class="col-xs-4" align="center">
     <span class="error"> 
								 <form class="form-inline"  role="form" name="f2" method="get" action="search_roll.php">	
                                            <input  class="form-control" name="roll_no" value="" placeholder="Please enter roll no here">
                                           
                                            <button class="btn btn-primary btn-sm"> 
										Search </button></form>
                 </div>
             <!-- /. PAGE INNER  -->
            </div>
            <hr />
            <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                             <th>Roll</th>
                                            <th>Name</th>
                                            <th>Branch</th>
                                            <th>Course</th>
                                            <th>Group</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

            <?php
       include 'connection_2.php';
       $result = mysql_query("SELECT * FROM `student` where branch='$branch' AND semester='$sem' AND course='$course'");
if($result == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row=mysql_fetch_array($result))
{
  echo "<tr>";
  $roll=$row['roll_no'];
  echo "<td>" ."<a  href='#'>".$row['roll_no']."</a>"."</td>";
  echo "<td>" ."<a  href='#'>".$row['name']."</a>"."</td>";
 echo "<td>" ."<a  href='#'>".$row['branch']."</a>"."</td>";
    echo "<td>" . "<a href='#'>".$row['course']."</a>". "</td>";
    echo "<td>" . "<a href='#'>".$row['gp_id']."</a>". "</td>";
    echo "<td>" . "<a  href='modify_student.php?id=".$row['roll_no']."'>"."<input type='submit' class='btn btn-success btn-sm' name='submit' value='Edit'>"."</a>". "</td>";
     echo "<td>" . "<a  href='delete_student.php?id=".$row['roll_no']."'>"."<input type='submit' class='btn btn-danger btn-sm' name='submit' value='Delete'>"."</a>". "</td>";

    
  echo "</tr>";
}
       ?>
</table>  
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

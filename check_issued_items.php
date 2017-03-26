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
$roll_no = $group_name="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_no=$_POST["roll_no"];
         $group_name=$_POST["group_name"];
         if(empty($roll_no)&&empty($group_name))
         {
         ?>
         <script type="text/javascript">
         alert("Please fill up any one field");
         window.location.href="issue.php";
         </script>
         <?php }
         if(!(empty($roll_no)||empty($group_name)))
         {
         ?>
         <script type="text/javascript">
         alert("Please fill up any one field");
         window.location.href="issue.php";
         </script>

         

        

       
<?php }}?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a> 
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
                     <h2> Issue details</h2>   
                       
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

            <div class="row">
            <div class="col-xs-8">
            <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                             <th>Roll No/Group Name</th>
                                            <th>Item Name</th>
                                            
                                            <th>Sl No.</th>
                                            <th>Issue date</th>
                                            <th>Return Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

            <?php
       include 'connection_2.php';
       if($roll_no)
       $result = mysql_query("SELECT * FROM `issue` where roll_no='$roll_no' ");
       if($group_name)
        $result = mysql_query("SELECT * FROM `issue` where gp_id='$group_name' ");

if($result == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
while($row=mysql_fetch_array($result))
{
  echo "<tr>";
  if($roll_no)
  echo "<td>" ."<a  href='#'>".$row['roll_no']."</a>"."</td>";
   if($group_name)
  echo "<td>" ."<a  href='#'>".$row['gp_id']."</a>"."</td>";

  
  echo "<td>" ."<a  href='#'>".$row['item_name']."</a>"."</td>";
 echo "<td>" ."<a  href='#'>".$row['sl_no']."</a>"."</td>";
    echo "<td>" . "<a href='#'>".$row['issue_date']."</a>". "</td>";
    echo "<td>" . "<a href='#'>".$row['return_date']."</a>". "</td>";
   
  echo "</tr>";
}
       ?>
  </tbody>
</table>  
		</div>
		</div>
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


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
$group_name=$group_sem=$group_branch='';
session_start(); 


$group_name= $_SESSION["group"];
$group_sem= $_SESSION["sem"];
$group_branch= $_SESSION["branch"];
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
                    <div class="col-md-12"align="center">
                     <h2> <font color="#669999" size="5">Group information</font></h2>   
                       
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <div class="row">
                 <div class="col-sm-6" align="center">
                 <div class="panel panel-default">
                        <div class="panel-heading">
                            Details</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table class="table">
                                <tbody>
                                <tr>
                                <th>Group name</th>
                                <td><?php echo $_SESSION["group"]; ?></td>
                                </tr>
                                <tr>
                                <th>Branch</th>
                                <td><?php echo  $_SESSION["branch"]; ?></td>
                                </tr>
								<tr>
                                <th>Semester</th>
                                <td><?php  echo  $_SESSION["sem"]; ?></td>
                                </tr>
								</tbody>
                               </table>
                         </div>
                         </div>
                         </div>
                
                 <!--<h3> <font color="#0000FF" size="4">Group Name : <?php echo $_SESSION["group"]; ?></font></h3>   
                    
                    <h2> <font color="#0000FF" size="4">Semester :<?php  echo  $_SESSION["sem"]; ?></font></h2>   
                      
                      <h2> <font color="#0000FF" size="4">Branch : <?php echo  $_SESSION["branch"]; ?></font></h2>  -->
                      <br> 
					 <a href="add_member.php?q1=<?php echo $group_name;?>&q2=<?php echo $group_sem;?>&q3=<?php echo $group_branch;?>" class="btn btn-primary btn-sm" role="button">Add member</a>
					 
   					 <button type="button" class="btn btn-danger btn-sm" onclick='fn()'><label>Delete group</label></button>
   					 <script type="text/javascript">
					function fn()
					{
					if(confirm("Do you want to delete the group ?"))
					{
					window.location.href="delete_group.php?d1=<?php echo $group_name;?>&d2=<?php echo $group_branch;?>&d3=<?php echo $group_sem;?>";
					}
					}
	
					</script>

   					

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
$result = mysql_query("SELECT * FROM `student` where `branch`='$group_branch' and `semester`='$group_sem' and `gp_id`='$group_name'");
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

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
.error{color:red;
</style>
</head>
<body>

<?php
//define variables and set to empty values

$newErr=$oldErr=$conErr='';
$old=$new=$con='';
session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {

$id=$_SESSION["user_name"];
$pass=$_SESSION["pass"];

   if (empty($_POST["old"])) 
   {
     $oldErr = "Old password is required";
     
   } else {
     	//$oldp = md5(test_input($_POST["old"]));
     	$oldp = test_input($_POST["old"]);
     	$oldp=md5($oldp);
	 	 include 'connection_2.php';
		$result = mysql_query("SELECT * FROM `user` where user_name='$id' and user_pass='$oldp'");
		if($result == FALSE) 
		{ 
    	die(mysql_error()); // TODO: better error handling
		}

			if(mysql_fetch_array($result)==NULL)
			{
			$oldErr="Old password mismatch";
			$con='';
			}
			else
				{$old=$pass;
				if(empty($_POST["new"])||empty($_POST["con"]))
					{
					$newErr="Please provide and confirm new password";
					}
					else if($_POST["new"]==$_POST["con"])
						{//database connectivity

						$conn = new mysqli('localhost','root','','stock_management');
						// Check connection
						if ($conn->connect_error) {
    					die("Connection failed: " . $conn->connect_error);
							}
						//$newp=md5($_POST["new"]);
						$newp=$_POST["new"];
						$newp=md5($newp);
						$pass=md5($pass);
						$sql = "UPDATE user SET user_pass='$newp' WHERE `user_name`='$id' and user_pass='$pass'";


						if ($conn->query($sql) === TRUE) {
						?>
    
   						<script type="text/javascript">
  
	
	

   
   
    					alert("Successful");
                		window.location.href="home.php";
          
						</script>


						<?php
						} else {
    					echo "Error: " . $sql . "<br>" . $conn->error;
						}


						$conn->close();
						}

						else
							$newErr="Password Mismatch";
							$con='';
						
					
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

	
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Admin : Change password</h2>
               
                <h5>( Stock Management System )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                        <small> fill up the form</small>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" accept-charset="UTF-8" id="login-nav">
                                       <br />
                                     <div class="form-group input-group">
                                           <label>Enter your old password</label><span class="error"><?php echo $oldErr;?></span>
                                            <input name="old" value="<?php echo $old;?>" type="password" class="form-control" placeholder="Please enter your old password " />
                                        </div>
                                        <div class="form-group input-group">
                                           <label>Enter new password</label><span class="error"><?php echo $newErr;?></span>


                                            <input name="new" value="<?php echo $new;?>" type="password" class="form-control" placeholder="Please enter new password " />
                                        </div>
                                         <div class="form-group input-group">
                                           <label>Confirm new password</label><span class="error"><?php echo $conErr;?></span>


                                            <input name="con" value="<?php echo $con ;?>" type="password" class="form-control" placeholder="Please confirm new password " />
                                        </div>


                                                                             
                                    
                                     
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-success btn-block">Edit</button>
                                    </div>                                   
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


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

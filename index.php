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

$passErr = $userErr="";
$pass=$user_name='';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["pass"])) 
   {
   $passErr="password is required";
    }
    else
    
    $pass=md5($_POST["pass"]);
    //$pass=$_POST["pass"];

    
    
  
   if (empty($_POST["user_name"])) {
     $userErr = "user_name is required";
   } else {
     $user_name=$_SESSION["user_name"]=test_input($_POST["user_name"]);
	
    
   }
    
 if(!($passErr||$userErr))
{//database connectivity
$_SESSION["pass"]=$_POST["pass"];
include 'connection_2.php';

$result = mysql_query("SELECT * FROM `user` where user_name='$user_name' and user_pass='$pass'");
if($result == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

if(mysql_fetch_array($result)==NULL)
{
?>
 <script type="text/javascript">
 alert("Ooops...please enter correct data");
 
            
</script>
<?php
}
else
{ ?>
   <script type="text/javascript">
   window.location.href="home.php";
          
</script>
 <?php }
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
                <h2> Admin : Login</h2>
               
                <h5>( Stock Management System )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" accept-charset="UTF-8" id="login-nav">
                                       <br />
                                     <div class="form-group input-group">
                                     		<span class="error"><?php echo $userErr;?></span>

                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input name="user_name" type="text" class="form-control" placeholder="Your Username " />
                                        </div>
                                              <span class="error"><?php echo $passErr;?></span>
                                <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="pass" class="form-control"  placeholder="Your Password" />
                                        </div>
                                    
                                     
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-primary btn-block">Sign in</button>
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

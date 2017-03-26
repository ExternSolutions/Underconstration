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

$nameErr = $userErr="";
$name=$user_name='';
session_start();
if ($_SERVER["REQUEST_METHOD"] != "POST")
{

$id=$_SESSION["user_name"];
include 'connection_2.php';
               
$sql = mysql_query("SELECT * FROM user where user_name='$id'");
if($sql == FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
$row=mysql_fetch_array($sql);
$user_name=$id;
$name=$row['name'];

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
	  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white spaces are allowed";
     }
   }
  
   if (empty($_POST["user_name"])) {
     $userErr = "user_name is required";
   } else {
     $user_name= test_input($_POST["user_name"]);
	
    
   }
    

 if(!($nameErr||$userErr))
{//database connectivity

$conn = new mysqli('localhost','root','','stock_management');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user=$_SESSION["user_name"];
$sql = "UPDATE user SET name='$name',user_name='$user_name' WHERE `user_name`='$user'";


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
                <h2> Admin : Edit Account</h2>
               
                <h5>( Stock Management System )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                        <small> fill up the form</small>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" accept-charset="UTF-8" id="login-nav">
                                       <br />
                                     <div class="form-group input-group">
                                           <label>Edit your name</label><span class="error"><?php echo $nameErr;?></span>
                                            <input name="name" value="<?php echo $name;?>" type="text" class="form-control" placeholder="Please enter your name " />
                                        </div>
                                        <div class="form-group input-group">
                                           <label>Edit your username</label><span class="error"><?php echo $userErr;?></span>


                                            <input name="user_name" value="<?php echo $user_name;?>" type="text" class="form-control" placeholder="please enter your username " />
                                        </div>

                                                                             
                                    
                                     
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-primary btn-block">Edit</button>
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

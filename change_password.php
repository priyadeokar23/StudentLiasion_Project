<?php 

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "studentdata";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

if(isset($_POST['change'])){
    
    $email=$_SESSION['email'];
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
    
	if($password1 == $password2){
		$query="UPDATE `studentform` SET password = '$password1' where email='$email' limit 1";
    
		$result = mysqli_query($connect,$query);
    
		if($result){
	
			echo '<script type="text/javascript"> alert("Password Successfully Changed!!") </script>';
			
	
	
		}
		else{
			echo '<script type="text/javascript"> alert("Password Update Failed...") </script>';                    
		// echo '<script type="text/javascript"> alert("Incorrect email or password") </script>';
		
		}
		
	session_destroy();
	echo "<script>window.open('login_student.php','_self')</script>";

	}
	else{
		echo '<script type="text/javascript"> alert("Password Mismatched.") </script>';                    
	}
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>StudentLiaison</title>
 
  <link rel="stylesheet" href="./style.css">
  <style>
.bt {
  background-color: #4CAF50; /* Green */
  border: none;
  color: #1bb1dc;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1.1em;
  margin: 4px 2px;
  cursor: pointer;
  font-family: Verdana, Geneva, sans-serif;
}

.button1 {
  background-color:  #1bb1dc; 
  color: white; 
 
}
.button1:hover {
  background-color: #0a89c0;
  color: white;
}


</style>

</head>
<body>
<!-- partial:index.partial.html -->
<br>
<button class="bt button1" onclick="window.location.href='login_student.php';">Back</button>
<!--<h1 align="center" style="font-size:50px">Faculty Registration </h1>-->
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Forgot Password</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form action="change_password.php" method="POST">
          <div class="input_field"> 
            <input type="password" id="psw" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="New Password" required />
          </div>
		  <div class="input_field"> 
            <input type="password" id="psw" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm Password" required />
          </div>
		  <input class="button" type="submit" name="change" value="Change Password" />
        </form>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>
</body>
</html>

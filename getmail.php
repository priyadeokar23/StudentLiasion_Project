<?php 

session_start();

$hostname = "localhost";
$username = "root";
$password = "tejalpkhed@12_2001";
$databaseName = "studentdata";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

if(isset($_POST['confirm'])){
    
    $email=$_POST['email'];
    
    $query="select * from `studentform` where email='$email' limit 1";
    
   $result = mysqli_query($connect,$query);
    
    if(mysqli_fetch_array($result)>0){
	$_SESSION['email'] = $email;
		 //echo '<script type="text/javascript"> alert("Incorrect email or password") </script>';
		 echo "<script>window.open('change_password.php','_self')</script>";
	
	
    }
    else{
		echo '<script type="text/javascript"> alert("Incorrect Mail") </script>';                    
       // echo '<script type="text/javascript"> alert("Incorrect email or password") </script>';
	//echo "<script>window.open('login_faculty.php','_self')</script>";
	
    }
    
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>StudentLiasion</title>
 
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
<button class="bt button1" onclick="window.location.href='login_faculty.php';">Back</button>
<!--<h1 align="center" style="font-size:50px">Faculty Registration </h1>-->
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Forgot Password</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form action="getmail.php" method="POST">
          <div class="input_field"> 
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <input class="button" type="submit" name="confirm" value="Confirm Mail" />
        </form>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>
</body>
</html>

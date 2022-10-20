<?php 

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "studentdata";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

if(isset($_POST['login'])){
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $query="SELECT * FROM `studentform` where email='$email' AND password='$password' limit 1";
    
   $result = mysqli_query($connect,$query);
    
    if(mysqli_fetch_array($result)>0){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        echo '<script type="text/javascript"> alert("Successfully logged in") </script>';
        echo "<script>window.open('student_dashboard.php ','_self')</script>";
        exit();
    }
    else{
  //       echo '<script type="text/javascript"> alert("Incorrect email or password") </script>';
	// echo "<script>window.open('login_student.php','_self')</script>";
	// exit();
  $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        echo '<script type="text/javascript"> alert("Successfully logged in") </script>';
        echo "<script>window.open('student_dashboard.php ','_self')</script>";
        exit();
    }
        
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>StudentLiaison</title>
 
  <link rel="stylesheet" href="style.css">
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
<button class="bt button1" onclick="window.location.href='index.html';">Back</button>
<!--<h1 align="center" style="font-size:50px">Faculty Registration </h1>-->
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Student Log In</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form action="login_student.php" method="POST">
          <div class="input_field"> 
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <div class="input_field"> 
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <input class="button" type="submit" name="login" value="Log In" />
        </form>
      </div>
    </div>
  </div>
</div>
<p class="credit" style="left:210px; "><a href="getmail.php" target="_blank"> Forget Password &#9919;</a></p>
<p class="credit">Don't have a account? <a href="student_register.php" target="_blank">Register</a></p>
<!-- partial -->
  <script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>
</body>
</html>

<?php
session_start();

    $cno = $_SESSION['cno'];

	$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "studentdata";
    
   
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    

	
$query = "SELECT * FROM studentform WHERE cno  = '$cno'";

$result = mysqli_query($connect,$query);

while ($row_pro = mysqli_fetch_array($result)) {
  $cno = $row_pro['cno'];
  $fname = $row_pro['fname'];
  $mname = $row_pro['mname'];
  $lname = $row_pro['lname'];
  $year = $row_pro['year'];
  $contactno = $row_pro['contactno'];
  $email = $row_pro['email'];
  $password = $row_pro['password'];
		
    }
 
?>


<?php

// php code to Insert data into mysql database from input text
if(isset($_POST['edit']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "MySQL@2578";
    $databaseName = "studentdata";
    
    // get values form input text and number

    
    

    $cno= $_POST['cno'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$year = $_POST['year'];
$contactno = $_POST['contactno'];
$email = $_POST['email'];
$password = $_POST['password'];
    
    
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql query to insert data
																							
    $query = "UPDATE `studentform` SET cno='$cno',fname='$fname', mname='$mname', lname='$lname', year='$year', contactno='$contactno', email='$email', password='$password' WHERE cno='$cno'";
    
    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful

    if($result)
    {
        echo '<script type="text/javascript"> alert("Data Edited") </script>';
    }
    
    else{
	echo '<script type="text/javascript"> alert("Data Not Edited") </script>';
        
    }
    
	echo "<script>window.open('student_dashboard.php ','_self')</script>";
   // mysqli_free_result($result);
    mysqli_close($connect);
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>StudentLiaison</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<br>
<!--<h1 align="cen4ter" style="font-size:50px">Faculty Registration </h1>-->
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>EDIT Student Details </h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form action="" method="POST">
        <div class="input_field"> 
            <input id="cno" type="text" name="cno" value="<?php echo "$cno"?>" required />
          </div>
          <div class="input_field"> 
            <input id="email" type="email" name="email" value="<?php echo "$cno"?>" required />
          </div>
          <div class="input_field"> 
            <input type="password" id="psw" name="password" value="<?php echo "$email"?>" required />
          </div>
		   <div class="row clearfix">
            <div class="col_three">
             	<div class="input_field"> 
                <input type="text" name="fname" value="<?php echo "$fname"?>" required />
              </div>
            </div>
            <div class="col_three">
              <div class="input_field"> 
                <input type="text" name="mname" value="<?php echo "$mname"?>"  />
              </div>
            </div>
			 <div class="col_three">
              <div class="input_field"> 
                <input type="text" name="lname" value="<?php echo "$lname"?>" required />
              </div>
            </div>
          </div>
		     <div class="input_field">
            <input type="text" name="year" value="<?php echo "$year"?>" required/>
          </div>
		    
            
             <div class="input_field">
            <input type="tel" id="phone" name="contactno" value="<?php echo "$contactno"?>" required/>
            <!-- <input type="tel" name="c_no" placeholder="Contact No" required/> -->
          </div>
           
		  
          <input class="button" type="submit" name="register" value="Register" />
        </form>
      </div>
    </div>
  </div>
</div>
		   
      
    
<p class="credit">Want to go back? <a href="student_dashboard.php" target="_blank"> &#9754; Back</a></p>
<!-- partial -->
  <script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>
</body>
</html>

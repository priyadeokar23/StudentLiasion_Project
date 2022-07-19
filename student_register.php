<?php

// php code to Insert data into mysql database from input text
if(isset($_POST['register']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "tejalpkhed@12_2001";
    $databaseName = "studentdata";
    
    // get values form input text and number

    
    
    $cno=$_POST['cno'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $year = $_POST['year'];
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    
    //$sql = "INSERT INTO studentform (cno,fname,mname,lname,year,contactno,email,password) VALUES ('$cno','$fname','$mname','$lname','$year','$contactno','$email',$password);";

    
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql query to insert data

   // $query = "INSERT INTO `facultydata`(`email`, `password`, `first_name`, `middle_name`, `last_name`, `facnm_author`, `designation`, `contact_no`, `qualification`, `teaching`, `industry`, `research`, `area_of_interest`) VALUES ('$email','$password','$fname', '$mname', '$lname', '$aname', '$designation', '$contact_no', '$qualification','$teaching', '$industry', '$research','$area')";
    $query= "INSERT INTO `studentform` (`cno`,`fname`,`mname`,`lname`,`year`,`contactno`,`email`,`password`) VALUES (`$cno`,`$fname`,`$mname`,`$lname`,`$year`,`$contactno`,`$email`,`$password`)";

    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful

    if($result)
    {
        echo '<script type="text/javascript"> alert("Data Inserted") </script>';
    }
    
    else{
	echo '<script type="text/javascript"> alert("Data Not Inserted") </script>';
        
    }
    
   // mysqli_free_result($result);
   echo "<script>window.open('index.html ','_self')</script>";
  
    mysqli_close($connect);
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>StudentLiasion</title>
  
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
<!--<h1 align="cen4ter" style="font-size:50px">Faculty Registration </h1>-->
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Student Registration </h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form action="student_register.php" method="POST">
         <div class="input_field"> 
            <input id="cno" type="text" name="cno" placeholder="C Number" required />
          </div>
          <div class="input_field"> 
            <input id="email" type="email" name="email" placeholder="Email" required />
          </div>
          <div class="input_field"> 
            <input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" required />
          </div>
		   <div class="row clearfix">
            <div class="col_three">
             	<div class="input_field"> 
                <input type="text" name="fname" placeholder="First Name" required />
              </div>
            </div>
            <div class="col_three">
              <div class="input_field"> 
                <input type="text" name="mname" placeholder="Middle Name"  />
              </div>
            </div>
			 <div class="col_three">
              <div class="input_field"> 
                <input type="text" name="lname" placeholder="Last Name" required />
              </div>
            </div>
          </div>
		     <div class="input_field">
            <input type="text" name="year" placeholder="year" required/>
          </div>
		    
            
             <div class="input_field">
            <input type="tel" id="phone" name="contactno" placeholder="Contact No" pattern="[0-9]{10}" title="Contact No should in number format and 10 numbers" required/>
            <!-- <input type="tel" name="c_no" placeholder="Contact No" required/> -->
          </div>
           
		  
          <input class="button" type="submit" name="register" value="Register" />
        </form>
      </div>
    </div>
  </div>
</div>
<p class="credit">Already have a account? <a href="login_student.php" target="_blank">Log In</a></p>
<!-- partial -->
  <script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>
</body>
</html>

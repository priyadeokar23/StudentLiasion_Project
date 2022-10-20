
<?php
$insert=false;
if(isset($_POST['add'])){
session_start();

//$cno = $_SESSION['cno'];
$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "studentdata";
    $conn = new mysqli($hostname, $username, $password, $databaseName);
// php code to Insert data into mysql database from input text
//if(isset($_POST['add']))

    // $hostname = "localhost";
    // $username = "root";
    // $password = "";
    // $databaseName = "studentdata";
    
    // get values form input text and number
    //$eventid = $_SESSION['eventid'];
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $cno=$_POST['cno'];
    $event_name = $_POST['eventname'];
    $event_type = $_POST['eventtype'];
    $organizer = $_POST['organizer'];
    $location = $_POST['location'];
    $level = $_POST['level'];
    $date = $_POST['dateofevent'];
    $participation_status = $_POST['participation_status'];
    $state=$_POST['state'];
    $college=$_POST['college'];
    
	
	
	$dir = "Events/".$cno;
	
	if( is_dir($dir) === false )
	{
		mkdir($dir);
	}
	
	$dir2 = $dir."/Extracurricular";
	
		if( is_dir($dir2) === false )
		{
			mkdir($dir2);
		}

     $pdf_temp = $_FILES['pdf_file']['tmp_name'];
     $pdf = $_FILES['pdf_file']['name'];
     $uploads_dir = $dir2.'/'.$pdf;
     move_uploaded_file($pdf_temp, $uploads_dir); 

    // connect to mysql database using mysqli

    // $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    //echo 'connection successfull';
    // mysql query to insert data

    $query = "INSERT INTO `extracurricular`(cno,event_name,event_type,organizer,location,level,date,participation_status,state,college) VALUES ('$cno','$event_name','$event_type','$organizer','$location', '$level','$date','$participation_status','$state','$college')";
    
    //$result = mysqli_query($connect,$query);
    
    // check if mysql query successful
    //if($result)
    if($conn->query($query) == true)
    {
        echo '<script type="text/javascript"> alert("Data Inserted") </script>';
        $insert = true;
      }
    
    else{
      echo "ERROR: $query <br> $conn->error";
	    echo '<script type="text/javascript"> alert("Data Not Inserted") </script>';
        
    }
    //echo "<script>window.open('student_dashboard.php ','_self')</script>";
   // mysqli_free_result($result);
    //mysqli_close($connect);
    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> extra curricular activity Form</title>
  <link rel="stylesheet" href="style.css">

</head>
<body >
<!-- partial:index.partial.html -->

<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Add extra curricular Activity Details </h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form action="extracurricular.php" method="POST" enctype="multipart/form-data" >

        <div class="input_field"> 
            <input type="text" name="cno" placeholder="C Number: " />
         </div>
       

          <div class="row clearfix">
                      <div class="col_half">
                        <div class="input_field select_option">
                        <label> Event Type: </label><br>
                       <select name="eventtype">
                      <option > --SELECT--</option>
                       <option > sports</option>
                       <option > cultural </option>
                       <option > others </option>
                      </select>


                          
                          <div class="select_arrow"></div>
                        </div>
                      </div>
          </div>


          <div class="input_field"> 
            <input type="text" name="eventname" placeholder=" Event name " required />
          </div>
       		
		      <div class="input_field"> 
            <input type="text" name="organizer" placeholder="Organiser" required />
          </div>
          <div class="input_field"> 
                <input type="text" name="location" placeholder="location" required />
          </div>
		      <div class="date_field select_option"> 
			  	  <label for="doc1">Date Of event:</label>
                 <input type="date" name="dateofevent"  id="doc1"  required/>
          </div>

           <div class="row clearfix">
            <div class="col_half">
             	 <div class="input_field select_option">
                  <label>Participation status: </label><br>
                  <select name="participation_status">
                      <option > --SELECT--</option>
                      <option >   Winners(Gold) </option>
                      <option > First runners up(silver) </option>
                      <option > Second runners up(bronse) </option>
                      <option > Participated </option>
                  </select>
               <div class="select_arrow"></div>
                 </div>
              </div>
          </div>
		    
          <div class="row clearfix">
            <div class="col_half">
             	 <div class="input_field select_option">
                <label>  Level: </label><br>
                <select name="level">
                <option > --SELECT--</option>
                <option >  International </option>
                <option > National </option>
               <option > State </option>
               <option > Zonal </option>
                <option > University </option>
                <option > Institute </option>
              </select>

                  <div class="select_arrow"></div>
                </div>
              </div>
          </div>

          <div class="row clearfix">
            <div class="col_half">
             	 <div class="input_field select_option">
                <label>  Organized: </label><br>
                <select name="state">
                <option > --SELECT--</option>
                <option >  Within State(Maharashtra) </option>
                <option > Outside State </option>
              </select>
                  <div class="select_arrow"></div>
                </div>
              </div>

              <div class="col_half">
             	 <div class="input_field select_option">
                <label>  Organized By: </label><br>
                <select name="college">
                <option > --SELECT--</option>
                <option > ccoew </option>
                <option > others </option>
              </select>
                  <div class="select_arrow"></div>
                </div>
              </div>
          </div>


      <div class="input_field select_option"> 
				   <lable for="pdf" >File :</lable>
                <input id="pdf" type="file" name= "pdf_file" >
       </div>
       	
          <input class="button" type="submit" name="add" value="Add" />
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




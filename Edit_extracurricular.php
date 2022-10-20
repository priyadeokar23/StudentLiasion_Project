
<?php
session_start();
error_reporting(0);
$event_id = $_GET['event_id'];

	$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "studentdata";
    
   
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    

	
$query = "SELECT * FROM extracurricular WHERE event_id  = '$event_id'";

$result = mysqli_query($connect,$query);

while ($row_pro = mysqli_fetch_array($result)) {
		$event_id = $row_pro['event_id'];
		$cno = $row_pro['cno'];
		$event_name = $row_pro['event_name'];
		$event_type = $row_pro['event_type'];
		$organizer = $row_pro['organizer'];
		$location = $row_pro['location'];
		$level = $row_pro['level'];
		$date = $row_pro['date'];
		$participation_status = $row_pro['participation_status'];
		$certificate = $row_pro['certificate'];
		$state = $row_pro['state'];
		$college = $row_pro['college'];
    }
 
?>

<?php
// php code to Insert data into mysql database from input text
if(isset($_POST['add']))
{
	
    // get values form input text and number

    $cno=$_POST['cno'];
    $event_name = $_POST['eventname'];
    $event_type = $_POST['eventtype'];
    $organizer = $_POST['organizer'];
    $location = $_POST['location'];
    $level = $_POST['level'];
    $date = $_POST['dateofevent'];
    $participation_status = $_POST['participationstatus'];
    $state=$_POST['state'];
    $college=$_POST['college'];

     $pdf_temp = $_FILES['pdf_file']['tmp_name'];
	 
	 if($pdf_temp != null)
	 {
		 $dir = "Events/".$cno;
	
		if( is_dir($dir) === false )
		{
			mkdir($dir);
		}
		
		$dir2 = $dir."/Extarcurricular";
	
		if( is_dir($dir2) === false )
		{
			mkdir($dir2);
		}
		
		$pdf = $_FILES['pdf_file']['name'];
		$uploads_dir = $dir2.'/'.$pdf;
		move_uploaded_file($pdf_temp, $uploads_dir); 
		 
		$query = "UPDATE `extracurricular` SET file = '$pdf' WHERE event_id = '$event_id'";
    
		$result = mysqli_query($connect,$query);
		if($result)
		{
			echo '<script type="text/javascript"> alert("File Uploaded") </script>';
		}
    
		else{
			echo '<script type="text/javascript"> alert("File Not Uploaded") </script>';
        
		}
    
	 }

    
    // mysql query to insert data

    $query = "UPDATE `extracurricular` SET cno = '$cno', event_name = '$event_name' , event_type = '$event_type' , organizer = '$organizer', location = '$location', level = '$level', date = '$date', participation_status = '$participation_status', certificate = '$certificate',state= '$state',college = '$college' WHERE event_id = '$event_id'";
    
    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful
    if($result)
    {
        echo '<script type="text/javascript"> alert("Data Edited") </script>';
    }
    
    else{
		echo '<script type="text/javascript"> alert("Data Not Edited") </script>';
        
    }
    echo "<script>window.open('student_dashboard.php','_self')</script>";
   // mysqli_free_result($result);
    mysqli_close($connect);
}

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Edit Extarcurricular form</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body >
<!-- partial:index.partial.html -->

<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>EDIT Extarcurricular Events Details </h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form action="extracurricular.php" method="POST" enctype="multipart/form-data" >

        <div class="input_field"> 
            <input type="text" name="cno" value = "<?php echo "$cno" ?>" placeholder="C Number: " />
         </div>
       

          <div class="row clearfix">
                      <div class="col_half">
                        <div class="input_field select_option">
                        <label> Event Type: </label><br>
                       <select name="eventtype">
                      <option <?php if($eventtype== "--SELECT--"){ echo 'selected'; } ?>>--SELECTED--</option>
                      <option <?php if($eventtype== "sports"){ echo 'selected'; } ?>>sports</option>
                      <option <?php if($eventtype== "cultural"){ echo 'selected'; } ?>>cultural</option>
                      <option <?php if($eventtype== "others"){ echo 'selected'; } ?>>others</option>
                     </select>
                          <div class="select_arrow"></div>
                        </div>
                      </div>
          </div>


          <div class="input_field"> 
            <input type="text" name="eventname"  placeholder=" Event name " value = "<?php echo "$event_name" ?>"required />
          </div>
       		
		      <div class="input_field"> 
            <input type="text" name="organizer" placeholder="Organiser" value = "<?php echo "$organizer" ?>" required />
          </div>
          <div class="input_field"> 
                <input type="text" name="location" placeholder="location" value = "<?php echo "$location" ?>" required />
          </div>
		      <div class="date_field select_option"> 
			  	  <label for="doc1">Date Of event:</label>
                 <input type="date" name="dateofevent"  id="doc1" value = "<?php echo "$date" ?>" required/>
          </div>

           <div class="row clearfix">
            <div class="col_half">
             	 <div class="input_field select_option">
                  <label>Participation status: </label><br>
                  <select name="participationstatus">
                  <option <?php if($participationstatus== "--SELECT--"){ echo 'selected'; } ?>>--SELECT--</option>
                  <option <?php if($participationstatus== "Winners(Gold)"){ echo 'selected'; } ?>>Winners(Gold)</option>
                  <option <?php if($participationstatus== "First runners up(silver)"){ echo 'selected'; } ?>>First runners up(silver)</option>
                  <option <?php if($participationstatus== "Second runners up(bronze)"){ echo 'selected'; } ?>>Second runners up(bronze)</option>
                  <option <?php if($participationstatus== "Participated"){ echo 'selected'; } ?>>Participated</option>

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
                <option <?php if($level== "--SELECT--"){ echo 'selected'; } ?>>--SELECTED--</option>
                      <option <?php if($level== "Internationl"){ echo 'selected'; } ?>>Internationl</option>
                      <option <?php if($level== "National"){ echo 'selected'; } ?>>National</option>
                      <option <?php if($level== "State"){ echo 'selected'; } ?>>State</option>
                      <option <?php if($level== "Zonal"){ echo 'selected'; } ?>>Zonal</option>
                      <option <?php if($level== "University"){ echo 'selected'; } ?>>University</option>
                      <option <?php if($level== "Institute"){ echo 'selected'; } ?>>Institute</option>

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
                <option <?php if($state== "--SELECT--"){ echo 'selected'; } ?>>--SELECT--</option>
                 <option <?php if($state== "Within State(Maharashtra)"){ echo 'selected'; } ?>>Within State(Maharashtra)</option>
                 <option <?php if($state== "Outside State"){ echo 'selected'; } ?>>Within State(Maharashtra)</option>

              </select>
                  <div class="select_arrow"></div>
                </div>
              </div>

              <div class="col_half">
             	 <div class="input_field select_option">
                <label>  Organized By: </label><br>
                <select name="college">
                <option <?php if($college== "--SELECT--"){ echo 'selected'; } ?>>--SELECT--</option>
                <option <?php if($college== "College"){ echo 'selected'; } ?>>College</option>

              </select>
                  <div class="select_arrow"></div>
                </div>
              </div>
          </div>


      <div class="input_field select_option"> 
        (Change Or Upload new file)
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




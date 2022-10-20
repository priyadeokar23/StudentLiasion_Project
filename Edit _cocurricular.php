
<?php
session_start();
$event_id = $_GET['eventid'];

	$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "studentdata";
    
   
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    

	
$query = "SELECT * FROM cocurricular WHERE eventid  = '$eventid'";

$result = mysqli_query($connect,$query);

while ($row_pro = mysqli_fetch_array($result)) {
		$eventid = $row_pro['eventid'];
		$cno = $row_pro['cno'];
		$event_name = $row_pro['event_name'];
		$event_type = $row_pro['event_type'];
		$organizer = $row_pro['organizer'];
		$event_location = $row_pro['event_location'];
		$event_level = $row_pro['event_level'];
		$event_date = $row_pro['event_date'];
		$participation_status = $row_pro['participation_status'];
        $amount = $row_pro['amount'];
        $topic = $row_pro['topic'];
        $patent_name = $row_pro['patent_name'];
        $patent_id = $row_pro['patent_id'];
        $patent_type = $row_pro['patent_type'];
        $proof = $row_pro['proof'];
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
    $event_type = $_POST['Eventtype'];
    $organizer = $_POST['organizer'];
    $event_location = $_POST['location'];
    $event_level = $_POST['level'];
    $event_date = $_POST['dateofevent'];
    $participation_status = $_POST['Participationstatus'];
    $amount = $_POST['amt'];
    $topic = $_POST['topic'];
    $patent_name = $_POST['pname'];
    $patent_id = $_POST['pid'];
    $patent_type = $_POST['ptype'];

     $pdf_temp = $_FILES['pdf_file']['tmp_name'];
	 
	 if($pdf_temp != null)
	 {
		 $dir = "Events/".$cno;
	
		if( is_dir($dir) === false )
		{
			mkdir($dir);
		}
		
		$dir2 = $dir."/Cocurricular";
	
		if( is_dir($dir2) === false )
		{
			mkdir($dir2);
		}
		
		$pdf = $_FILES['pdf_file']['name'];
		$uploads_dir = $dir2.'/'.$pdf;
		move_uploaded_file($pdf_temp, $uploads_dir); 
		 
		$query = "UPDATE `cocurricular` SET file = '$pdf' WHERE event_id = '$event_id'";
    
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

    $query = "UPDATE `cocurricular` SET cno = '$cno', event_name = '$event_name' , event_type = '$event_type' , organizer = '$organizer', event_location = '$event_location', event_level = '$event_level', event_ = '$event_date', participation_status = '$participationstatus', state = '$state', college = '$college' WHERE event_id = '$event_id'";
    
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
  <title>Co curricular activity Form</title>
  <link rel="stylesheet" href="style.css">

</head>
<body >
<!-- partial:index.partial.html -->

<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Add Co curricular Activity Details </h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form action="cocurricular.php" method="POST" enctype="multipart/form-data" >
       

        <div class="input_field"> 
            <input type="text" name="cno" placeholder="C Number: " />
         </div>

          <div class="row clearfix">
                      <div class="col_half">
                        <div class="input_field select_option">
                            <label>Event Type: </label><br>
                            <select name="Eventtype">
                              <option > --SELECT--</option>
                              <option>  Scholarship </option>
                              <option> awards/special achievements </option>
                              <option> paper presentation and publications </option>
                              <option> project competitions </option>
                              <option> coding and quiz competitions </option>
                              <option> workshops /webinars/seminars </option>
                              <option> online courses</option>
                              <option> others </option>
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
                  <select name="Participationstatus">
                      <option> --SELECT--</option>
                      <option>   Winners(Gold) </option>
                      <option> First runners up(silver) </option>
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
                  <label>Level: </label><br>
                <select name="level">
                    <option > --SELECT--</option>
                    <option >  International </option>
                    <option > National </option>
                    <option > State </option>
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
                <option > College </option>
                <option > others </option>
              </select>
                  <div class="select_arrow"></div>
                </div>
              </div>
          </div>

          

		   <div class="row clearfix">
            <div class="col_half">
             	 <div class="input_field select_option">
                <select name="status">
                  <option>Status</option>
                  <option>Published</option>
                  <option>Presented</option>
                </select>
                <div class="select_arrow"></div>
              </div>
            </div>
</div>

        <div class="input_field"> 
            <input type="text" name="amt" placeholder="Amount(Scholarship,Prize) " />
         </div>
       		
		   <div class="input_field"> 
            <input type="text" name="topic" placeholder="Topic Name" />
          </div>

		   <div class="input_field"> 
            <input type="text" name="pname" placeholder="Patent name" />
       </div>

        <div class="input_field"> 
            <input type="text" name="pid" placeholder=" Patent ID " />
        </div>
       		
		   <div class="input_field"> 
            <input type="text" name="ptype" placeholder="Patent Type"  />
      </div>
		   
      <div class="input_field select_option"> 
				   <lable for="pdf" >Certificate :</lable>
                <input id="pdf" type="file" name= "proof" >
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


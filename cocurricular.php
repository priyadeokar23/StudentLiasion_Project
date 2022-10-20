

 <?php

//session_start();
$insert=false;
if(isset($_POST['add'])){
//session_start();


$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "studentdata";
    //$conn = new mysqli($hostname, $username, $password, $databaseName);

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);


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
    $state = $_POST['state'];
    $college = $_POST['college'];
	
	
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
    //echo "<script>console.log('Debug Objects: ');</script>";
     $pdf_temp = $_FILES['pdf_file']['tmp_name'];
     $pdf = $_FILES['pdf_file']['name'];
     $uploads_dir = $dir2.'/'.$pdf;
     move_uploaded_file($pdf_temp, $uploads_dir); 

  

    $sql = "INSERT INTO `cocurricular`(cno,event_name,event_type,organizer,event_location,event_level,event_date,participation_status,amount,topic,patent_name,patent_id,patent_type) VALUES ('$cno','$event_name','$event_type','$organizer','$event_location', '$event_level','$event_date','$participation_status', '$amount','$topic', '$patent_name', '$patent_id', '$patent_type')";
    $result = mysqli_query($connect,$sql);
    if($result)
    {
        echo '<script type="text/javascript"> alert("Data Inserted") </script>';
        $insert = true;
      }
    
    else{
      //echo "ERROR: $query <br> $conn->error";
	    echo '<script type="text/javascript"> alert("Data Not Inserted") </script>';
        
    }
    
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
                <option > ccoew </option>
                <option > others </option>
              </select>
                  <div class="select_arrow"></div>
                </div>
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




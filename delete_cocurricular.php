<?php 
    $paperID = $_GET['eventid'];

	$hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "studentdata";
    
   
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    

	
$query = "DELETE FROM cocurricular WHERE eventid  = '$eventid';";

$result = mysqli_query($connect,$query);
   
   if($result)
    {
        echo '<script type="text/javascript"> alert("Data Deleted") </script>';
    }
    
    else{
	echo '<script type="text/javascript"> alert("Data Not Deleted") </script>';
        
    }
    
	echo "<script>window.open('student_dashboard.php ','_self')</script>";
   // mysqli_free_result($result);
    mysqli_close($connect);

?>

<?php 
error_reporting(0);
session_start();

$state = $_SESSION['state'];

if(isset($_POST['download_con']))
{
	
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$databaseName = "studentdata";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// Headers for download 
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=Statewise_cocurricular.csv"); 
header("Content-Type: application/csv;"); 

$file = fopen('php://output', 'w');
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
//$fileName = "Conference_paper.xlsx"; 
 
// Column names 

$fields = array('Event Name', 'Organizer','Level', 'Event location','Date of Event','Participation Status','Amount','Topic','Patent id','Patent Name','Patent Type','Proof'); 
 
 fputcsv($file, $fields);
// Display column names as first row 
//$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Get records from the database 
$sql1 = "SELECT * FROM cocurricular WHERE state LIKE '%".$state."%' ORDER BY cno;";
$CoEvents = $connect->query($sql1);
            	    	            	    	            	    	           	                	    
if($CoEvents->num_rows > 0){ 
	// Output each row of the data 
   while($row = $CoEvents->fetch_assoc()){ 
		 $rowData = array($row['event_name'], $row['organizer'], $row['event_level'], $row['event_location'], $row['event_date'], $row['participation_status'], $row['amount'], $row['topic'],$row['patent_id'],$row['patent_name'],$row['patent_type'],$row['proof']); 
		array_walk($rowData, 'filterData'); 
		fputcsv($file, $rowData);
	} 
		}else{ 
			//$excelData .= 'No records found...'. "\n"; 
			 
		} 

// Render excel data 
//echo $excelData; 
fclose($file);
exit;

}
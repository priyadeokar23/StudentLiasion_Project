
<?php 
//error_reporting(0);
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
header("Content-Disposition: attachment; filename=Statewise_Extracurricular.csv"); 
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
$fields = array('Event Name', 'Event Type', 'Organizer','Level','Date of Event','Event location','Participation Status','certificate'); 
 
 fputcsv($file, $fields);
// Display column names as first row 
//$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Get records from the database 
$sql1 = "SELECT * FROM extracurricular WHERE state LIKE '%".$state."%' ORDER BY cno;";
$ExtraCuEvents = $connect->query($sql1);            	    

		if($ExtraCuEvents->num_rows > 0){ 
			// Output each row of the data 
		   while($row = $ExtraCuEvents->fetch_assoc()){ 
				 $rowData = array($row['event_name'], $row['event_type'], $row['organizer'], $row['level'], $row['date'], $row['location'], $row['participation_status'], $row['certificate']); 
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
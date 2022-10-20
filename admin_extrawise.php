m<?php 
error_reporting(0);
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "studentdata";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$event_type=null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="style11.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="Admin_dashboard.php"><?=$fname;?> <?=$lname;?></a>
          <a class="navbar-brand brand-logo-mini" href="Admin_dashboard.php"><?=$fname;?> <?=$lname;?></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
           
              <span class="nav-profile-name"><?=$fname;?> <?=$lname;?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
			  <a class="nav-link" href="Admin_update.php">
                <i class="mdi mdi-sync  text-primary"></i>
                Update
              </a>
              <a class="dropdown-item">
			  <a class="nav-link" href="logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="Admin_dashboard.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">All Event Details</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin_statewise.php">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">State Wise </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin_datewise.php">
              <i class="mdi mdi-calendar menu-icon"></i>
              <span class="menu-title">Date Wise</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin_collegewise.php">
              <i class="mdi mdi-seal menu-icon"></i>
              <span class="menu-title">College Wise</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Admin_winnerwise.php">
              <i class="mdi mdi-seal menu-icon"></i>
              <span class="menu-title">Winner Wise</span>
            </a>
          </li>
	<li class="nav-item">
            <a class="nav-link" href="Admin_cocurricularwise.php">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Cocurricular event Wise </span>
            </a>
          </li>
	<li class="nav-item">
            <a class="nav-link" href="Admin_extrawise.php">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Extra curricular event Wise </span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body" >
                <h4 class="card-title">Extra Curricular Event wise Search</h4>
                <form class="form-inline" >
                  <label class="menu-title" for="inlineFormInputGroupUsername2">College wise </label>
                  <div class="input-group mb-2 mr-sm-2">
                    <select name="event_type" class="form-control">
                     <option > --SELECT--</option>
                       <option > sports</option>
                       <option > cultural </option>
                       <option > others </option>
                    </select>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary mb-2" style="margin-right: 427px;">Submit</button>
                  
                </form>
                
              </div>
            </div>
          </div>
         
		
		
         <form action="" method="POST">
          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Extra curricular Event Details</p>
				  <div class="align-items-end ">
                    <button type="submit" name="download_con" class="btn btn-primary mt-2 mt-xl-0" style="margin-right: 50px;">Download report</button>
                  </div>
		          <div class="table-responsive">
                    <table id="recent-purchases-listing-2" class="table">
                      <thead>
                        <tr>
							
                            <th>Event Name</th>
                            <th>Event Type </th>
                            <th>Organizer </th>
                            <th>Location </th>
                            <th>Level </th>
                            <th>Date </th>
                            <th>Paricipation status </th>
                            <th>state </th>
                            <th>college </th>
                            <th>proof </th>
                            
							
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
					   if(isset($_GET['submit']))
						{
							$event_type = $_GET['event_type'];
								
							$sql1 = "SELECT * FROM extracurricular WHERE event_type LIKE '%".$event_type."%' ORDER BY cno;";
							$ExtraCuEvents = $connect->query($sql1);
            	    	
							if ($ExtraCuEvents->num_rows <= 0) {
							}
							else {

							while($ExtraCuEvent = $ExtraCuEvents->fetch_assoc()):?>
                        <tr>
						
                            <td ><?=$ExtraCuEvent['event_name'];?></td>
                            <td><?=$ExtraCuEvent['event_type'];?></td>
                            <td><?=$ExtraCuEvent['organizer'];?></td>
                            <td><?=$ExtraCuEvent['location'];?></td>
                            <td><?=$ExtraCuEvent['level'];?></td>
                            <td><?=$ExtraCuEvent['date'];?></td>
                            <td><?=$ExtraCuEvent['participation_status'];?></td>
							<td><?=$ExtraCuEvent['college'];?></td>
                            <td><?=$ExtraCuEvent['state'];?></td>
                            <td><?=$ExtraCuEvent['certificate'];?></td>
  			
                        </tr>
                        <div class="content-wrapper">
						<?php endwhile;}}
						$_SESSION['event_type'] = $event_type;
						?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
	    </div>
      </form>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <p>&nbsp;</p>
         
      </footer>
        <!-- partial -->
    </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>



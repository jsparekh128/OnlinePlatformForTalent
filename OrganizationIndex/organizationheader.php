<?php
require("config.php");

if(session_status()==PHP_SESSION_NONE)
{
  session_start();

}
 if(isset($_SESSION['OrganizationId']))
  {
    $morgid=$_SESSION['OrganizationId'];
    $sql="Select * from organizationdetail where OrganizationId=$morgid";
    $cmd=mysqli_query($con,$sql);
    $rows=mysqli_fetch_array($cmd);
  }
  else
  {
    header("Location: ologin.php");
  }


?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Organization Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="css/fullcalendar/fullcalendar.min.css" />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a  href="organizationdashboard.php">
          <img src="../assets/images/fortelogo.png"  alt="logo" height="50px" width="50px"/>

        </a>
       
      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center">
        <div style="margin-left:700px">
        </div>
      <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text" style="color:yellow">Hello, <?php echo $rows['OrganizationName']; ?> !</span>
              <img class="img-xs rounded-circle" src="<?php echo $rows['OrganizationImage'];?>" height="40px" width="40px">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            

              <a class="dropdown-item" href="logout.php">
                <i class="fa fa-sign-out text-danger "></i>&nbsp;&nbsp;&nbsp;Sign Out
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
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo $rows['OrganizationImage'];?>" alt="" height="50px" width="50px">
                </div>
                <br/>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $rows['OrganizationName']; ?></p>
                  <div>
                    <small class="designation text-muted">Online</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>

			  </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="organizationdashboard.php">
              <i class="fa fa-dashboard text-dark icon-md"></i>
              <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</span>
            </a>
          </li>

         
          <li class="nav-item">
            <a class="nav-link" href="organizationprofile.php">
              <i class="fa fa-user text-dark icon-md"></i>
              <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profile</span>
            </a>
          </li>

		
          <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#uigallery" aria-expanded="false" aria-controls="ui-basic">
                      <i class="fa fa-picture-o text-dark icon-md"></i>
                      <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Events</span>
                      <i class="menu-arrow"></i>
                    </a>
            <div class="collapse" id="uigallery">
                      <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="addevent.php">
                        <i class="fa fa-plus-square"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Add Events</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="viewevent.php">
                        <i class="fa fa-edit"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Events</a>
                      </li>
                    </ul>
            </div>
          </li>


          <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#uiparticipants" aria-expanded="false" aria-controls="ui-basic">
                      <i class="fa fa-envelope-o text-dark icon-md"></i>
                      <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Events Participation</span>
                      <i class="menu-arrow"></i>
                    </a>
            <div class="collapse" id="uiparticipants">
                      <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="selectparticipant.php">
                        <i class="fa fa-plus-square"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        See Pariticipants</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="vieweventwinner.php">
                        <i class="fa fa-eye"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;See Winners</a>
                      </li>
                    </ul>
            </div>
          </li>

          
			          
        </ul>
      </nav>

	   <!-- partial -->
    <div class="main-panel">
  <div class="content-wrapper">
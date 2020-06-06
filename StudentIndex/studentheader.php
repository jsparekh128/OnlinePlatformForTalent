<?php
require("config.php");

if(session_status()==PHP_SESSION_NONE)
{
  session_start();

}
 if(isset($_SESSION['StudId']))
  {
    $mstudid=$_SESSION['StudId'];
    $sql="Select * from studentdetail where StudentId=$mstudid";
    $cmd=mysqli_query($con,$sql);
    $rows=mysqli_fetch_array($cmd);
  }
  else
  {
    header("Location: slogin.php");
  }


?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="css/fullcalendar/fullcalendar.min.css" />
  <link href="../assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">



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
        <a  href="studentdashboard.php">
          <img src="../assets/images/fortelogo.png"  alt="logo" height="50px" width="50px"/>

        </a>
       
      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center">
        <div style="margin-left:800px">
        </div>
      <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text" style="color:yellow">Hello, <?php echo $rows['StudentName']; ?> !</span>
              <img class="img-xs rounded-circle" src="<?php echo $rows['ProfileImage'];?>" height="40px" width="40px">
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
                  <img src="<?php echo $rows['ProfileImage'];?>" alt="" height="50px" width="50px">
                </div>
                <br/>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $rows['StudentName']; ?></p>
                  <div>
                    <small class="designation text-muted">Online</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>

			  </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="studentdashboard.php">
              <i class="fa fa-dashboard text-dark icon-md"></i>
              <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</span>
            </a>
          </li>

         
          <li class="nav-item">
            <a class="nav-link" href="studentprofile.php">
              <i class="fa fa-user text-dark icon-md"></i>
              <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profile</span>
            </a>
          </li>

		
          <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#uigallery" aria-expanded="false" aria-controls="ui-basic">
                      <i class="fa fa-picture-o text-dark icon-md"></i>
                      <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gallery</span>
                      <i class="menu-arrow"></i>
                    </a>
            <div class="collapse" id="uigallery">
                      <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="addstudentgallery.php">
                        <i class="fa fa-plus-square"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Add Images/Videos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="viewstudentgallery.php">
                        <i class="fa fa-edit"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Image</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="viewvideogallery.php">
                        <i class="fa fa-edit"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Videos</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="deletestudentgallery.php">
                        <i class="fa fa-edit"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete Files</a>
                      </li>

                    </ul>
            </div>
          </li>


          <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#uievents" aria-expanded="false" aria-controls="ui-basic">
                      <i class="fa fa-envelope-o text-dark icon-md"></i>
                      <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Events</span>
                      <i class="menu-arrow"></i>
                    </a>
            <div class="collapse" id="uievents">
                      <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="viewstudentevent.php">
                        <i class="fa fa-plus-square"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Participate in Events</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="uploadstudentparticipation.php">
                        <i class="fa fa-edit"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload for Events</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="viewwinner.php">
                        <i class="fa fa-eye"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;See Results</a>
                      </li>
                  

                    </ul>
            </div>
          </li>


			          
        </ul>
      </nav>

	   <!-- partial -->
    <div class="main-panel">
  <div class="content-wrapper">
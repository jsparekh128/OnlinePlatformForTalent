<?php
require("config.php");
$cmd1=mysqli_query($con,"SELECT count(EventId) from events");
$res1=mysqli_fetch_array($cmd1);
$tevent=$res1[0];

$cmd2=mysqli_query($con,"SELECT count(CompetitionMasterId) from competitionmaster");
$res2=mysqli_fetch_array($cmd2);
$tmedia=$res2[0];

$cmd3=mysqli_query($con,"SELECT count(StudentId) from studentdetail");
$res3=mysqli_fetch_array($cmd3);
$tstud=$res3[0];

$cmd4=mysqli_query($con,"SELECT count(OrganizationId) from organizationdetail");
$res4=mysqli_fetch_array($cmd4);
$torg=$res4[0];

$cmd5=mysqli_query($con,"SELECT count(StudentId) from studentdetail where isActive=0");
$res5=mysqli_fetch_array($cmd5);
$tstudactive=$res5[0];

 ?>
<!DOCTYPE html>
<html lang="en">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <link href="assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />


    </head>
    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container -->
                    <div class="logo">
                        
                        <a href="adminindex.php">
                            <img src="assets/images/fortelogo.png" alt="FORTE" class="logo-medium" height="50" width="50">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="float-right list-unstyled mb-0 ">
                            
                            <li class="dropdown notification-list d-none d-sm-block">
                                <form role="search" class="app-search">
                                    <div class="form-group mb-0"> 
                                        <input type="text" class="form-control" placeholder="Search..">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form> 
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="ti-bell noti-icon"></i>
                                    <span class="badge badge-pill badge-danger noti-icon-badge"><?php echo $tstudactive;?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                    <!-- item-->
                                    <h6 class="dropdown-item-text">
                                        Notifications 
                                    </h6>
                                    <div class="slimscroll notification-item-list">
                                     Item
                                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                             <p class="notify-details">New Student SignIn<span class="text-muted"><?php echo $tstudactive;?> Student are pending to verify</span></p>
                                        </a>
                                    
                                     
                                   
                                </div>       
                            </li>
                            <li class="dropdown notification-list">
                                <div class="dropdown notification-list nav-pro-img">
                                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="assets/images/users/profile.png" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <!--<a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5"></i> My Wallet</a>
                                        <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings m-r-5"></i> Settings</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5"></i> Lock screen</a>
                                        <div class="dropdown-divider"></div>-->
                                        <a class="dropdown-item text-danger" href="logout.php"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                    </div>                                                                    
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    Welcome to Admin Dashboard
                                </li>
                            </ol>
                        
                        </div>
                    </div>
                </div>
            </div>

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="adminindex.php">
                                    <i class="ti-dashboard"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                          

                            <li class="has-submenu">
                                <a href="#"><i class="ti-home"></i>Organisations</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="OrganizationIndex/orgsignup.php">Add</a></li>  
                                            <li><a href="vieworganization.php">View</a></li>
                                            
                                        </ul>
                                    </li>
                                   
                                   
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="ti-eye"></i>Student</a>
                                <ul class="submenu">
                                    <li><a href="StudentIndex/SignUp.php">Add</a></li>
                                    <li><a href="viewstudent.php">View</a></li>
                                   
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="ti-menu"></i>Category</a>
								<ul class="submenu">
                                    <li><a href="addcategory.php">Add</a></li>
                                    <li><a href="viewcategory.php">View</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="ti-menu-alt"></i>Sub-Category</a>
								<ul class="submenu">
                                    <li><a href="addsubcategory.php">Add</a></li>
                                    <li><a href="viewsubcategory.php">View</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="ti-gallery"></i>Events</a>
								<ul class="submenu">
                                    <li><a href="viewevent.php">View</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="ti-medall"></i>Winners</a>
								<ul class="submenu">
                                    <li><a href="viewalleventwinner.php">View</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="ti-email"></i>Contact Query</a>
								<ul class="submenu">
                                    <li><a href="viewquery.php">View</a></li>
                                </ul>
                            </li>


                        <!-- End navigation menu -->
                    </div> <!-- end navigation -->
                </div> <!-- end container-fluid -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

        <div class="wrapper">
           
<!--
                <div class="row">

                    <div class="col-xl-3">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Monthly Earnings</h4>

                                <div class="row text-center m-t-20">
                                    <div class="col-6">
                                        <h5 class="">$56241</h5>
                                        <p class="text-muted ">Marketplace</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="">$23651</h5>
                                        <p class="text-muted ">Total Income</p>
                                    </div>
                                </div>

                                <div id="morris-donut-example" class="dashboard-charts morris-charts"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Email Sent</h4>

                                <div class="row text-center m-t-20">
                                    <div class="col-4">
                                        <h5 class="">$ 89425</h5>
                                        <p class="text-muted ">Marketplace</p>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="">$ 56210</h5>
                                        <p class="text-muted ">Total Income</p>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="">$ 8974</h5>
                                        <p class="text-muted ">Last Month</p>
                                    </div>
                                </div>

                                <div id="morris-area-example" class="dashboard-charts morris-charts"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Monthly Earnings</h4>

                                <div class="row text-center m-t-20">
                                    <div class="col-6">
                                        <h5 class="">$ 2548</h5>
                                        <p class="text-muted ">Marketplace</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="">$ 6985</h5>
                                        <p class="text-muted ">Total Income</p>
                                    </div>
                                </div>

                                <div id="morris-bar-stacked" class="dashboard-charts morris-charts"></div>
                            </div>
                        </div>
                    </div>

                </div>
               end row -->
<!--
                <div class="row">
                    
                    <div class="col-xl-4 col-lg-6">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-3">Inbox</h4>
                                <div class="inbox-wid">
                                    <a href="#" class="text-dark">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-1.jpg" class="thumb-md rounded-circle" alt=""></div>
                                            <h6 class="inbox-item-author mt-0 mb-1">Misty</h6>
                                            <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                                            <p class="inbox-item-date text-muted">13:40 PM</p>
                                        </div>
                                    </a>
                                    <a href="#" class="text-dark">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-2.jpg" class="thumb-md rounded-circle" alt=""></div>
                                            <h6 class="inbox-item-author mt-0 mb-1">Melissa</h6>
                                            <p class="inbox-item-text text-muted mb-0">I've finished it! See you so...</p>
                                            <p class="inbox-item-date text-muted">13:34 PM</p>
                                        </div>
                                    </a>
                                    <a href="#" class="text-dark">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-3.jpg" class="thumb-md rounded-circle" alt=""></div>
                                            <h6 class="inbox-item-author mt-0 mb-1">Dwayne</h6>
                                            <p class="inbox-item-text text-muted mb-0">This theme is awesome!</p>
                                            <p class="inbox-item-date text-muted">13:17 PM</p>
                                        </div>
                                    </a>
                                    <a href="#" class="text-dark">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-4.jpg" class="thumb-md rounded-circle" alt=""></div>
                                            <h6 class="inbox-item-author mt-0 mb-1">Martin</h6>
                                            <p class="inbox-item-text text-muted mb-0">Nice to meet you</p>
                                            <p class="inbox-item-date text-muted">12:20 PM</p>
                                        </div>
                                    </a>
                                    <a href="#" class="text-dark">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-5.jpg" class="thumb-md rounded-circle" alt=""></div>
                                            <h6 class="inbox-item-author mt-0 mb-1">Vincent</h6>
                                            <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                                            <p class="inbox-item-date text-muted">11:47 AM</p>
                                        </div>
                                    </a>

                                    <a href="#" class="text-dark">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img float-left mr-3"><img src="assets/images/users/user-6.jpg" class="thumb-md rounded-circle" alt=""></div>
                                            <h6 class="inbox-item-author mt-0 mb-1">Robert Chappa</h6>
                                            <p class="inbox-item-text text-muted mb-0">Hey! there I'm available...</p>
                                            <p class="inbox-item-date text-muted">10:12 AM</p>
                                        </div>
                                    </a>
                                    
                                </div>  
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Recent Activity Feed</h4>

                                <ol class="activity-feed mb-0">
                                    <li class="feed-item">
                                        <div class="feed-item-list">
                                            <span class="date">Jun 25</span>
                                            <span class="activity-text">Responded to need “Volunteer Activities”</span>
                                        </div>
                                    </li>
                                    <li class="feed-item">
                                        <div class="feed-item-list">
                                            <span class="date">Jun 24</span>
                                            <span class="activity-text">Added an interest “Volunteer Activities”</span>
                                        </div>
                                    </li>
                                    <li class="feed-item">
                                        <div class="feed-item-list">
                                            <span class="date">Jun 23</span>
                                            <span class="activity-text">Joined the group “Boardsmanship Forum”</span>
                                        </div>
                                    </li>
                                    <li class="feed-item">
                                        <div class="feed-item-list">
                                            <span class="date">Jun 21</span>
                                            <span class="activity-text">Responded to need “In-Kind Opportunity”</span>
                                        </div>
                                    </li>
                                </ol>

                                <div class="text-center">
                                    <a href="#" class="btn btn-sm btn-primary">Load More</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-4">
                        <div class="card widget-user m-b-20">
                            <div class="widget-user-desc p-4 text-center bg-primary position-relative">
                                <i class="fas fa-quote-left h3 text-white-50"></i>
                                <p class="text-white mb-0">The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe the same vocabulary. The languages only in their grammar.</p>
                            </div>
                            <div class="p-4">
                                <div class="float-left mt-2 mr-3">
                                    <img src="assets/images/users/user-2.jpg" alt="" class="rounded-circle thumb-md">
                                </div>
                                <h6 class="mb-1">Marie Minnick</h6>
                                <p class="text-muted mb-0">Marketing Manager</p>
                            </div>
                        </div>
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Yearly Sales</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div>
                                            <h4>52,345</h4>
                                            <p class="text-muted">The languages only differ grammar</p>
                                            <a href="#" class="text-primary">Learn more <i class="mdi mdi-chevron-double-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 text-right">
                                        <div id="sparkline"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                 end row -->
                <!--
				<div class="row">
                    <div class="col-xl-6">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 m-b-30 header-title">Latest Transactions</h4>

                                <div class="table-responsive">
                                    <table class="table table-vertical">
        
                                        <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/images/users/user-2.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                Herbert C. Patton
                                            </td>
                                            <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                            <td>
                                                $14,584
                                                <p class="m-0 text-muted font-14">Amount</p>
                                            </td>
                                            <td>
                                                5/12/2016
                                                <p class="m-0 text-muted font-14">Date</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <img src="assets/images/users/user-3.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                Mathias N. Klausen
                                            </td>
                                            <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Waiting payment</td>
                                            <td>
                                                $8,541
                                                <p class="m-0 text-muted font-14">Amount</p>
                                            </td>
                                            <td>
                                                10/11/2016
                                                <p class="m-0 text-muted font-14">Date</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <img src="assets/images/users/user-4.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                Nikolaj S. Henriksen
                                            </td>
                                            <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                            <td>
                                                $954
                                                <p class="m-0 text-muted font-14">Amount</p>
                                            </td>
                                            <td>
                                                8/11/2016
                                                <p class="m-0 text-muted font-14">Date</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <img src="assets/images/users/user-5.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                Lasse C. Overgaard
                                            </td>
                                            <td><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Payment expired</td>
                                            <td>
                                                $44,584
                                                <p class="m-0 text-muted font-14">Amount</p>
                                            </td>
                                            <td>
                                                7/11/2016
                                                <p class="m-0 text-muted font-14">Date</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <img src="assets/images/users/user-6.jpg" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
                                                Kasper S. Jessen
                                            </td>
                                            <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                            <td>
                                                $8,844
                                                <p class="m-0 text-muted font-14">Amount</p>
                                            </td>
                                            <td>
                                                1/11/2016
                                                <p class="m-0 text-muted font-14">Date</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 m-b-30 header-title">Latest Orders</h4>

                                <div class="table-responsive">
                                    <table class="table table-vertical mb-1">

                                        <tbody>
                                        <tr>
                                            <td>#12354781</td>
                                            <td>
                                                <img src="assets/images/users/user-1.jpg" alt="user-image" class="thumb-sm mr-2 rounded-circle"/>
                                                Riverston Glass Chair
                                            </td>
                                            <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                            <td>
                                                $185
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>#52140300</td>
                                            <td>
                                                <img src="assets/images/users/user-2.jpg" alt="user-image" class="thumb-sm mr-2 rounded-circle"/>
                                                Shine Company Catalina
                                            </td>
                                            <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                            <td>
                                                $1,024
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>#96254137</td>
                                            <td>
                                                <img src="assets/images/users/user-3.jpg" alt="user-image" class="thumb-sm mr-2 rounded-circle"/>
                                                Trex Outdoor Furniture Cape
                                            </td>
                                            <td><span class="badge badge-pill badge-danger">Cancel</span></td>
                                            <td>
                                                $657
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>#12365474</td>
                                            <td>
                                                <img src="assets/images/users/user-4.jpg" alt="user-image" class="thumb-sm mr-2 rounded-circle"/>
                                                Oasis Bathroom Teak Corner
                                            </td>
                                            <td><span class="badge badge-pill badge-warning">Shipped</span></td>
                                            <td>
                                                $8451
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>#85214796</td>
                                            <td>
                                                <img src="assets/images/users/user-5.jpg" alt="user-image" class="thumb-sm mr-2 rounded-circle"/>
                                                BeoPlay Speaker
                                            </td>
                                            <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                            <td>
                                                $584
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#12354781</td>
                                            <td>
                                                <img src="assets/images/users/user-6.jpg" alt="user-image" class="thumb-sm mr-2 rounded-circle"/>
                                                Riverston Glass Chair
                                            </td>
                                            <td><span class="badge badge-pill badge-success">Delivered</span></td>
                                            <td>
                                                $185
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 end row -->

          
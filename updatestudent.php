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

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
<?php
require("config.php");
include("adminheader.php");


$sdb=mysqli_select_db($con,"forte") or die(mysql_error());

$scode=$_GET['pscode'];

$sql="select * from studentdetail where StudentId=$scode";

$cmd=mysqli_query($con,$sql) or die(mysql_error());

$rset=mysqli_fetch_array($cmd);
?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Student Edit</h4>
								<form NAME="form_update" ACTION="updatestudent1.php" METHOD="post">
                               
                                    <INPUT TYPE="hidden" NAME="hdstudid" VALUE="<?php echo $scode;?>"/>
								<div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Student Id</label>
                                   <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['StudentId'];?>" id="example-text-input" readonly=READONLY/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Student Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['StudentName'];?>" id="example-text-input" name="txtname">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
									<?php 
									if($rset['Gender']=="FEMALE")
									{	
									   ?>
									   <input type="radio" value="male" name="txtgn" >MALE &nbsp;&nbsp;
									   <input type="radio" value="female" name="txtgn" checked>FEMALE
                                       <?php
									}
									else
									{
                                       ?>
                                       <input type="radio" value="male" name="txtgn" >MALE &nbsp;&nbsp;
								    	<input type="radio" value="female" name="txtgn" checked>FEMALE
                                       <?php
                                    }		
                                    ?>									
									</div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['Address'];?>" name="txtaddress" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-2 col-form-label">Age</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['Age'];?>" name="txtage">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" value="<?php echo $rset['EmailId'];?>" id="example-email-input" name="txtemail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">UserId</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="UserId" value="<?php echo $rset['UserId'];?>" id="example-text-input-sm" name="txtusername">
                                    </div>
                                </div>
								                                <div class="form-group row">
                                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">Start Year</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" value="<?php echo $rset['StartYear'];?>" id="example-text-input-sm" name="txtstartyear">
                                    </div>
                                </div>
								                                <div class="form-group row">
                                    <label for="example-text-input-sm" class="col-sm-2 col-form-label">End Year</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" value="<?php echo $rset['EndYear'];?>" id="example-text-input-sm" name="txtendyear">
                                    </div>
                                </div>
								
								<div class="form-group row">
								<div class="col-sm-4">
								<button type="submit" class="btn btn-success btn-lg btn-block signup-btn">Submit</button>
                                
								</div>
								</div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container-fluid -->
        

        
        <!-- end wrapper -->
		
		<?php
mysqli_close($con);
include("adminfooter.php");

?>


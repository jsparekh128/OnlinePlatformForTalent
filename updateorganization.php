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
include("adminheader.php");
require("config.php");
$ocode=$_GET['pocode'];

$sql="select * from organizationdetail where OrganizationId=$ocode";

$cmd=mysqli_query($con,$sql) or die(mysql_error());

$rset=mysqli_fetch_array($cmd);
?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Organization Edit</h4>
								<form NAME="form_update" ACTION="updateorganization1.php" METHOD="post">
                             
                                    <INPUT TYPE="hidden" NAME="hdorgid" VALUE="<?php echo $ocode;?>"/>
								<div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Organization Id</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['OrganizationId'];?>" id="example-text-input" readonly=READONLY/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Organization Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['OrganizationName'];?>" id="example-text-input" name="txtname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['City'];?>" id="example-text-input" name="txtcity">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Mobile Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['MobileNo'];?>" id="example-text-input" name="txtmobileno">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['Address'];?>" name="txtaddress" >
                                    </div>
                                </div>
                                    <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" value="<?php echo $rset['EmailId'];?>" id="example-email-input" name="txtemail">
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
        </div>
        <!-- end wrapper -->
		
		<?php
mysqli_close($con);
include("adminfooter.php");
?>


<?php
include("adminheader.php");
require("config.php");

$sdb=mysqli_select_db($con,"forte") or die(mysql_error());

$mqcode=$_GET['pqcode'];

$sql="select * from contact where Id=$mqcode";

$cmd=mysqli_query($con,$sql) or die(mysql_error());

$rset=mysqli_fetch_array($cmd);
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
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
   
        <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Reply</h4>
								<form NAME="form_update" ACTION="viewquery2.php" METHOD="post">
                              
                                    <INPUT TYPE="hidden" NAME="hdqid" VALUE="<?php echo $mqcode;?>"/>
								<div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['Name'];?>" id="example-text-input" readonly=READONLY name="txtname"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">EmailId</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="<?php echo $rset['EmailId'];?>" id="example-text-input" readonly=READONLY  name="txtemailid">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Reply</label>
                                    <div class="col-sm-10">
                                    <textarea id="subject" rows="10" cols="80" name="txtreply" placeholder="Write something.." Required></textarea>

                                    </div>
                                </div>

								<div class="form-group row">
								<div class="col-sm-2">
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
		
        </div> <!-- end container-fluid -->
        </div>
        </div>
        <!-- end wrapper -->

		<!-- Footer -->
        <?php
        include("adminfooter.php");
        ?>
        
          

</html>



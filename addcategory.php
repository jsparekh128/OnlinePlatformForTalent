<!DOCTYPE html>
<?php
require("config.php");
$query = "select max(CategoryMasterId) as mcid from categorymaster ";
$result = mysqli_query($con,$query);
$num = mysqli_num_rows($result);
if($num == 0)
{
$ctgid = 1;
}
else 
{
$rset=mysqli_fetch_array($result);
$ctgid=$rset['mcid']+1;
}
?>

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
?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Add New Category </h4>
								<form NAME="form_update" ACTION="insertcategory.php" METHOD="post">
                               
								 <div class="form-group row">
									<label for="example-text-input" class="col-sm-2 col-form-label">Category Id</label>
									  <div class="col-sm-10">
                                        <input class="form-control" type="text"  name="txtcatid" value="<?php echo $ctgid;?>" readonly=READONLY required="required">
                                    </div>
								 </div>
                                 <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
								
                                    <div class="col-sm-10">
                                    <input class="form-control input -lg" type="text"  name="txtcatname">
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


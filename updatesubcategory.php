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
$psubcatcode=$_GET['psubcatcode'];

$sql="select * from subcategorymaster where SubCategoryMasterId=$psubcatcode";

$cmd=mysqli_query($con,$sql) or die(mysql_error());

$rset=mysqli_fetch_array($cmd);
?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Sub Category Edit</h4>
								<form NAME="form_update" ACTION="updatesubcategory1.php" METHOD="post">
                                 
                                    <INPUT TYPE="hidden" NAME="hdorgid" VALUE="<?php echo $psubcatcode;?>"/>
								<div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">SubCategoryMaster Id</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="txtsubcatid" type="text" value="<?php echo $rset['SubCategoryMasterId'];?>" id="example-text-input" readonly=READONLY/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">SubCategoryMaster Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="txtsubcatname" value="<?php echo $rset['SubCategoryMasterName'];?>" id="example-text-input">
                                    </div>
                                </div>
                               
									<div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label"> Select Category Name</label>			
									
									<div class="col-sm-3">
                                    <select name="ddlcategoryid">
                                    <?php
                                    $query="Select * from CategoryMaster";
                                    $cmd1=mysqli_query($con,$query);

                                   
                                    while($row=mysqli_fetch_array($cmd1))
                                    { 
                                       
                                        if($row['CategoryMasterId']==$rset['CategoryMasterId'])
                                        {
                                    ?>
                                    <option value="<?php echo $row['CategoryMasterId']; ?> selected"><?php echo $row['CategoryMasterName']; ?></option>
                                        <?php } ?>
                                    <option value="-1">--Select Category Name--</option>
                                    <option value="<?php echo $row['CategoryMasterId']; ?>"><?php echo $row["CategoryMasterName"]; ?> </option>
                                    <?php
                                    }
                                    ?>
                                    </select>
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


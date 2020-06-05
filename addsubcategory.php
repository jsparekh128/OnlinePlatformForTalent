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
	<?php
			include("adminheader.php"); 
			require("config.php");
			$sqlquery=mysqli_query($con,"select * from categorymaster");
			$query = "select max(SubCategoryMasterId) as msubid from subcategorymaster";
			$result = mysqli_query($con,$query);
			$num = mysqli_num_rows($result);
			if($num == "")
			{
			$subid = 1;
			}
			else 
			{
			$rset=mysqli_fetch_array($result);
			$subid=$rset['msubid']+1;
			}
			?>
			<html>
			<head>
			</head>
	

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Sub Category Edit</h4>
								<form NAME="form_update" ACTION="insertsubcategory.php" METHOD="post">
                             
								 <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Sub Category Id</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" name="txtsubcatid" readonly=READONLY value="<?php echo $subid; ?>"/>
                                    </div>
                                </div>
							

											<div class="form-group row">
											<label for="example-search-input" class="col-sm-2 col-form-label"> Select Category Name</label>			
											
											<div class="col-sm-3">
					<select name="ddlcategoryid">
					<option value="-1">--Select Category Name--</option>
					<?php
					while($row=mysqli_fetch_array($sqlquery))
					{ 
					?>

					<option value="<?php echo $row['CategoryMasterId']; ?>"><?php echo $row["CategoryMasterName"]; ?> </option>
					<?php
					}
					?>
					</select>
					</div>
					</div>
			

			 	<div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Enter sub cateogry name</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" name="txtsubcategory"/>
                                    </div>
                                </div>
				 <div class="form-group row">
								<div class="col-sm-4">
								<button type="submit" class="btn btn-success btn-lg btn-block signup-btn">Submit</button>
								</div>
								</div>
								</form>
								
                         
						</div>
						
                    </div>
					 <!-- end col -->
                </div>
				 <!-- end row -->
            </div> <!-- end container-fluid -->
        </div>
	
		
        <!-- end wrapper -->
			
			<?php
			mysqli_close($con);
			include("adminfooter.php");
		
			?>
			</html>
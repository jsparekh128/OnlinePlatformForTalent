<?php
$mtoken=$_GET['token'];
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Verification Upload</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="/uthor" />
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <link rel="stylesheet" href="../assets/plugins/morris/morris.css">

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>      
    </head>
<div class="body">
	<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
					
                        <div class="card m-b-20">
                            <div class="card-body">

                                <h4 class="mt-0 header-title"><b>Select your verification file here.
                                </h4>
								 <p class="text-muted m-b-30 ">
                                </p>
								 <p class="text-muted m-b-30 ">*Only JPEG and PNG files are allowed!
                                </p>
								 <p class="text-muted m-b-30 ">*Size should be less than 2MB!
                                </p>
								
								<div class="m-b-30">

									<form action="upload.php" method="post" enctype="multipart/form-data" class="form-group">
									<input type="hidden" name="hdtoken" value="<?php echo $mtoken; ?>"/>
										<input type="file" name="fileUpload" class="btn btn-info">
										<div class="text-center m-t-15">
										<input type="submit" class="btn btn-info" name="Upload" value="Upload">
									</div>
									  
									</form>
								</div>
									
								</div>
								 <div id="preview">
								 </div>
								   <br />
																	
														</div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
        
            </div> <!-- end container-fluid -->
        </div>
</div>
<?php 
include("studentfooter.php");
?>

<!--- javascript -->
   <script src="../assets/js/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/waves.min.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Dropzone js -->

        <!-- App js -->
        <script src="../assets/js/app.js"></script>
	

</html> 
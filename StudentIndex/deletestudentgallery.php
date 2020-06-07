<?php
require("config.php");
include("studentheader.php");
if(session_status()==PHP_SESSION_NONE)
{
session_start();

}
    if(isset($_SESSION['StudId']))
    {
        $mstudid=$_SESSION['StudId'];
        $sql="Select u.UploadMasterId,c.CategoryMasterName,d.SubCategoryMasterName,u.UploadFileType,u.UploadPath from uploadmaster u,categorymaster c,subcategorymaster d,studentdetail s where u.StudentId=s.StudentId and u.CategoryMasterId=c.CategoryMasterId and u.SubCategoryMasterId=d.SubCategoryMasterId and u.StudentId=$mstudid and u.isActive=1 and u.isNull=0";
        $cmd=mysqli_query($con,$sql);
      
        
    }
    else
    {
        header("Location: slogin.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

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



<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<!-- Fancybox JS library -->
<script src="fancybox/jquery.fancybox.js"></script>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  

</style>

<!-- endinject -->

</head>


<div class="container">
             <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                           <div class="table-rep-plugin">
                                    <div class="table-responsive">
                                        <table id="uploadtable" class="table  table-striped">
                                            <thead>
            
											<tr>
											<th> UploadMasterId </th>
											<th> Category Name </th>
											<th> Sub Category Name </th>
											<th> File Type </th>
                                            <th> File </th>
											<th> Action </th>
											</tr>
											</thead>
		
			
		
     
    <?php
        while($rows=mysqli_fetch_assoc($cmd))
        {		
    ?>        
	<tbody>
        <tr>
            <td><?php echo $rows['UploadMasterId']; ?></td>
                <td><?php echo $rows['CategoryMasterName']; ?></td>
                <td><?php echo $rows['SubCategoryMasterName']; ?></td>
                
                <?php 
                if($rows['UploadFileType']=="1")
                {
                    ?>
                    <td>Image</td>
                    <div class="gallery">
                    <a href="<?php echo $rows['UploadPath']; ?>" data-fancybox="gallery">
                    <td><img src="<?php echo $rows['UploadPath']; ?>" width="100px" height="100px"></td>
                    <?php
                }
                else
                {
                    ?>
                    <td>Video</td>
                    <td><video width="100" height="100" controls> 
                        <source src="<?php echo $rows['UploadPath']; ?>" type="video/mp4">
                    </video></td>
                    <?php
                }
                ?>
              	<td><a class="btn btn-danger waves-effect waves-light" href="deletestudentgallery1.php?pdcode=<?php echo $rows['UploadMasterId']; ?>">Delete</a> </td>
         </tr>
         
         </tbody>
            <?php }?>
                                            
                                            </table>
                                        </div>
    
                                    </div>
    
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
    
                </div> <!-- end container-fluid -->
            </div>
            
            
     <?php
     include("studentfooter.php");
     ?>
 
    

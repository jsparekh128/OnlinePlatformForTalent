<?php
require("config.php");
include("studentheader.php");
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>


<p>*You can upload either multiple images or multiple videos but one type of file at a time!.
 <p>*Image File size should not exceed 2MB!
 <p>*Video File size should not excced 500MB!</p>


    <div class="form-control">

        <div class="row">
            <div class="col-lg-6">
            <form action="addstudentgallery1.php" method="post" enctype="multipart/form-data">
                <h4>Select Files:</h4>
                    <input type="file" name="fileUpload[]" multiple id="fileUpload[]" class="form-contol"/>
            </div> 
        </div>
        <br>

        <div class="row">
            <div class="col-lg-6">
                <h4>Select Type: </h4>
                <select name="ddltype">
                    <option value="-1">--Select type--</option>
                    <option value="1">Image</option>
                    <option value="2">Videos</option>
                    </select>
            </div>
    </div>
    <br/>
   

        <div class="row">
            <div class="col-lg-6">
                <h4>Select Category:</h4>
                    <select name="ddlcategory" id="ddlcategory" class="form-control action">
                        <?php
                            $sql="Select CategoryMasterId,CategoryMasterName from CategoryMaster where isActive=1";
                            $cmd=mysqli_query($con,$sql);
                            
                        ?>
                    <option value="-1" selected>--Select Category Name-- </option>
                    <?php
                            while($rows=mysqli_fetch_array($cmd))
                            {
                     ?>
                                <option value="<?php echo $rows['CategoryMasterId']; ?>"><?php echo $rows['CategoryMasterName']; ?></option>
                                <?php

                            }
                                ?> 
                                </select>
                     </div> 

                     
             <div class="col-lg-6">
                <h4>Select Sub Category:</h4>
                    <select name="ddlsubcategory" id="ddlsubcategory" class="form-control action">
                        <option value="-1">--Select Sub Category--</option>
                        </select>
                </div> 
            </div>
       
        <br>
        <div class="row">
            <div class="col-lg-4">
                <input type="submit" class="btn btn-info" name="Upload" value="Upload">
            </div>
        </div>    
    </form>
</div>




</body>


</div>
<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != "-1")
  {
   var action = $(this).attr("id");
   var query = $(this).val();

   var result = '';
   if(action == "ddlcategory")
   {
    result = 'ddlsubcategory';
   }
   $.ajax({
    url:"getSubCategory.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>



         <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

 <?php
 include("studentfooter.php");
 ?>
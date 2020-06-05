<?php
include("organizationheader.php");
require("config.php");
if(session_status()==PHP_SESSION_NONE)
{
  session_start();

}
 if(isset($_SESSION['OrganizationId']))
  {
    $morgid=$_SESSION['OrganizationId'];
    $sql="Select * from organizationdetail where OrganizationId=$morgid";
    $cmd=mysqli_query($con,$sql);
    $rset=mysqli_fetch_array($cmd);
  }
  else
  {
    header("Location: ologin.php");
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Organization Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/font-awesome.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>


<div class="container">
<div class="form-control">
        <div class="row">
            <div class="col-lg-6">
<form NAME="form_update"  ACTION="organizationprofile1.php" METHOD="post" class="form1" enctype="multipart/form-data">
  <INPUT TYPE="hidden" NAME="hdorgid" VALUE="<?php echo $rows['OrganizationId'];?>"/>
<?php if(is_null($rset['OrganizationImage']))
{
    ?>
    <img src="images/profile.png" width="120px" height="120px" style="border-radius:50%;"/>
   
<?php 
}
else
{
    ?>
    
    <img  src="<?php echo $rset['OrganizationImage'];?>" width="120px" height="120px" style="border-radius:50%;"/>
    
    <?php
}
?>
</div>
</div>

        <div class="row">
            <div class="col-lg-6">
                <label>Organization Name</label>
                  <INPUT type="text" NAME="txtoname" VALUE="<?php echo $rset['OrganizationName'];?>"/>
                </div>
              <div class="col-lg-6">
                  <label>EmailId</label>
                    <INPUT type="text" NAME="txtemail" VALUE="<?php echo $rset['EmailId'];?>"/>
              </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label>City</label>
                  <INPUT type="text" NAME="txtcity" VALUE="<?php echo $rset['City'];?>"/>
            </div>
              <div class="col-lg-6">
                <label>Address</label>
                  <INPUT type="text" NAME="txtadd" VALUE="<?php echo $rset['Address'];?>"/>
              </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label>Mobile Number</label>
                    <INPUT type="text" NAME="txtmobileno" VALUE="<?php echo $rset['MobileNo'];?>"/>
             </div>
       </div>

        <div class="row">
            <div class="col-lg-6">
                <label>Select New Profile Pic</label>
                    <INPUT type="file" class="form-control" name="fileUpload"/> 
            </div>
        </div>
<br>
        <div class="row">
            <div class="col-md-4">
                <INPUT TYPE="submit" class="btn btn-success" NAME="btnupdate" VALUE="UPDATE"/>
            </div>
        </div>
</form>
</div>
<?php
mysqli_close($con);
?>
</div>
         <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

 <?php
 include("organizationfooter.php");
 ?>
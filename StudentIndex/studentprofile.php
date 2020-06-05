<?php
require("config.php");

if(session_status()==PHP_SESSION_NONE)
{
  session_start();

}
 if(isset($_SESSION['StudId']))
  {
    $mstudid=$_SESSION['StudId'];
    $sql="Select * from studentdetail where StudentId=$mstudid";
    $cmd=mysqli_query($con,$sql);
    $rset=mysqli_fetch_array($cmd);
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
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<?php
include("studentheader.php");
?>


<div class="container">
<div class="form-control">
        <div class="row">
            <div class="col-lg-6">
<form NAME="form_update"  ACTION="studentprofile1.php" METHOD="post" class="form1" enctype="multipart/form-data">
  <INPUT TYPE="hidden" NAME="hdstudid" VALUE="<?php echo $rows['StudentId'];?>"/>
<?php if(is_null($rset['ProfileImage']))
{
    ?>
    <img src="images/profile.png" width="120px" height="120px" style="border-radius:50%;"/>
   
<?php 
}
else
{
    ?>
    
    <img  src="<?php echo $rset['ProfileImage'];?>" width="120px" height="120px" style="border-radius:50%;"/>
    
    <?php
}
?>
</div>
</div>

        <div class="row">
            <div class="col-lg-6">
                <label>Student Name</label>
                  <INPUT type="text" NAME="txtsname" VALUE="<?php echo $rset['StudentName'];?>"/>
                </div>
              <div class="col-lg-6">
                  <label>EmailId</label>
                    <INPUT type="text" NAME="txtemail" VALUE="<?php echo $rset['EmailId'];?>"/>
              </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label>Age</label>
                  <INPUT type="text" NAME="txtage" VALUE="<?php echo $rset['Age'];?>"/>
            </div>
              <div class="col-lg-6">
                <label>Address</label>
                  <INPUT type="text" NAME="txtadd" VALUE="<?php echo $rset['Address'];?>"/>
              </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label>UserName</label>
                    <INPUT type="text" NAME="txtuser" VALUE="<?php echo $rset['UserId'];?>"/>
             </div>
            <div class="col-lg-6">
                <label>Bio</label>
                      <input type="text"  NAME="txtbio" value="<?php echo $rset['Bio']; ?>"/>
                  
              </div>
       </div>


       <div class="row">
            <div class="col-lg-6">
                    <label>Start Year</label>
                    <INPUT type="text"  VALUE="<?php echo $rset['StartYear'];?>" readonly=READONLY/>
            </div>
            <div class="col-lg-6">
                    <label>End Year</label>
                    <INPUT type="text"  VALUE="<?php echo $rset['EndYear'];?> " readonly=READONLY/>
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
 include("studentfooter.php");
 ?>
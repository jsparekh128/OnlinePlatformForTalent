<?php
require("config.php");
include("studentheader.php");
$mdate=date('Y-m-d');
$todaydate=date('Y-m-d',strtotime($mdate));

$mstudid=$_SESSION['StudId'];
$sql="Select p.EventId,e.EventName from participationmaster p,events e where e.EventId=p.EventId and StudentId=$mstudid";
$cmd=mysqli_query($con,$sql);


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

<div class="alert alert-danger" role="alert">
         <strong>INSTRUCTIONS<br/>
             -- Here only those event names will be displayed in which you have selected for participation and waiting for results!<br/>
        </strong>
    </div>

<div class="row">
            <div class="col-lg-6">
            <form action="viewwinner2.php" method="post" enctype="multipart/form-data">

                <h4>Select Event:</h4>
                <br/>
                    <select name="ddlevent" id="ddlevent" class="form-control action" required>
                    <option value="-1" selected>--Select Event Name-- </option>
                    <?php
                            

                            while($rows=mysqli_fetch_array($cmd))
                            { 
                     ?>
                                <option value="<?php echo $rows['EventId']; ?>"><?php echo $rows['EventName']; ?></option>
                                <?php
                            }
                                ?> 
                                </select>
                                <br/>
                                <br/>

                                <input type="submit" class="btn btn-info" name="Submit" value="Submit">

                     </div> 
        </div>
    </form>
    </div>
    <?php
    include("studentfooter.php");
    ?>
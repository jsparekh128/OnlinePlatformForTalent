<?php
require("config.php");
include("studentheader.php");
$mdate=date('Y-m-d');
$todaydate=date('Y-m-d',strtotime($mdate));

$mstudid=$_SESSION['StudId'];
$sql="Select p.EventId,e.EventEndDate from participationmaster p,events e where e.EventId=p.EventId and StudentId=$mstudid and e.EventEndDate > '$todaydate'";
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
         <strong>Here only those event names will be displayed in which you have selected for participation.<br/>
          If not yet then select "Participate for Event" from you dashboard Menu </strong>
    </div>
    <div class="alert alert-danger" role="alert">
         <strong>Only those event names will be dispalyed whose End dates are still left! So Hurry Up for uploading! </strong>
    </div>


<div class="row">
            <div class="col-lg-6">
            <form action="uploadstudentparticipation1.php" method="post" enctype="multipart/form-data">

                <h4>Select Event:</h4>
                <br/>
                    <select name="ddlevent" id="ddlevent" class="form-control action" required>
                    <option value="-1" selected>--Select Event Name-- </option>
                    <?php
                            

                            while($rows=mysqli_fetch_array($cmd))
                            {
                                $meventid=$rows['EventId'];
                                $query1="Select EventId,EventName from events where EventId=$meventid";
                                $cmd2=mysqli_query($con,$query1);
                                $result=mysqli_fetch_array($cmd2);
                                
                     ?>
                                <option value="<?php echo $result['EventId']; ?>"><?php echo $result['EventName']; ?></option>
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
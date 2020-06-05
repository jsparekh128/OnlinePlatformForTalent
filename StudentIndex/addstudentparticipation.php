<?php
include("studentheader.php");
require("config.php");
$mecode=$_GET['pecode'];
$mstudid=$_SESSION['StudId'];
$query="Select EventName from events where EventId=$mecode";
$cmd1=mysqli_query($con,$query);
$result=mysqli_fetch_array($cmd1);

$sql1="Select * from participationmaster where EventId=$mecode and StudentId=$mstudid";

$cmd1=mysqli_query($con,$sql1);
$numrows=mysqli_num_rows($cmd1);
if( $numrows!=0 )
{
    ?>

     <script type="text/javascript">
     alert("You have already participated in this event");
    window.location.href="viewstudentevent.php";
      </script>
      <?php

}
else
{


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
<body>
<?php
$mdate=date('Y-m-d');
$todaydate=date('Y-m-d',strtotime($mdate));
$sql="Insert into participationmaster(EventId,ParticipationDate,StudentId) values($mecode,'$todaydate',$mstudid)";
$cmd=mysqli_query($con,$sql);

//Inserting into calendar
$sql1="Select EventName,EventStartDate,EventEndDate from events where EventId=$mecode";
$cmd1=mysqli_query($con,$sql1);
$result=mysqli_fetch_array($cmd1);
$msdate=$result['EventStartDate'];
$medate=$result['EventEndDate'];
$mename=$result['EventName']." ( Participated ) ";

$sql2="Insert into tbl_events(title,start,end) values('$mename','$msdate','$medate')";
$cmd2=mysqli_query($con,$sql2);

///-------


    ?>
    <div class="alert alert-success" role="alert">
         <strong>Thats Cool!</strong>You have participated in a <strong><?php echo $result[0]; ?> !! </strong>
    </div>
    <div class="alert alert-success" role="alert">
         <strong>You can upload Images or Videos from your profile gallery only for any competition. 
                So please click on nelow button upload files.
        </strong>

      </div>
      <br/>
      <a href="uploadstudentparticipation.php" class="btn btn-primary waves-effect waves-light">Click Here</a>

      

    <?php
    ?>



    <?php


}
    ?>
    
            </div>
            
            
     <?php
     include("studentfooter.php");
     ?>

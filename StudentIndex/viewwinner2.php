<?php
require("config.php");
$mdate=date('Y-m-d');
$todaydate=date('Y-m-d',strtotime($mdate));
if(session_status()==PHP_SESSION_NONE)
{
    session_start();
}
$mstudid=$_SESSION['StudId'];
if(isset($_POST['Submit']))
{
$mddlevent=$_POST['ddlevent'];

}
else
{
    
    header("Location: viewwinner.php");
    
}

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

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
 

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<!-- Fancybox JS library -->

  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<?php
$sql1="Select * from winnermaster where EventId=$mddlevent and StudentId=$mstudid";
$cmd1=mysqli_query($con,$sql1);
$numrows=mysqli_num_rows($cmd1);

//TO CHECK WINNER

if($numrows==1)
{
    ?>

    <div class="alert alert-success" role="alert">
         <strong>Congratulations!<br/> 
            You are selected as a WINNER of this Event! <br/>
            Your certificate and trophy will be delievered at your address !</strong>
        <br/>
    </div>
</div>
    <?php

}
else
{
    $sql2="Select * from winnermaster where EventId=$mddlevent";
    $cmd2=mysqli_query($con,$sql2);
    $numrows1=mysqli_num_rows($cmd2);
        //TO CHECK FOR THE ANOTHER WINNER
        if($numrows1==1)
        {
            ?>

        <div class="alert alert-danger" role="alert">
                <strong>Sad!<br/> 
                You are NOT selected as a winner! <br/>
                Keep Trying !</strong>
                <br/>
        </div>
        </div>

             <?php

        }
        else
        {
            //Results are not yet declared
            ?>

            <div class="alert alert-primary" role="alert">
                    <strong>Wait!<br/> 
                    Results are not yet declared! <br/></strong>
                    <br/>
            </div>
        </div>
    
             <?php

        }
    }

    include("studentfooter.php");

 ?>

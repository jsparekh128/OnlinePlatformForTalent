<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
require("config.php");
if(session_status()==PHP_SESSION_NONE)
{
  session_start();

}
include("organizationheader.php");
$morgid=$_SESSION['OrganizationId'];
if(isset($_POST['Submit']))
{
$mddlevent=$_POST['ddlevent'];
if($mddlevent=="-1")
{
    ?>
            <script type="text/javascript">
             alert("Please select event!");
             window.location.href="selectparticipant.php";
             </script>
            <?php
        
}
else
{
    $_SESSION['OEventId']=$mddlevent;
}

}
else
{
    if(isset($_SESSION['OEventId']))
    {
    
        $mddlevent=$_SESSION['OEventId'];
    }
    else
    {
        header("Location: selectparticipant.php");
    }
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
  <link rel="stylesheet" href="fancybox/jquery.fancybox.css">

 
<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<!-- Fancybox JS library -->

  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<div class="alert alert-danger" role="alert">
         <strong>INSTRUCTIONS!<br/> 
         -- Select Top Winner of any event by ticking on checkbox!
         </strong>
        
    </div>
<?php

$sql1="Select FileType,NumberOfFiles from events where EventId=$mddlevent";
$cmd1=mysqli_query($con,$sql1);
$result=mysqli_fetch_array($cmd1);
$countfile=$result['NumberOfFiles'];
$mfiletype=$result['FileType'];

$sql2="Select c.StudentId,s.StudentName,c.CompetitionMasterId,c.UploadFilePath from studentdetail s,competitionmaster c where c.StudentId=s.StudentId and c.EventId=$mddlevent";
$cmd2=mysqli_query($con,$sql2);
?>
 <form name="f1" action="selectparticipant2.php" method="post">
<div class="gallery">

        <table>
            <tr>
                <th>Action</th>
                <th>CompetitionMasterId</th>
                <th>Student Name</th>
                <th>File Upload</th>
                <th></th>
                
               
                
            </tr>
            <tr>
                <?php
                    while($rows2=mysqli_fetch_array($cmd2))
                    {
                        ?>
                        <td><input type="checkbox" class="form-control" name="chckFileUpload1" value="<?php echo $rows2['StudentId']; ?>"></td>
                        <td><?php echo $rows2['CompetitionMasterId']; ?></td>
                        <td><?php echo $rows2['StudentName']; ?></td>
                        <?php
                            $filename=explode(",",$rows2['UploadFilePath']);
                            for($i=0;$i<$countfile;$i++)
                            {
                                if($mfiletype=="1")
                                {
                                    $dirname="/project/StudentIndex/".$filename[$i];
                                    ?>
                                   <td>
                                    
                                 <a href="<?php echo $dirname; ?>" data-fancybox="gallery">
                                    <img src="<?php echo $dirname; ?>" width="150px" height="150px"/>
                                    </td>
                                
                                    <?php
                                }
                                else
                                {
                                    $dirname="/project/StudentIndex/".$filename[$i];
                                    ?>
                                    <td><video width="150" height="150" controls> 
                                        <source src="<?php echo $dirname; ?>" type="video/mp4">
                                    </video></td>
                                    <?php
                                }

                            }
                    

                    }
                    ?>
                    </tr>
               
                </table>
                <br/>
                
                <input type="submit" class="btn btn-info" name="Submit" value="Submit">
    </form>
                </div>
                </div>
               
                <?php
                
                include("organizationfooter.php");
                ?>
                 <script>
               $("[data-fancybox]").fancybox(
                showCloseButton: true,
                width:"100%",
               );
            </script>
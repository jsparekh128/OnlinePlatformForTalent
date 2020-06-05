<?php
require("config.php");
if(session_status()==PHP_SESSION_NONE)
{
  session_start();

}
 if(isset($_SESSION['OrganizationId']))
  {
    $morgid=$_SESSION['OrganizationId'];
  }
  else
  {
    header("Location: ologin.php");
  }

if(isset($_POST['btnupdate']))
{
    $meventid=$_POST['txteventid'];
    $meventname=$_POST['txteventname'];
    $meventsdate=date('Y-m-d', strtotime($_POST['dateStart']));
    $meventedate=date('Y-m-d', strtotime($_POST['dateEnd']));
    $mcatid=$_POST['ddlcategory'];
    $msubcatid=$_POST['ddlsubcategory'];
    $mtype=$_POST['ddltype'];
    $mfileno=$_POST['ddlfilenumber'];
    $meventdesc=$_POST['txtdescription'];
    if($mcatid=="-1" || $msubcatid=="-1" || $mtype=="-1" || $mfileno=="-1")
    {
        ?>
        <script type="text/javascript">
            alert("Please select proper category/subcategory/file type/file number!");
            window.location.href="updateevent.php";
         </script>
         <?php   
    }
    else
    {
        $sql="Update events set EventName='$meventname', EventStartDate='$meventsdate', EventEndDate='$meventedate', CategoryMasterId=$mcatid, SubCategoryMasterId=$msubcatid, EventDescription='$meventdesc', FileType=$mtype, NumberOfFiles=$mfileno, isUpdatedBy=$morgid where EventId=$meventid";
        $cmd=mysqli_query($con,$sql);
        ?>
        <script type="text/javascript">
            alert("Event successfully Updated");
            window.location.href="viewevent.php";
         </script>
         <?php

    }

}

<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
require("config.php");
include("studentheader.php");
if(session_status()==PHP_SESSION_NONE)
{
session_start();

}
$mdate=date('Y-m-d');
$todaydate=date('Y-m-d',strtotime($mdate));
$mstudid=$_SESSION['StudId'];
if(isset($_POST['Submit']))
{
    $meventid=$_SESSION['SEventId'];
    $mhdnumberoffiles=$_POST['hdfilenumber'];
    if(isset($_POST['chckFileUpload']))
    {
        $mchckFileUpload=$_POST['chckFileUpload'];
        //counting
        $count = count($mchckFileUpload);
        //implode
        $selected=implode(",",$mchckFileUpload);

    }
    else{
        $count=0;
    }
    

    if($count != $mhdnumberoffiles)
    {
        ?>
            <script type="text/javascript">
             alert("Please select only required number of files!");
             window.location.href="uploadstudentparticipation1.php";
             </script>
            <?php
        
    }
    else
    {
        $sql1="Select * from competitionmaster where EventId=$meventid and StudentId=$mstudid";
        $cmd1=mysqli_query($con,$sql1);
        $numrows=mysqli_num_rows($cmd1);
        if($numrows>=1)
        {
            ?>
                <script type="text/javascript">
             alert("You have already uploaded files for event!");
             window.location.href="uploadstudentparticipation1.php";
             </script>
            <?php

        }
        else
        {
                $sql="Insert into competitionmaster(EventId,StudentId,UploadFilePath,UploadDate,isCreatedBy,isUpdatedBy) values($meventid,$mstudid,'$selected','$todaydate',$mstudid,$mstudid)";
                $cmd=mysqli_query($con,$sql);
                    if($cmd=="true")
                    {
                        ?>
                         <script type="text/javascript">
                       alert("You have successfully uploaded files for event!");
                       window.location.href="uploadstudentparticipation1.php";
                       </script>
                       <?php
                    }  

                }
        }
    }

?>

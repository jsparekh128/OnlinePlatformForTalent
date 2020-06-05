<?php
require("config.php");
include("organizationheader.php");
if(session_status()==PHP_SESSION_NONE)
{
session_start();

}
if(isset($_POST['Submit']))
{
    $meventid=$_SESSION['OEventId'];
    $mchckFileUpload=$_POST['chckFileUpload1'];
    //counting
    $count = count($mchckFileUpload);
    //implode

    if($count != "1")
    {
        ?>
            <script type="text/javascript">
             alert("Please select only 1 winner!");
             window.location.href="selectparticipant1.php";
             </script>
            <?php
        
    }
    else
    {
        $sql1="Select * from winnermaster where EventId=$meventid";
        $cmd1=mysqli_query($con,$sql1);
        $numrows=mysqli_num_rows($cmd1);
        if($numrows>=1)
        {
            ?>
                <script type="text/javascript">
             alert("You have already selected winner for this event!");
             window.location.href="selectparticipant1.php";
             </script>
            <?php

        }
        else
        {
                $sql="Insert into winnermaster(EventId,StudentId) values($meventid,$mchckFileUpload)";
                $cmd=mysqli_query($con,$sql) or die(mysql_error());

                $sql1="Update events set isWinner=1 where EventId=$meventid";
                $cmd1=mysqli_query($con,$sql1) or die(mysql_error());


                    if($cmd=="true" and $cmd1=="true")
                    {
                        ?>
                         <script type="text/javascript">
                       alert("You have successfully selected winner for this event!");
                       window.location.href="selectparticipant.php";
                       </script>
                       <?php
                    }  

                }
        }
    }

?>

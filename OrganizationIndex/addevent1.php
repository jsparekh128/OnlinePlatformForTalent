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

if(isset($_POST['btnadd']))
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
            window.location.href="addevent.php";
         </script>
         <?php   
    }
    else
    {
        $sql="Insert into events values($meventid,'$meventname','$meventsdate','$meventedate',$mcatid,$msubcatid,$mtype,$mfileno,'$meventdesc',$morgid,0,$morgid,$morgid,1,0)";
        $cmd=mysqli_query($con,$sql);

        $sql1="Insert into org_events(title,start,end) values('$meventname','$meventsdate','$meventedate')";
        $cmd1=mysqli_query($con,$sql1);
        ?>
        <script type="text/javascript">
            alert("Event successfully added");
            window.location.href="viewevent.php";
         </script>
         <?php

    }

}

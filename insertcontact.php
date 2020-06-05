<?php
require("config.php");

if(isset($_POST['Submit']))
{
    $mfname=$_POST['firstname'];
    $mlname=$_POST['txtemail'];
    $mcollege=$_POST['ddlcollege'];
    $msubject=$_POST['txtsubject'];

    if(strlen($msubject) > 500)
    {
        ?>
        <script>
        alert("Enter subject less than 500 characters");
        window.location.href="contact.php";
        </script>
        <?php

    }
    else
    {
        $sql="Insert into contact(Name,EmailId,College,Query) values('$mfname','$mlname','$mcollege','$msubject')";
        $cmd=mysqli_query($con,$sql);
        ?>
        <script>
        alert("Your query is submiited. Wait for response");
        window.location.href="home.php";
        </script>
        <?php

    }

}

?>

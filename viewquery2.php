<?php
require 'C:\wamp64\vendor\autoload.php';
require("mailtest1.php");
require("config.php");

$mreply=$_POST['txtreply'];
$emailid=$_POST['txtemailid'];
$name=$_POST['txtname'];
$id=$_POST['hdqid'];

sendmail($emailid,$mreply);

$sql="Update contact set Reply=1 where Id=$id";
$cmd=mysqli_query($con,$sql);

    ?>
    <script>
    alert("Your reply has been sent");
    window.location.href="viewquery.php";
    </script>
    <?php

?>
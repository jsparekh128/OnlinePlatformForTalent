<?php
require("config.php");
$mstudentid=$_GET['pscode'];
$select=mysqli_query($con,"select * from studentdetail where StudentId=$mstudentid");
while($rows=mysqli_fetch_object($select))
{
$status_var=$rows->isActive;
if($status_var==0)
{
$status_state=1;
}
else
{
$status_state=0;
}
$update=mysqli_query($con,"update studentdetail set isActive=$status_state where StudentId=$mstudentid");
if($update)
{

header("Location: viewstudent.php");
}
else
{
echo mysql_error();
}
}
?>
<?php

?>

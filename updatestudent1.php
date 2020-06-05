<?php
require("config.php");

$mname=$_POST['txtname'];
$mgender=$_POST['txtgn'];
$maddress=$_POST['txtaddress'];
$mage=$_POST['txtage'];
$memail=$_POST['txtemail'];
$musername=$_POST['txtusername'];
$mstudentid=$_POST['hdstudid'];
$mstartyear=$_POST['txtstartyear'];
$mendyear=$_POST['txtendyear'];




$sql="Update studentdetail set StudentName='$mname', Age='$mage', Address='$maddress', EmailId='$memail',Gender='$mgender' , UserId='$musername',StartYear='$mstartyear',EndYear='$mendyear' where StudentId=$mstudentid";
$cmd=mysqli_query($con,$sql) or die(mysql_error());
?>
	<script type="text/javascript">
	alert("StudentDetail Updated Successfully");
	window.location.href="viewstudent.php";
	</script>
	<?php
	
	mysqli_close($con);
?>

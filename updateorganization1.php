<?php
require("config.php");

$mname=$_POST['txtname'];
$maddress=$_POST['txtaddress'];
$memail=$_POST['txtemail'];
$mcity=$_POST['txtcity'];
$mmobileno=$_POST['txtmobileno'];
$morganizationid=$_POST['hdorgid'];

$sql="Update organizationdetail set OrganizationName='$mname',City='$mcity',MobileNo='$mmobileno', Address='$maddress', EmailId='$memail' where OrganizationId=$morganizationid";
$cmd=mysqli_query($con,$sql) or die(mysql_error());
?>
	<script type="text/javascript">
	alert("Organization Updated Successfully");
	window.location.href="vieworganization.php";

	</script>
	<?php
	
	mysqli_close($con);
?>

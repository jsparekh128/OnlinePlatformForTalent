<?php
require("config.php");

$mname=$_POST['txtname'];
$mcategoryid=$_POST['hdctgid'];

$sql="Update categorymaster set CategoryMasterName='$mname' where CategoryMasterId=$mcategoryid";
$cmd=mysqli_query($con,$sql) or die(mysql_error());
?>
	<script type="text/javascript">
	alert("Category Updated Successfully");
	window.location.href="viewcategory.php";
	</script>
	<?php
	
	mysqli_close($con);
?>

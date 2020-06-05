<?php
require("config.php");
$pocode=$_GET['pocode'];
$sdb=mysqli_select_db($con,"forte") or die(mysql_error());

$sql="Update organizationdetail set isActive=0,isNull=0 where OrganizationId=$pocode"; 
$cmd=mysqli_query($con,$sql) or die(msql_error() );
?>
	<script type="text/javascript">
	alert("OrganizationDetail Deleted Successfully");
	</script>
	<?php
	include("vieworganization.php");
	mysqli_close($con);
?>
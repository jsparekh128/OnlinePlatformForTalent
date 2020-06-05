<?php
require("config.php");
$mscode=$_GET['pocode'];


$sdb=mysqli_select_db($con,"forte") or die(mysql_error());

$sql="Update categorymaster set isActive=0  where CategoryMasterId=$mscode"; 
$cmd=mysqli_query($con,$sql) or die(msql_error() );
?>
	<script type="text/javascript">
	alert("Category Deleted Successfully");
	window.location.href="viewcategory.php";
	</script>
	<?php
	
	mysqli_close($con);
?>
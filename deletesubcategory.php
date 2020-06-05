<?php
require("config.php");
$mscode=$_GET['psubcatcode'];


$sdb=mysqli_select_db($con,"forte") or die(mysql_error());

$sql="Update subcategorymaster set isActive=0 ,isNull=1 where SubCategoryMasterId=$mscode"; 
$cmd=mysqli_query($con,$sql) or die(msql_error() );
?>
	<script type="text/javascript">
	alert("Sub Category Deleted Successfully");
	window.location.href="viewsubcategory.php";
	</script>
	<?php
	
	mysqli_close($con);
?>
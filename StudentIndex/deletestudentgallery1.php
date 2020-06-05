<?php
require("config.php");
$mdcode=$_GET['pdcode'];


$sdb=mysqli_select_db($con,"forte") or die(mysql_error());

$sql="Update uploadmaster set isActive=0 ,isNull=1 where UploadMasterId=$mdcode"; 
$cmd=mysqli_query($con,$sql) or die(msql_error() );
?>
	<script type="text/javascript">
	alert("File Deleted Successfully");
	window.location.href="deletestudentgallery.php";
	</script>
	<?php
	
	mysqli_close($con);
?>
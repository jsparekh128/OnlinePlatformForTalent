<?php
require("config.php");
$mscode=$_GET['pscode'];


$sdb=mysqli_select_db($con,"forte") or die(mysql_error());

$sql="Update studentdetail set isActive=0 ,isNull=1 where StudentId=$mscode"; 
$cmd=mysqli_query($con,$sql) or die(msql_error() );
?>
	<script type="text/javascript">
	alert("StudentDetail Deleted Successfully");
	window.location.href="viewstudent.php";
	</script>
	<?php
	
	mysqli_close($con);
?>
<?php
require("config.php");
$mecode=$_GET['pecode'];

$sql="Update events set isActive=0 ,isNull=1 where EventId=$mecode"; 
$cmd=mysqli_query($con,$sql) or die(msql_error() );
?>
	<script type="text/javascript">
	alert("Event Deleted Successfully");
	window.location.href="viewevent.php";
	</script>
	<?php
	
	mysqli_close($con);
?>
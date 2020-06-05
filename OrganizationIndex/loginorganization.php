<?php
session_start();
require("config.php");
include ("fncrypt.php");


$myuname=$_POST['email'];
$mypsw=$_POST['pass'];
$emypsw=my_simple_crypt($mypsw,'e');


$sql="SELECT * from organizationdetail where EmailId='$myuname' and Password='$emypsw' and isActive=1 and isNull=0";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result);
$count=mysqli_num_rows($result);
if($count==1)
{

	$_SESSION['OrganizationId']=$rows['OrganizationId'];
	header("Location: organizationdashboard.php");
}
else
{
	session_destroy();

	?>
	<script type="text/javascript">
		alert("Wrong Username/Password");
		window.location.href="ologin.php";
		</script>
		<?php
}
?>

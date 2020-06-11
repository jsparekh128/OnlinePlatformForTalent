<?php
session_start();
require("config.php");
include ("fncrypt.php");

$sdb=mysqli_select_db($con,"forte") or die(mysql_error());

$myuname=$_POST['email'];
$mypsw=$_POST['pass'];
$emypsw=my_simple_crypt($mypsw,'e');


$sql="SELECT * from studentdetail where UserId='$myuname' and Password='$emypsw' and isActive=1 and isNull=0 ";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result);
$count=mysqli_num_rows($result);
if($count==1)
{

	$_SESSION['StudId']=$rows['StudentId'];
	header("Location: studentdashboard.php");
}
else
{
	session_destroy();

	?>
	<script type="text/javascript">
		alert("Wrong Username/Password");
		window.location.href="slogin.php";
		</script>
		<?php
}
?>
	

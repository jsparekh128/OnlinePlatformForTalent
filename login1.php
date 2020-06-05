<?php
require("config.php");


$myuname=$_POST['email'];
$mypsw=$_POST['pass'];

$sql="SELECT * from adminlogin where AdminName='$myuname' and Password='$mypsw'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count==1 && $myuname="admin" && $mypsw="admin123")
{
	if (session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
	
	$_SESSION['myuname']=$myuname;
	$_SESSION['mypsw']=$mypsw;
	
	//$_SESSION['loginerror']=0;
	header("Location: adminindex.php");
}
else
{

	      ?>
	  <script type="text/javascript">
	  alert("Wrong username and password!");
	  window.location.href="login0.php";
	  </script>
<?php
	
	}
	?>

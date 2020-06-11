<?php
require("config.php");
$mcid=$_POST['txtcatid'];
$mname=$_POST['txtcatname'];
$msg="";
$flag=true;
// for checking whether username exist in database or not
$query = "SELECT * FROM categorymaster WHERE CategoryMasterName='$mname'";
$cmd = mysqli_query($con,$query);
$number = mysqli_num_rows($cmd);
  if($number != 0)
  {
	  ?>
	  <script type="text/javascript">
	  alert("This Category already exists");
	  window.location.href="addcategory.php"
	  </script>
<?php
  }
  else
  {
		if(!$value=preg_match("/^[a-zA-Z ]{2,20}$/",$mname))
		{
				$msg=$msg."Name can only contain alphabets.<BR>";
				$flag=false;
		}
		
		if($flag==false)
		{
			echo $msg;
		}
		else
		{
				$sql1="insert into categorymaster values($mcid,'$mname',1,1,1,CURDATE(),CURDATE())";
			    $cmd=mysqli_query($con,$sql1) or die(mysqli_error($con));
				?>
				<script type="text/javascript">
				window.location.href="viewcategory.php";
				alert("Record Inserted");
				</script>
				<?php
					
		}
  }
mysqli_close($con);
?>
	
<?php
include("fncrypt.php");
require("config.php");
$moid=$_POST['organizationid'];
$moname=$_POST['organizationname'];
$moaddress=$_POST['address'];
$moemail=$_POST['email'];
$msg="";
$flag=true;
$mopassword=$_POST['password'];

// for checking whether username exist in database or not
$query = "SELECT * FROM organizationdetail WHERE EmailId='$moemail'" ;
$cmd = mysqli_query($con,$query);
$number = mysqli_num_rows($cmd);
  if($number != 0)
  {
	  ?>
	  <script type="text/javascript">
	  alert("This email and username already exists");
	  window.loaction.href="orgsignup.php";
	  </script>
<?php
  }
  else
  {
		if(!$value=preg_match("/^[a-zA-Z ]{2,20}$/",$moname))
		{
				$msg=$msg."Name can only contain alphabets.<BR>";
				$flag=false;
		}
		/*if(!$value=preg_match("/^[0-9]{1,4}$/",$mcid))
		{
				$msg=$msg."Course id can only contain numbers.<BR>";
				$flag=false;
		}
		
		*/
		
		if(!$value=preg_match("/^[_a-zA-Z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/",$moemail))
		{
				$msg=$msg."Enter a valid email address.<BR>";
				$flag=false;
		}
		if($flag==false)
		{
			echo $msg;
		}
		else
		{
				$eopassword=my_simple_crypt($mopassword,'e');
				$sql1="insert into organizationdetail(OrganizationId,OrganizationName,Address,isActive,isCreatedBy,isUpdatedBy,isNull,Password,EmailId) values($moid,'$moname','$moaddress',1,$moid,$moid,0,'$eopassword','$moemail')";
				$cmd=mysqli_query($con,$sql1) or die(mysqli_error($con));
?>
				<script type="text/javascript">
				alert("Record Inserted");
				window.location.href="ologin.php";
				</script>
				<?php
					
		}
  }
mysqli_close($con);
?>
	
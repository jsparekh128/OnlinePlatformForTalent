<?php
require 'C:\wamp64\vendor\autoload.php';
require("fncrypt.php");
require("config.php");
require("mailtest1.php");
$mid=$_POST['studentid'];
$mname=$_POST['studentname'];
$mgender=$_POST['gn'];
$maddress=$_POST['address'];
$mage=$_POST['age'];
$memail=$_POST['email'];
$musername=$_POST['username'];
$msg="";
$flag=true;
$mpassword=$_POST['password'];
$token = bin2hex(mt_rand(300,100000));

// for checking whether username exist in database or not
$query = "SELECT * FROM studentdetail WHERE EmailId='$memail' and UserId='$musername'";
$cmd = mysqli_query($con,$query);
$number = mysqli_num_rows($cmd);	
  if($number != 0)
  {
	  ?>
	  <script type="text/javascript">
	  alert("This email and username already exists");
	  window.location.href="SignUp.php";
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
		/*if(!$value=preg_match("/^[0-9]{1,4}$/",$mcid))
		{
				$msg=$msg."Course id can only contain numbers.<BR>";
				$flag=false;
		}
		
		*/
  
		if (!$value=preg_match("/^[0-9]+$/", $mage))
		{
			
			$msg=$msg." Age is Invalid.";
			$flag=false;
		}
		if(!$value=preg_match("/^[a-zA-Z0-9._]{2,20}$/",$musername))
		{
				$msg=$msg." Username can only contain alphabets and/or numbers. ";
				$flag=false;
		}
		if(!$value=preg_match("/^[_a-zA-Z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/",$memail))
		{
				$msg=$msg." Enter a valid email address. ";
				$flag=false;
		}
		if($flag==false)
		{
			?>
				<script type="text/javascript">
				alert("<?php echo $msg ?>");
				window.location.href="SignUp.php";
				</script>
				<?php
			
		}
		else
		{
				$epassword=my_simple_crypt($mpassword,'e');
				$sql1="insert into studentdetail(StudentId,StudentName,Gender,Address,Age,isActive,isCreatedBy,isUpdatedBy,isNull,UserId,Password,EmailId,Token) values($mid,'$mname','$mgender','$maddress',$mage,0,$mid,$mid,0,'$musername','$epassword','$memail','$token')";
				sendMail($memail,$token);
				
			    $cmd=mysqli_query($con,$sql1) or die(mysqli_error($con));
		
			
				?>
				<script type="text/javascript">
				alert("Record Inserted and Check your mail to VERIFY!!!!!");
				window.location.href="slogin.php";
				
				</script>
				<?php
		}
					
		}
  
mysqli_close($con);
?>


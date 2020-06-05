<?php
require("config.php");
$mcatid=$_POST['ddlcategoryid'];
$msubcatname=$_POST['txtsubcategory'];
$msubcatid=$_POST['txtsubcatid'];
$msg="";
$flag=true;

// for checking whether username exist in database or not
$query = "SELECT * FROM subcategorymaster WHERE SubCategoryMasterName='$msubcatname'";
$cmd = mysqli_query($con,$query);
$number = mysqli_num_rows($cmd);
  if($number != 0)
  {
	  ?>
	  <script type="text/javascript">
	  alert("This Sub Category already exists");
	  //window.location.reload();
	  </script>
<?php
  }
  else
  {
		if(!$value=preg_match("/^[a-zA-Z ]{2,20}$/",$msubcatname))
		{
				$msg=$msg."Sub Category Name can only contain alphabets.<BR>";
				$flag=false;
		}
		
		if($flag==false)
		{
			echo $msg;
		}
		else
		{
				if($mcatid==-1)
				{
					?>
					<script type="text/javascript">
					alert("Please select proper category name!");
					</script>
					<?php
					include("addsubcategory.php");
				}
				else
				{
					echo $mcatid;
				$sql1="insert into subcategorymaster values($msubcatid,'$msubcatname',$mcatid,1,0,1,1)";
				echo $sql1;
			    $cmd=mysqli_query($con,$sql1) or die(mysqli_error($con));
				mysqli_close($con);
				?>
				<script type="text/javascript">
				alert("Record of subcategory Inserted");
				</script>
				<?php
					    header("Location: viewsubcategory.php"); 
				}
		}
  }

?>
	
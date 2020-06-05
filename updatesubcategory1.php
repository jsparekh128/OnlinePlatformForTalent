<?php
require("config.php");
$mcatid=$_POST['ddlcategoryid'];
$msubcatname=$_POST['txtsubcatname'];
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
	  window.location.href="viewsubcategory.php";
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
			
				$sql1="Update subcategorymaster set SubCategoryMasterName='$msubcatname',CategoryMasterId=$msubcatid, isUpdatedBy=1 where SubCategoryMasterId=$msubcatid";
				
			    $cmd=mysqli_query($con,$sql1) or die(mysqli_error($con));
				mysqli_close($con);
				?>
				<script type="text/javascript">
				alert("Record of subcategory Updated");
                window.location.href="viewsubcategory.php";
				</script>
				<?php
					    
				}
		}
  }

?>
	
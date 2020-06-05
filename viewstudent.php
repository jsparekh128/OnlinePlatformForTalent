<?php 
require("config.php");
$query="select * from studentdetail where isNull=0";
$result= mysqli_query($con,$query);
?>
 
<!DOCTYPE html>
<html>
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Student Details </title>
		<link rel="stylesheet" href="fancybox/jquery.fancybox.css">
		<style type="text/css">
.table-striped>tbody>tr:nth-child(odd)>td, 
.table-striped>tbody>tr:nth-child(odd)>th {
background-color: white; // 
}

.table-striped>tbody>tr:nth-child(even)>td, 
.table-striped>tbody>tr:nth-child(even)>th {
background-color: white; // 
}

.table-striped>thead>tr:nth-child(odd)>td, 
.table-striped>thead>tr:nth-child(odd)>th {
background-color: white; // 
}

.table-striped>thead>tr:nth-child(even)>td, 
.table-striped>thead>tr:nth-child(even)>th {
background-color: white; // 
}
</style>
<script src="js/jquery.min.js"></script>
<script>
               $("[data-fancybox]").fancybox(
                showCloseButton: true,
               );
            </script>
    </head>
	<?php
include("adminheader.php");
?>
<div class="gallery">
<div class="container-fluid">
             <div class="row">
                    <div class="col-12">
                        <div class="card">
                           <div class="table-rep-plugin">
                                    <div class="table-responsive">
                                        <table id="studenttable" class="table  table-striped">
                                         <thead>
            
											<tr>
											<th>StudentId</th>
											<th>StudentName</th>
											<th>Gender</th>
											<th> Address </th>
											<th> Age </th>
											<th> EmailId </th>
											<th> StartYear </th>
											<th> EndYear </th>
											<th> isActive </th>
											<th> isCreatedBy </th>
											<th> isUpdatedBy</th>
											<th> isNull </th>
											<th> UserId </th>
											<th> Bio </th>
											<th> ProfileImage </th>
											<th> VerificationFile </th>
											<th> Action </th>
											<th>Action</th>
											</tr>

										</thead>
		
			
										<tbody>
     
    <?php 
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>        
            <tr>
                <td><?php echo $rows['StudentId']; ?></td>
                <td><?php echo $rows['StudentName']; ?></td>
                <td><?php echo $rows['Gender']; ?></td>
                <td><?php echo $rows['Address']; ?></td>
				<td><?php echo $rows['Age']; ?></td>
				<td><?php echo $rows['EmailId']; ?></td>
				<td><?php echo $rows['StartYear']; ?></td>
				<td><?php echo $rows['EndYear']; ?></td>
				<?php
				if ($rows['isActive']=="1")
				{
				?>
				<td><a class ="btn btn-success" href="action.php?pscode=<?php echo $rows['StudentId'];?>"
					 onclick="return confirm('De-activate <?php echo $rows['StudentName']; ?>');"> Active </a></td>
					<?php
				}
			else
			{
			?>
				<td> <a class="btn btn-danger" href="action.php?pscode=<?php echo $rows['StudentId'];?>" onclick="return confirm('Activate <?php echo $rows['StudentName'];?>');"> Deactive</a></td>
					<?php
			}
					?>
				
				<td><?php echo $rows['isCreatedBy']; ?></td>
				<td><?php echo $rows['isUpdatedBy']; ?></td>
				<td><?php echo $rows['isNull']; ?></td>
				<td><?php echo $rows['UserId']; ?></td>
				<td><?php echo $rows['Bio']; ?></td>
				<?php if(is_null($rows['ProfileImage']))
					{
						?>
						<td><img src="images/profile.png" width="120px" height="120px" style="border-radius:50%;"/></td>
					
					<?php 
					}
					else
					{
						?>
						
						<td><img src="StudentIndex/<?php echo $rows['ProfileImage'];?>" width="120px" height="120px" style="border-radius:50%;"/></td>
						<?php
					}
					
				?>
				<td><a data-fancybox="gallery" href="StudentIndex/<?php echo $rows['VerificationFile']; ?>"><img src="StudentIndex/<?php echo $rows['VerificationFile']; ?>" width="100px" height="100px"/></a>
						
				<td><a class="btn btn-success waves-effect waves-light" href="updatestudent.php?pscode=<?php echo $rows['StudentId'];?>">Edit</a> </td>
				<td><a class="btn btn-danger waves-effect waves-light" href="sdelete.php?pscode=<?php echo $rows['StudentId'];?>">Delete</a> </td>
			
					</tr>
				
<?php
}

?>
            </tbody>
                  </table>
                                    </div>

                                </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container-fluid -->
        </div>
		</div>
	
		
	<?php
 include("adminfooter.php");
 ?>

 <script type="text/javascript">
      $(document).ready(
        function() {
          $('#studenttable').DataTable({
			"ordering": false
            
            
  });
		});
</script>

</body>
</html>
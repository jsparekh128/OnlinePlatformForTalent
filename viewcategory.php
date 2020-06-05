<?php 
require("config.php");
$query="select * from categorymaster where isActive=1";
$result= mysqli_query($con,$query);
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title> Category Detail </title>
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
    
       
    </head>
<?php
include("adminheader.php");
?>

<body>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive">
                                        <table id="tablecategory" class="table  table-striped">
                                            <thead>
                                            <tr>
                                                <th>CategoryId</th>
                                                <th> CategoryName </th>
                                                <th> isActive </th>
                                                <th> isCreatedBy </th>
                                                <th> isUpdatedBy</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>   
            
        
    <?php 
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>        <tbody>
                <tr>
                <td><?php echo $rows['CategoryMasterId']; ?></td>
                <td><?php echo $rows['CategoryMasterName']; ?></td>
				<?php
				if ($rows['isActive']==1)
				{
				?>
				<td> Active </td>
			<?php
			}
			else
			{
			?>
				<td> Deactive </td>
<?php
			}
?>
				<td><?php echo $rows['isCreatedBy']; ?></td>
				<td><?php echo $rows['isUpdatedBy']; ?></td>
				<td><a class="btn btn-success" href="updatecategory.php?pocode=<?php echo $rows['CategoryMasterId'];?>">Edit</a> </td>
				<td><a class="btn btn-danger" href="deletecategory.php?pocode=<?php echo $rows['CategoryMasterId'];?>">Delete</a> </td>
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
	<?php
 include("adminfooter.php");
 ?>
 <script type="text/javascript">
   $(document).ready(
        function() {
          $('#tablecategory').DataTable({
            "ordering": false
            
           
  });
		});
    </script>
    
</body>
</html>
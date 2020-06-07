<?php 
require("config.php");
$query="select * from subcategorymaster s,categorymaster c where s.CategoryMasterId=c.CategoryMasterId and s.isActive=1 and s.isNull=0";
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
                                        <table id="tablesubcategory" class="table  table-striped">
                                            <thead>
                                            <tr>
       
                                                <th>SubCategoryId</th>
                                                <th>SubCategoryName</th>
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
    ?>        
            <tbody>
            <tr>
                <td><?php echo $rows['SubCategoryMasterId']; ?></td>
				<td><?php echo $rows['SubCategoryMasterName']; ?></td>
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
				<td style="text-align:center"><?php echo $rows['isCreatedBy']; ?></td>
				<td style="text-align:center"><?php echo $rows['isUpdatedBy']; ?></td>
				<td><a class="btn btn-success" href="updatesubcategory.php?psubcatcode=<?php echo $rows['SubCategoryMasterId'];?>">Edit</a> </td>
				<td><a class="btn btn-danger" href="deletesubcategory.php?psubcatcode=<?php echo $rows['SubCategoryMasterId'];?>">Delete</a> </td>
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
          $('#tablesubcategory').DataTable({
           
            
            "ordering": false
  });
		});

    </script>
    
</body>
</html>
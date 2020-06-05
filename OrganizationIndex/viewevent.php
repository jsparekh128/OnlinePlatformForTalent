<?php 
require("config.php");
if(session_status()==PHP_SESSION_NONE)
{
  session_start();

}
 if(isset($_SESSION['OrganizationId']))
  {
    $morgid=$_SESSION['OrganizationId'];
  }
  else
  {
    header("Location: ologin.php");
  }

$query="select e.EventId,e.EventName,e.EventStartDate,e.EventEndDate,c.CategoryMasterName,s.SubCategoryMasterName,e.FileType,e.NumberOfFiles,e.EventDescription from events e,CategoryMaster c,SubCategoryMaster s where e.CategoryMasterId=c.CategoryMasterId and e.SubCategoryMasterId=s.SubCategoryMasterId and e.OrganizationId=$morgid and e.isActive=1 and e.isNull=0";
$result= mysqli_query($con,$query);
?>
 
<!DOCTYPE html>
<html>
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Events Details </title>
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
        background-color: black; // 
        }

.table-striped>thead>tr:nth-child(even)>td, 
.table-striped>thead>tr:nth-child(even)>th {
   background-color: white; // 
 }

        </style>

    </head>
	<?php
include("organizationheader.php");
?>
        
        <div class="table responsive">
 <table id="eventtable" class="table  table-striped">
                                            <thead>
            
											<tr>
											<th> EventId </th>
											<th> Event Name </th>
											<th> Start Date </th>
											<th> End Date </th>
											<th> Category Name </th>
											<th> Sub Category Name </th>
											<th> File Type </th>
											<th> No. of Files </th>
											<th> Description </th>
											<th> Action </th>
											<th>Action</th>
											</tr>
											</thead>
		
			
		
     
    <?php 
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>        
	<tbody>
            <tr>
                <td><?php echo $rows['EventId']; ?></td>
                <td><?php echo $rows['EventName']; ?></td>
                <td><?php echo $rows['EventStartDate']; ?></td>
                <td><?php echo $rows['EventEndDate']; ?></td>
				<td><?php echo $rows['CategoryMasterName']; ?></td>
				<td><?php echo $rows['SubCategoryMasterName']; ?></td>
                <?php if($rows['FileType']=="1")
                         {           
                    ?>
                        <td>Images</td>
                <?php
                         }
                else
                {
                    ?>
                    <td>Videos</td>
                    <?php
                }
                
                ?>
                <td><?php echo $rows['NumberOfFiles']; ?></td>
				<td><?php echo $rows['EventDescription']; ?></td>
				<td><a class="btn btn-success waves-effect waves-light" href="updateevent.php?pecode=<?php echo $rows['EventId'];?>">Edit</a> 
				<td><a class="btn btn-danger waves-effect waves-light" href="deleteevent.php?pecode=<?php echo $rows['EventId'];?>">Delete</a> </td>
            </tr>
  </tbody>
  <?php
        }
        ?>
                                            
  </table>
  </div>

    </div>
		
	<?php
 include("organizationfooter.php");
 ?>

<script type="text/javascript">
      $(document).ready(
        function() {
          $('#eventtable').DataTable({
           "ordering":false,
            'autoWidth':true,
            scrollX:200,
  });
		});
		</script>
</body>

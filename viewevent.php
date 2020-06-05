<?php 
require("config.php");

$query="select e.EventId,e.EventName,e.EventStartDate,e.EventEndDate,c.CategoryMasterName,s.SubCategoryMasterName,e.FileType,e.NumberOfFiles,e.EventDescription from events e,CategoryMaster c,SubCategoryMaster s where e.CategoryMasterId=c.CategoryMasterId and e.SubCategoryMasterId=s.SubCategoryMasterId";
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
  <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                                <div class="table-rep-plugin">
                                <div class="table responsive">
                                    <table id="eventtable" class="table  table-striped">
                                            <thead>
            
											<tr>
											<th> EventId </th>
											<th> Event Name </th>
											<th> Start Date </th>
											<th> End Date </th>
											<th> Category </th>
											<th> Sub Category</th>
											<th> File Type </th>
											<th> No.ofFiles </th>
                                            <th>Total Participants</th>
											<th> Description </th>
											
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
                <td align="center"><?php echo $rows['NumberOfFiles']; ?></td>
               <?php
                    $meventid=$rows['EventId'];
                    $sql2="select count(ParticipationMasterId) as ParticipationMasterId from participationmaster where EventId=$meventid";
                    $cmd2=mysqli_query($con,$sql2);
                    $result1=mysqli_fetch_array($cmd2);
               ?>
               <td align="center"><?php echo $result1['ParticipationMasterId']; ?></td>

				<td><?php echo $rows['EventDescription']; ?></td>
            </tr>
  </tbody>
  <?php
        }
        ?>
                                            
  </table>
  </div>

</div>

</div>
</div> <!-- end col -->
</div> <!-- end row -->

  </div>

    </div>
		
	<?php
 include("adminfooter.php");
 ?>

<script type="text/javascript">
      $(document).ready(
        function() {
          $('#eventtable').DataTable({
            
            "ordering": false
            
  });
		});
		</script>
</body>

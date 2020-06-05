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

$query="select e.EventId,e.EventName,e.EventStartDate,e.EventEndDate,c.CategoryMasterName,s.SubCategoryMasterName,w.StudentId from events e,categorymaster c,subcategorymaster s,winnermaster w where e.CategoryMasterId=c.CategoryMasterId and e.SubCategoryMasterId=s.SubCategoryMasterId and e.EventId=w.EventId and e.OrganizationId=$morgid and e.isActive=1 and e.isNull=0";
$result= mysqli_query($con,$query);
?>
 
<!DOCTYPE html>
<html>
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Events Details </title>
        <style type="text/css">
        div.dataTables_length select {
width: 100px;
}

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
                                            <th>Student Name </th>
											
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
                    <?php 

                     $mstudid=$rows['StudentId'];
                     $sql="Select StudentName from studentdetail where StudentId=$mstudid";
                     $cmd1=mysqli_query($con,$sql);
                     $rows2=mysqli_fetch_array($cmd1);

                    ?>
                <td><?php echo $rows2['StudentName']; ?></td>
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
           
  });
		});
		</script>
</body>

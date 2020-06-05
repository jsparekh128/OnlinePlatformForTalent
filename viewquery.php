<?php 
require("config.php");
$query="Select * from contact";
$result= mysqli_query($con,$query);
?>
 
<!DOCTYPE html>
<html>
    <head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Query Details </title>
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
											<th> Id </th>
											<th> Name </th>
											<th> Email Id </th>
											<th> Subject </th>
											<th> Reply</th>
											<th> Action</th>
											</tr>
											</thead>
		
			
		
     
    <?php 
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>        
	<tbody>
            <tr>
                <td><?php echo $rows['Id']; ?></td>
                <td><?php echo $rows['Name']; ?></td>
                <td><?php echo $rows['EmailId']; ?></td>
                <td><?php echo $rows['Query']; ?></td>
				
                <?php if($rows['Reply']=="1")
                         {           
                    ?>
                        <td><a class="btn btn-success">Given</td></a>
                <?php
                         }
                else
                {
                    ?>
                    <td><a class="btn btn-danger">Not Given</td></a>
                    <?php
                }
                
               ?>
               <?php
                if($rows['Reply']=="0")
               {
                 ?>
                <td><a class="btn btn-success waves-effect waves-light" href="viewquery1.php?pqcode=<?php echo $rows['Id'];?>">Give Reply</a> </td>
               
                <?php
               }
               ?>
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

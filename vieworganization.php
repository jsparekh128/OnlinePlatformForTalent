<?php 
require("config.php");
$query="select * from organizationdetail";
$result= mysqli_query($con,$query);
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title> Organization Detail </title>
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
                        <div class="card">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="organizationtable" class="table  table-striped">
                                            <thead>
        <tr>
            <th> OrganizationId </th>
            <th> OrganizationName </th>
            <th>City</th>
            <th>MobileNo</th>
			<th> Address </th>
            <th> EmailId </th>
            <th>OrganizationImage</th>
			<th> isActive </th>
			<th> isNull </th>
			<th> isCreatedBy </th>
            <th> isUpdatedBy</th>
            <th> Action </th>
			<th> Action</th>
        </tr>
</thead>
    <?php 
        while($rows=mysqli_fetch_assoc($result))
        {
    ?>    
    <tbody>    
            <tr>
                <td><?php echo $rows['OrganizationId']; ?></td>
                <td><?php echo $rows['OrganizationName']; ?></td>
                <td><?php echo $rows['City']; ?></td>
                <td><?php echo $rows['MobileNo']; ?></td>
                <td><?php echo $rows['Address']; ?></td>
                <td><?php echo $rows['EmailId']; ?></td>
                <?php if(is_null($rows['OrganizationImage']))
                    {
                        ?>
                        <img src="images/profile.png" width="120px" height="120px" style="border-radius:50%;"/>
                    
                    <?php 
                    }
                    else
                    {
                        ?>
                        
                        <td><img  src="OrganizationIndex/<?php echo $rows['OrganizationImage'];?>" width="120px" height="120px" style="border-radius:50%;"/></td>
                        
                        <?php
                    }
                    ?>


				<?php
				if ($rows['isActive']==1)
				{
                        ?>
                        <td><a class="btn btn-success">Active </td></a>
                         <?php
			}
			else
			{
                        ?>
                            <td> Deactive</td>
                        <?php
			}
                        ?>
                <td style="text-align:center"><?php echo $rows['isNull']; ?></td>
				<td style="text-align:center"><?php echo $rows['isCreatedBy']; ?></td>
				<td style="text-align:center"><?php echo $rows['isUpdatedBy']; ?></td>
				
				<td><a class="btn btn-success" href="updateorganization.php?pocode=<?php echo $rows['OrganizationId'];?>">Edit</a> 
				<td><a class="btn btn-danger" href="odelete.php?pocode=<?php echo $rows['OrganizationId'];?>">Delete</a> </td>
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
          $('#organizationtable').DataTable({
           
            "ordering": false
            
  });
		});
</script>
    
</body>
</html>
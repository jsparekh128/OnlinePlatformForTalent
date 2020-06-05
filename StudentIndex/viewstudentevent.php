<?php
include("studentheader.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/font-awesome.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>


<body>
<div class="row">
                <?php
                    $date1=date('Y-m-d'); 
                    $todaydate=date('Y-m-d', strtotime($date1));
                    $sql="Select e.EventId,e.EventName,e.EventDescription,e.EventStartDate,e.EventEndDate,c.CategoryMasterName,s.SubCategoryMasterName,o.OrganizationName,o.OrganizationImage,e.FileType,e.NumberOfFiles from events e,categorymaster c,subcategorymaster s,organizationdetail o where e.CategoryMasterId=c.CategoryMasterId and e.SubCategoryMasterId=s.SubCategoryMasterId and e.OrganizationId=o.OrganizationId and e.EventEndDate > '$todaydate' and e.isActive=1 and e.isNull=0";
                    $cmd=mysqli_query($con,$sql);
                    $num=mysqli_num_rows($cmd);
                    if($num==0)
                    {
                        ?>
                         <div class="alert alert-danger" role="alert">
                            <strong>Oh snap!</strong> Currently there are no events
                        </div>
                        <?php
                    }
                    else
                    {
                        while($rows=mysqli_fetch_array($cmd))
                        {
                            ?>
                         <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                    <strong>Oh Wow!</strong>
                                        <h4 class="card-title font-16 mt-0"><?php echo $rows['EventName']; ?></h4>
                                        <p class="card-text"><?php echo $rows['EventDescription']; ?></p>
                                        <p class="card-text">Start Date is: <strong><?php echo $rows['EventStartDate'];?></strong> and End Date is: <strong><?php echo $rows['EventEndDate'];?></p></strong>
                                        <p class="card-text">Held By: <strong><?php echo $rows['OrganizationName'];?></p></strong>
                                        <p class="card-text">File Type Required: <strong><?php
                                         if($rows['FileType']==1)
                                            echo "Images";
                                          else
                                            echo "Videos";
                                         ?></p></strong>
                                        <p class="card-text">Number of files Required:<strong><?php echo $rows['NumberOfFiles'];?></p></strong>
                                        <p class="card-text">Category:<strong><?php echo $rows['CategoryMasterName'];?></p></strong>
                                        <p class="card-text">Sub Category:<strong><?php echo $rows['SubCategoryMasterName'];?></p></strong>
                                    </div>
                                    <br/>
                            
                                    <a href="addstudentparticipation.php?pecode=<?php echo $rows['EventId']; ?>" class="btn btn-primary waves-effect waves-light">Participate</a>
                                </div>

                                </div><!-- end col -->
                                <?php
                        }
                    }
                ?>
                </div>

</body>
                </div>
<?php
include("studentfooter.php");
?>

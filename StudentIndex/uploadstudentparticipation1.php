<?php
require("config.php");
include("studentheader.php");
$mdate=date('Y-m-d');
$todaydate=date('Y-m-d',strtotime($mdate));
$mstudid=$_SESSION['StudId'];
if(isset($_POST['Submit']))
{
    $mddlevent=$_POST['ddlevent'];
    if($mddlevent=="-1")
    {
        ?>
            <script type="text/javascript">
                alert("Please select proper event name");
                window.location.href="uploadstudentparticipation.php";
            </script>
                <?php
    }
    else
    {
        $_SESSION['SEventId']=$mddlevent;
    }

}
else
{
    if(isset($_SESSION['SEventId']))
    {
    
        $mddlevent=$_SESSION['SEventId'];
    }
    else
    {
        header("Location: uploadstudentparticipation.php");
    }
}
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
  <link rel="stylesheet" href="fancybox/jquery.fancybox.css">

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<!-- Fancybox JS library -->



<script>
               $("[data-fancybox]").fancybox(
                showCloseButton: true,
               );
            </script>

  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<div class="alert alert-danger" role="alert">
         <strong>INSTRUCTIONS!<br/> 
         --Your gallery is filtered and displayed according to the category and sub-category required by the event.
        <br/>
        --So you can select easily from your profile.
        <br/>
        --If it is not in your gallery, please upload first in your gallery and then it will be visibile here
        <br/>
        --Select checkboxes to submit your file <br/>
        --Submit button is at the bottom! <br/>
        --Once uploaded,you wont be allow to upload again. So BE CAREFUL!!!!!!!!!</strong>
        
    </div>
    <br/>

<?php
  $sql="Select FileType,NumberOfFiles from events where EventId=$mddlevent";
            $cmd=mysqli_query($con,$sql);
            $rows=mysqli_fetch_array($cmd);
            $mfiletype=$rows['FileType'];
            $mnumberoffiles=$rows['NumberOfFiles'];
         

            $sql1="Select CategoryMasterId,SubCategoryMasterId from events where EventId=$mddlevent";
            $cmd1=mysqli_query($con,$sql1);
            $rows1=mysqli_fetch_array($cmd1);
            $mcatid=$rows1['CategoryMasterId'];
            $msubcatid=$rows1['SubCategoryMasterId'];
       
            $sql2="Select * from uploadmaster where CategoryMasterId=$mcatid and SubCategoryMasterId=$msubcatid and UploadFileType=$mfiletype";
            $cmd2=mysqli_query($con,$sql2);
            ?>



            
<div class="alert alert-primary" role="alert">
        File Required: <?php echo $mnumberoffiles; ?> <br/>   
        File type: <?php 
        if($mfiletype==1)
        {
            ?> Images <?php
        }
        else
        {
            ?> Videos <?php
        }
        ?>

</div>


 <div class="gallery">
 <form name="f1" action="uploadstudentparticipation2.php" method="post" enctype="multipart/form-data">
 <input type="hidden" name="hdfilenumber" value="<?php echo $mnumberoffiles; ?>">
        <table>
            <tr>
                <th>Sr. No</th>
                <th>File Path</th>
                <th>Action</th>
            </tr>
            <tr>

      <?php
        while($rows2=mysqli_fetch_assoc($cmd2))
        {		    
            ?>
             <td><?php echo $rows2['UploadMasterId']; ?></td>
             <?php
                if($rows2['UploadFileType']=="1")
                {
                    ?>
                
                   <td><a href="<?php echo $rows2['UploadPath']; ?>" data-fancybox="gallery">
                    <img src="<?php echo $rows2['UploadPath'];?>" width="150px" height="150px">
                    </td>
                    <?php
                }
                else
                {
                    ?>
                    <td><video width="100" height="100" controls> 
                        <source src="<?php echo $rows2['UploadPath']; ?>" type="video/mp4">
                    </video></td>
                    <?php
                }
                ?>
                <td><input type="checkbox" class="form-control" name="chckFileUpload[]" value="<?php echo $rows2['UploadPath']; ?>"></td>
                </tr>
                <?php
    
         }


    
    ?>
    </table>
    </div>
    <input type="submit" class="btn btn-info" name="Submit" value="Submit">
    </form>
    
<?php
    include("studentfooter.php");

 ?>

<?php
require("config.php");
include("studentheader.php");
?>

<?php
if(session_status()==PHP_SESSION_NONE)
{
session_start();

}
    if(isset($_SESSION['StudId']))
    {
        $mstudid=$_SESSION['StudId'];
        $sql="Select * from uploadmaster where StudentId=$mstudid and isActive=1 and isNull=0 and UploadFiletype=1 ORDER BY UploadDate desc";
        $cmd=mysqli_query($con,$sql);

    }
    else
    {
        header("Location: slogin.php");
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="fancybox/jquery.fancybox.css">

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
<!-- Fancybox JS library -->
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
  .gallery img {
    width:20%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
}

  </style>
  

  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
            <script>
               $("[data-fancybox]").fancybox();
            </script>
</head>


<body>
<h3>Image Gallery View</h3>
<hr>
<div class="gallery">
<?php
    $count=mysqli_num_rows($cmd);
    if($count > 0)
    {
                while($rows=mysqli_fetch_array($cmd))
                 {
                        $imageURL=$rows['UploadPath'];
                        ?>
                                    <a href="<?php echo $imageURL; ?>" data-fancybox="gallery">
                                    <img src="<?php echo $imageURL; ?>" alt=""/> 
                         </a>
                         <?php
                
                 }
                            
                        
      }
      ?>
      </body>
      </div>
      </div>
    <?php
    include("studentfooter.php");

    ?>
   


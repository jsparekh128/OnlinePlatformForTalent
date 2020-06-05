<?php
require("config.php");
if (isset($_POST["Upload"])) {
	$mtoken=$_POST['hdtoken'];
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["fileUpload"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["fileUpload"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["fileUpload"]["tmp_name"])) {
       ?>
	  <script type="text/javascript">
	  alert("No file selected! Please select a file");
	  window.location.href="VerificationUpload.php";
	  </script>
<?php
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
      ?>
	  <script type="text/javascript">
	  alert("ONLY JPEG AND PNG ARE ALLOWED");
	  window.location.href="VerificationUpload.php";
	  </script>
<?php
       
        
    }    // Validate image file size
    else if (($_FILES["fileUpload"]["size"] > 2000000)) {
       ?>
	  <script type="text/javascript">
	  alert("FILE SIZE CANNOT EXCEEDS 2MB");
	  window.location.href="VerificationUpload.php";
	  </script>
<?php
    }    // Validate image file dimension
  
     else {
        $target = "VerificationUploads/" . basename($_FILES["fileUpload"]["name"]);
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target)) {
			$sql="Update studentdetail set VerificationFile='$target' where Token='$mtoken'";
			$cmd=mysqli_query($con,$sql) or die(mysqli_error());
			
           ?>
	  <script type="text/javascript">
	  alert("YOUR FILE IS UPOADED! PlEASE WAIT FOR VERIFICATION");
	  window.location.href="slogin.php";
	  </script>
<?php
         
        } else {
          ?>
	  <script type="text/javascript">
	  alert("Some error in uploading!");
	  window.location.href="VerificationUpload.php";
	  </script>
<?php
        }
    }
}
?>
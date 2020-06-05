<?php

if (isset($_POST["btnupdate"]))
 {
    require("config.php");

    $msname=$_POST['txtsname'];
    $mstudid=$_POST['hdstudid'];
    $memail=$_POST['txtemail'];
    $mage=$_POST['txtage'];
    $madd=$_POST['txtadd'];
    $mbio=$_POST['txtbio'];
    $muserid=$_POST['txtuser'];
    $sql="Update studentdetail set StudentName='$msname', Age=$mage, Address='$madd', Bio='$mbio', EmailId='$memail', UserId='$muserid' where StudentId=$mstudid";
    $result=mysqli_query($con,$sql);
    
  
    // Validate file input to check if is not empty

    if ($_FILES["fileUpload"]["size"] != 0)
        {
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
    
            // cover_image is empty (and not an error)

            // Validate file input to check if is with valid extension
             if (! in_array($file_extension, $allowed_image_extension))
              {
               ?>
               <script type="text/javascript">
               alert("ONLY JPEG AND PNG ARE ALLOWED");
               window.location.href="studentprofile.php";
               </script>
         <?php
                 
             }    // Validate image file size
             else if (($_FILES["fileUpload"]["size"] > 2000000)) {
                ?>
               <script type="text/javascript">
               alert("FILE SIZE CANNOT EXCEEDS 2MB");
               window.location.href="studentprofile.php";
               </script>
         <?php
                 }    // Validate image file dimension
           
              else {

                    $target = "ProfileImages/" . basename($_FILES["fileUpload"]["name"]);


                    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target))
                     {
                     $sql1="Update studentdetail set ProfileImage='$target' where StudentId=$mstudid";
                     
                     $cmd1=mysqli_query($con,$sql1) or die(mysqli_error());
                     
                    ?>
                            <script type="text/javascript">
                            alert("YOUR PROFILE IS UPDATED!");
                            window.location.href="studentprofile.php";
                            </script>
         <?php
                  
                     } 

                     else
                   {
                         ?>
                        <script type="text/javascript">
                        alert("Some error in uploading!");
                        window.location.href="studentprofile.php";
                        </script>
                        <?php
                    }
             }
  
        }
        else
        {
            ?>
                        <script type="text/javascript">
                        alert("Your profile is updated!");
                        window.location.href="studentprofile.php";
                        </script>
                        <?php
        }
             
    
}
mysqli_close($con);


?>

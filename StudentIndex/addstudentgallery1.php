<?php
require("config.php");
     if(session_status()==PHP_SESSION_NONE)
    {
    session_start();

    }
        if(isset($_SESSION['StudId']))
        {
            $mstudid=$_SESSION['StudId'];
            
        }
        else
        {
            header("Location: slogin.php");
        }

if(isset($_POST['Upload']))
{
        $mcatid=$_POST['ddlcategory'];
        $msubcatid=$_POST['ddlsubcategory'];   
        $mtype=$_POST['ddltype'];
      
        if($mtype=="-1") 
        {
                ?>
                         <script type="text/javascript">
                        alert("Please select type of file");
                        window.location.href="addstudentgallery.php";
                        </script>
                          <?php

        }
        //for Image Uploading
        else if($mtype=="1")
        {

       
           foreach($_FILES["fileUpload"]["tmp_name"] as $key=>$image)
        {
            $fileinfo = @getimagesize($_FILES["fileUpload"]["tmp_name"][$key]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            
            $allowed_image_extension = array(
                "png",
                "jpg",
                "jpeg",
                "JPG",
                "JPEG"
            );
    
    // Get image file extension
             $file_extension = pathinfo($_FILES["fileUpload"]["name"][$key], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
                if (! file_exists($_FILES["fileUpload"]["tmp_name"][$key])) 
                {
                    ?>
                    <script type="text/javascript">
                    alert("Please select a different image");
                    window.location.href="addstudentgallery.php";
                    </script>
                     <?php
                } 
                   // Validate file input to check if is with valid extension
                else if (! in_array($file_extension, $allowed_image_extension)) 
                {
                ?>
                        <script type="text/javascript">
                        alert("ONLY JPG, JPEG AND PNG ARE ALLOWED");
                        window.location.href="addstudentgallery.php";
                        </script>
                          <?php
       
        
                 }    // Validate image file size
                else if (($_FILES["fileUpload"]["size"][$key]> 2000000))
                 {
                    ?>
                    <script type="text/javascript">
                    alert("FILE SIZE CANNOT EXCEEDS 2MB");
                    window.location.href="addstudentgallery.php";
                    </script>
                      <?php
                }    // Validate image file dimension
  
                        else {
                                $target = "UploadFiles/".basename($_FILES["fileUpload"]["name"][$key]);
                                $date = date('Y-m-d');
                                $time= date('H:i:s');
                                
                                if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"][$key], $target))
                                {
                                        $query="Insert into uploadmaster(StudentId,CategoryMasterId,SubCategoryMasterId,UploadPath,UploadDate,UploadTime,isActive,isNull,isUpdatedBy,isCreatedBy,UploadFileType) values($mstudid,$mcatid,$msubcatid,'$target','$date','$time',1,0,$mstudid,$mstudid,$mtype)";
                                        $cmd=mysqli_query($con,$query) or die(mysql_error());
                                        header("Location: viewstudentgallery.php");
                        
                                } 
                             else
                                {
                                ?>
                                        <script type="text/javascript">
                                        alert("Some error in uploading!");
                                        window.location.href="addstudentgallery.php";
                                        </script>
                                        <?php
                                }
                         }
                         }
                  }

                  //For Video Uploading
                  else
                  {
                        foreach($_FILES["fileUpload"]["tmp_name"] as $key=>$image)
                        {
                            $fileinfo = @getimagesize($_FILES["fileUpload"]["tmp_name"][$key]);
                            $width = $fileinfo[0];
                            $height = $fileinfo[1];
                            
                            $allowed_image_extension = array(
                                "mkv",
                                "mov",
                                "mp4",
                                "avi",
                                "3gp",
                                "mpeg",
								"mts"
                            );
                    
                    // Get image file extension
                             $file_extension = pathinfo($_FILES["fileUpload"]["name"][$key], PATHINFO_EXTENSION);
                    
                    // Validate file input to check if is not empty
                                if (! file_exists($_FILES["fileUpload"]["tmp_name"][$key])) 
                                {
                                    ?>
                                    <script type="text/javascript">
                                    alert("Please select a different Video");
                                    window.location.href="addstudentgallery.php";
                                    </script>
                                     <?php
                                } 
                                   // Validate file input to check if is with valid extension
                                else if (! in_array($file_extension, $allowed_image_extension)) 
                                {
                                ?>
                                        <script type="text/javascript">
                                        alert("ONLY MKV,MP4,MPEG,3GP,MOV,AVI FILES ARE ALLOWED");
                                        window.location.href="addstudentgallery.php";
                                        </script>
                                          <?php
                       
                        
                                 }    // Validate image file size
                                else if (($_FILES["fileUpload"]["size"][$key]> 500000000))
                                 {
                                         echo $size=$_FILES["fileUpload"]["size"][$key];
                                    ?>
                                    <script type="text/javascript">
                                    alert("FILE SIZE CANNOT EXCEEDS 300MB");
                                    window.location.href="addstudentgallery.php";
                                    </script>
                                      <?php
                                }    // Validate image file dimension
                  
                                        else {
                                                $target = "UploadFiles/".basename($_FILES["fileUpload"]["name"][$key]);
                                                $date = date('Y-m-d');
                                                $time= date('H:i:s');
                                                
                                                if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"][$key], $target))
                                                {
                                                        $query="Insert into uploadmaster(StudentId,CategoryMasterId,SubCategoryMasterId,UploadPath,UploadDate,UploadTime,isActive,isNull,isUpdatedBy,isCreatedBy,UploadFileType) values($mstudid,$mcatid,$msubcatid,'$target','$date','$time',1,0,$mstudid,$mstudid,$mtype)";
                                                        $cmd=mysqli_query($con,$query) or die(mysql_error());
                                                        header("Location: viewvideogallery.php");
                                                      
                                                
                                                } 
                                             else
                                                {
                                                ?>
                                                        <script type="text/javascript">
                                                        alert("Some error in uploading!");
                                                        window.location.href="addstudentgallery.php";
                                                        </script>
                                                        <?php
                                                }
                                         }
                                    }  
                  }
             
            }


<?php
include("organizationheader.php");
require("config.php");
$meventid=$_GET['pecode'];
$query = "select * from events where EventId=$meventid";
$cmd = mysqli_query($con,$query);
$rows=mysqli_fetch_array($cmd);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Organization Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/font-awesome.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>


<h3>Update Event Details</h3>
<div class="container">
<div class="form control">
    
    <div class="row">
            <div class="col-lg-6">
                <form NAME="form_update" ACTION="updateevent1.php" METHOD="post" class="form1">
                </div>
                <div class="col-lg-6">
                </div>
     </div>


     <div class="row">
            <div class="col-lg-6">
            <label>Event Id</label>
            <INPUT type="text" value="<?php echo $meventid; ?>"  name="txteventid" readonly=READONLY class="form-control">
            </div>
        <div class="col-lg-6">
        <label>Event Name</label>
            <INPUT type="text"   name="txteventname" class="form-control" value="<?php echo $rows['EventName']; ?>" Required>
            </div>
        </div>
     </div>

        <div class="row">
            <div class="col-lg-6">
                <label>Start Date</label>
                  <INPUT type="date" NAME="dateStart" id="dateStart" onChange="SDate()" value="<?php echo $rows['EventStartDate']; ?>" class="form-control" Required/>
            </div>
              <div class="col-lg-6">
                <label>End Date</label>
                  <INPUT type="date" NAME="dateEnd" id="dateEnd" onChange="EDate()" value="<?php echo $rows['EventEndDate'];?>"  class="form-control" Required/>
              </div>
        </div>
<br>
        <div class="row">
            <div class="col-lg-6">
            <label>Select  Category:</label>
                    <select name="ddlcategory" id="ddlcategory" class="form-control action" Required>
                    <option value="-1">--Select Category--</option>
                     <?php
                                    $query="Select * from CategoryMaster";
                                    $cmd1=mysqli_query($con,$query);

                                    while($row=mysqli_fetch_array($cmd1))
                                    { ?>
                                    <option value="<?php echo $row['CategoryMasterId']; ?>" 
                                    <?php if($rows['CategoryMasterId'] == $row['CategoryMasterId']) 
                                    {
                                         echo "selected"; 
                                    } 
                                    ?>>
                                    <?php echo $row["CategoryMasterName"]; ?> </option>
                                    <?php
                                    }
                                         
                                    ?>
                                    </select>
                     </div> 
                     
             <div class="col-lg-6">
                <label>Select Sub Category:</label>
               
                    <select name="ddlsubcategory" id="ddlsubcategory" class="form-control" Required>
                    <option value="-1">--Select Sub Category--</option>
                    <?php
                                    $mcatid=$rows['CategoryMasterId'];
                                    $query="Select * from SubCategoryMaster";
                                    $cmd1=mysqli_query($con,$query);

                                    while($row=mysqli_fetch_array($cmd1))
                                    { 
                                        ?>
                                    <option value="<?php echo $row['SubCategoryMasterId']; ?>"
                                    <?php if($rows['SubCategoryMasterId'] == $row['SubCategoryMasterId']) 
                                    {
                                         echo "selected"; 
                                    } 
                                    ?> ><?php echo $row["SubCategoryMasterName"]; ?> </option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                </div> 
            </div>
        
        <div class="row">
            <div class="col-lg-6">
                <label>Select Type: </label>
                <select name="ddltype" id="ddltype" class="form-control action1" Required>
                    <option value="-1">--Select type--</option>
                    <option value="1"
                    <?php 
                    if($rows['FileType'] == "1") 
                 {
                  echo "selected"; 
                 } 
                    ?> >Image</option>
                    <option value="2"  <?php 
                    if($rows['FileType'] == "2") 
                 {
                  echo "selected"; 
                 } 
                    ?> >Videos</option>
                    </select>
            </div>
            <div class="col-lg-6">
                <label>Select No of new Files: </label>
                <select name="ddlfilenumber" id="ddlfilenumber"  class="form-control action1" Required>

                    <option value="-1">--Select type--</option>
                    <?php
                    if($rows['FileType'] == "2")
                    {
                        ?>
                        <option value="1">1</option>
                        <?php

                    }else
                    {
                        ?>
                        <option value="1" <?php if($rows['NumberOfFiles']=="1")
                        {
                            echo "selected";
                        }?>>1</option>
                        <option value="2" <?php if($rows['NumberOfFiles']=="2")
                        {
                            echo "selected";
                        }?>>2</option>
                        <option value="3"
                        <?php if($rows['NumberOfFiles']=="3")
                        {
                            echo "selected";
                        }?>>3</option>
                        <?php
                    }
                    ?>
                    </select>
            </div>
    </div>
    

    <div class="row">
            <div class="col-lg-12">
                <label>Event Description</label>
                 <Textarea rows="3" cols="30" name="txtdescription" class="form-control" Required><?php echo $rows['EventDescription']; ?></Textarea>
            </div>
    </div>
    <br/>


        <div class="row">
            <div class="col-md-4">
                <INPUT TYPE="submit" class="btn btn-success" NAME="btnupdate" VALUE="UPDATE"/>
            </div>
        </div>
</form>

<?php
mysqli_close($con);
?>

</div>
</div>

<?php
 include("organizationfooter.php");
 ?>

         <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != "-1")
  {
   var action = $(this).attr("id");
   var query = $(this).val();

   var result = '';
   if(action == "ddlcategory")
   {
    result = 'ddlsubcategory';
   }
   $.ajax({
    url:"getSubCategory.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});

$(document).ready(function(){
 $('.action1').change(function(){
  if($(this).val() != "-1")
  {
   var action = $(this).attr("id");
   var query = $(this).val();

   var result = '';
   if(action == "ddltype")
   {
    result = 'ddlfilenumber';
   }
   $.ajax({
    url:"getFileNumber.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});

function SDate() {
var UserDate = document.getElementById("dateStart").value;
var ToDate = new Date();
  
if (new Date(UserDate) < ToDate)
 {
    alert("The Start Date must be Bigger or Equal to today date");
    document.getElementById("dateStart").value="";
    
}

    return true;
}

function EDate() {
var UserDate = document.getElementById("dateEnd").value;
var ToDate = new Date();
  
if (new Date(UserDate) < ToDate) {
    alert("The End Date must be Bigger or Equal to today date");
    document.getElementById("dateEnd").value="";
}

    return true;
}



</script>



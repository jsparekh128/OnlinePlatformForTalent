<?php
require("config.php");
if(isset($_POST["action"]))
{

 $output = '';
 if($_POST["action"] == "ddlcategory")
 {
     $categoryid=$_POST["query"];
  $query = "SELECT SubCategoryMasterId,SubCategoryMasterName FROM subcategorymaster WHERE CategoryMasterId=$categoryid and isActive=1 and isNull=0 GROUP BY SubCategoryMasterId";
  
  $result = mysqli_query($con,$query);
  $output .= '<option value="-1">--Select Sub Category--</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["SubCategoryMasterId"].'">'.$row["SubCategoryMasterName"].'</option>';
  }
 }
 echo $output;
}
?>

<?php
if(isset($_POST["action"]))
{

 $output = '';
 if($_POST["action"] == "ddltype")
 {
     $typpeid=$_POST["query"];
     if($typpeid=="2")
     {
        $output .= '<option value="-1">--Select Number of Files--</option>';
        $output .= '<option value="1">1</option>';
     }
     else if($typpeid=="1")
     {
        $output .= '<option value="-1">--Select Number of Files--</option>';
        $output .= '<option value="1">1</option>';
        $output .= '<option value="2">2</option>';
        $output .= '<option value="3">3</option>';
     }
   
  }

 echo $output;
}
?>

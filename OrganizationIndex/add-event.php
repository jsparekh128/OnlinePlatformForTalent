<?php
require_once "config.php";

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";

$sqlInsert = "INSERT INTO org_events (title,start,end) VALUES ('".$title."','".$start."','".$end ."')";

$result = mysqli_query($con, $sqlInsert);

if (! $result) {
    $result = mysqli_error($con);
}
?>
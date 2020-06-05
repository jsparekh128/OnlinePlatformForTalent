<?php
require_once "config.php";

$id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

$sqlUpdate = "UPDATE org_events SET title='" . $title . "',start='" . $start . "',end='" . $end . "' WHERE id=" . $id;
mysqli_query($con, $sqlUpdate);
mysqli_close($con);

?>
<?php
session_start();
$pat_id=$_SESSION["myvalue"];
//echo $pat_id;exit;
$userman=$_SESSION["username"];
//links with localhost
include 'connection.php';
//generates name of file using date,time and year";
$name = date('YmdHis');
//$newname="upload/".$name.".jpg";
$date_log=date("Y-m-d");
require_once "signature_panel.php";
$jsonData = file_get_contents('php://input');
$image = generate_signature_panel_image($jsonData);

$filename = "signatures/".$name;
$db = $filename .= ".png";

imagepng($image, $filename);
/*echo "/" . $filename;*/
 $query = "update entry set sign='$db' where id=$pat_id";

 mysql_query($query) or die('Error, query failed : ' . mysql_error());

 
 
$_SESSION['myvalue']=$dbh->lastInsertId();

 
$dbh = null;

?>
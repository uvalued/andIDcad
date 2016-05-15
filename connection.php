<?php
/*
$host="localhost";
$user="root";
$password="anita";
$databasename="naspolydb"; */

/*mysqli

$con=  mysqli_connect($host,$user,$password,$databasename); */

//mysql
$con=mysql_connect( "localhost","root","anita");
mysql_select_db ("naspolydb",$con);

//$con=mysqli_connect( "localhost","root","anita");
//mysqli_select_db;

?>

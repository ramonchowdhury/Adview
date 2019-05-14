<?php 
session_start();
require_once('dbconfig/config.php');

if(!isset($_SESSION['usernameewxyn']) || empty($_SESSION['usernameewxyn'])) {
   header( "Location: login.php");
}
$id=$_GET['id'];
$query = "DELETE FROM ads WHERE id=$id";
$query_run = mysqli_query($con,$query);
	if($query_run)
	{
		header( "Location: myprofile.php");
	}
?>
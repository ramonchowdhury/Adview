<?php 
session_start();
require_once('dbconfig/config.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$query = "DELETE FROM ads WHERE id=$id";
	$query_run = mysqli_query($con,$query);
	if($query_run){
		header( "Location: index.php");
	}
}
if(isset($_GET['messageid'])){
	$id = $_GET['messageid'];
	$query = "DELETE FROM contact WHERE id=$id";
	$query_run = mysqli_query($con,$query);
	if($query_run){
		header( "Location: notification.php");
	}
}
if(isset($_GET['locationid'])){
	$id = $_GET['locationid'];
	$query = "DELETE FROM location WHERE id=$id";
	$query_run = mysqli_query($con,$query);
	if($query_run){
		header( "Location: locationlist.php");
	}
}
if(isset($_GET['servicetypeid'])){
	$id = $_GET['servicetypeid'];
	$query = "DELETE FROM servicetype WHERE id=$id";
	$query_run = mysqli_query($con,$query);
	if($query_run){
		header( "Location: servicetypelist.php");
	}
}
if(isset($_GET['bannedid'])){
	$id = $_GET['bannedid'];
	$query = "UPDATE `user` SET `status` = '1' WHERE `user`.`id` = '$id'";
	$query_run = mysqli_query($con,$query);
	if($query_run){
		header( "Location: userlist.php");
	}
}
?>
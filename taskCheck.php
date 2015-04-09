<?php
include("connect.php");
if(empty($_GET['user'])){
	die("user name has not been passed.");
}
$user = $_GET["user"];
$sql="SELECT id FROM user WHERE name='$user'";
$results=mysqli_query($link,$sql);
if(mysqli_num_rows($results)>0){
	echo 1;
}else{
	echo 0;
}
<?php
//关闭报错
ini_set("display_errors", "off");
error_reporting(E_ALL | E_STRICT);
session_start();

if(!isset($_SESSION['admin_name'])){
	echo "<script>parent.location.href='login.php';</script>";
}
?>

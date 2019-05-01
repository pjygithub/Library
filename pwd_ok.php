<?php
include ("check_login.php"); 
session_start();
$newpwd=md5($_POST['pwd']);
$oldpwd=md5($_POST['oldpwd']);
$admin_name = $_SESSION['admin_name'];

include("conn/conn.php");
$query=mysql_query("SELECT pwd as oldpwdre FROM tb_manager WHERE name='$admin_name'");
    $result=mysql_fetch_array($query);
$oldpwdinfo = $result["oldpwdre"];

if ($oldpwd==$oldpwdinfo) {
	$sql=mysql_query("update tb_manager set pwd='$newpwd' where name='$_SESSION[admin_name]'");
	echo "<script language='javascript'>alert('口令更改成功!');window.location.href='pwd_modify.php';</script>";
}else{
	echo "<script language='javascript'>alert('更改失败!');window.location.href='pwd_modify.php';</script>";
}
?>
		

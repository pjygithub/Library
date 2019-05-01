<?php
include ("check_login.php"); 
include("Conn/conn.php");
$typename=$_POST[typename];
$days=$_POST[days];
$query_ins=mysql_query("INSERT INTO `tb_booktype`(`typename`, `days`) VALUES ('$typename','$days')");

if($query_ins==true){
	echo "<script language='javascript'>alert('成功添加出版社信息！');window.location.href='type.php';</script>";
}else{
	echo "<script language='javascript'>alert('出版社信息添加操作失败！');window.location.href='type.php';</script>";
}
?>
<?php
include ("check_login.php"); 
include("Conn/conn.php");
$pubname=$_POST[pubname];
$pubPhoneNum=$_POST[pubPhoneNum];
$pubAdrr=$_POST[pubAdrr];
$pubUrl=$_POST[pubUrl];

$query_ins=mysql_query("INSERT INTO `tb_publishing`(`pubname`, `pubAdrr`, `pubUrl`,`pubPhoneNum`) VALUES ('$pubname','$pubAdrr','$pubUrl','$pubPhoneNum')");

if($query_ins){
	echo "<script language='javascript'>alert('成功添加出版社信息！');window.location.href='pub.php';</script>";
}else{
	echo "<script language='javascript'>alert('出版社信息添加操作失败！$pubPhoneNum');window.location.href='pub.php';</script>";
}
?>
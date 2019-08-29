<?php
//关闭报错
ini_set("display_errors", "off");
error_reporting(E_ALL | E_STRICT);
include ("check_login.php"); 
include("conn/conn.php");
if($_POST[Submit]!=""){
$libraryname=$_POST[libraryname];
$curator=$_POST[curator];
$tel=$_POST[tel];
$address=$_POST[address];
$email=$_POST[email];
$url=$_POST[url];
$createDate=$_POST[createDate];
$introduce=$_POST[introduce];
$notie=$_POST[notie];
$query=mysql_query("update tb_library set libraryname='$libraryname',curator='$curator',tel='$tel',address='$address',email='$email',url='$url',createDate='$createDate',introduce='$introduce',notie='$notie'");
if($query==true){
	echo "<script language=javascript>alert('信息修改成功！');history.back();</script>";
}else{
	echo "<script language=javascript>alert('信息修改失败！');history.back();</script>";
}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">


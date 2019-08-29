<?php
//关闭报错
ini_set("display_errors", "off");
error_reporting(E_ALL | E_STRICT);
include ("check_login.php"); 
include("conn/conn.php");
$id=$_GET[id];
$sql=mysql_query("delete from tb_manager where id='$id'");
$query=mysql_query("delete from tb_purview where id='$id'");
if($sql==true and $query==true ){
echo "<script language=javascript>alert('管理员删除成功！');history.back();</script>";
}
else{
echo "<script language=javascript>alert('管理员删除失败！');history.back();</script>";
}
?>


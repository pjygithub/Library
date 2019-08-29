<?php
//关闭报错
ini_set("display_errors", "off");
error_reporting(E_ALL | E_STRICT);
include ("check_login.php"); 
include("Conn/conn.php");
$info_del=mysql_query("delete from tb_bookinfo where id=$_GET[id]");
if($info_del){
    echo "<script language='javascript'>alert('图书信息删除成功!');history.back();</script> ";
}
?>
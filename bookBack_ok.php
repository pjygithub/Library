<?php
include ("check_login.php"); 
//关闭报错
ini_set("display_errors", "off");
error_reporting(E_ALL | E_STRICT);
session_start();
include("conn/conn.php");
$backTime=date("Y-m-d");        //归还图书日期
$borrid=$_GET[borrid];
mysql_query("update tb_borrow set backTime='$backTime',ifback=1,operator='$_SESSION[admin_name]' where id=$borrid");
echo "<script language='javascript'>alert('图书归还操作成功！');window.location.href='bookBack.php?barcode=$barcode';</script>";
?>
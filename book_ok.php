<?php 
include ("check_login.php"); 
//关闭报错
ini_set("display_errors", "off");
error_reporting(E_ALL | E_STRICT);
session_start();
include("Conn/conn.php");

$operator=$_SESSION["admin_name"];//操作员
$barcode=$_POST["barcode"];//条形码
$bookName=$_POST["bookName"];//书题名
$typeid=$_POST["typeId"];//类别ID
$author=$_POST["author"];//作者
$translator=$_POST["translator"];//译者
$isbn=$_POST["isbn"];//出版社
$price=$_POST["price"];//价格
$page=$_POST["page"];//页码数
$bookcaseid=$_POST["bookcaseid"];//书架
$inTime=date("Y-m-d");
$imgUrl=$_POST["imgUrl"];
$findnum=$_POST["findnum"];
$pubTime=$_POST["pubTime"];
$pubNum=$_POST["pubNum"];
$printTime=$_POST["printTime"];
$printNum=$_POST["printNum"];
$size=$_POST["size"];
$printPage=$_POST["printPage"];
$totalWord=$_POST["totalWord"];
$total=$_POST["total"];

$sql=mysql_query("insert into tb_bookinfo(barcode,bookName,typeid,author,translator,ISBN,price,page,bookcase,inTime,operator,imgUrl,findnum,pubTime,pubNum, printTime,printNum,size,printPage,totalWord,total)values('$barcode','$bookName','$typeid','$author','$translator','$isbn','$price','$page','$bookcaseid','$inTime','$operator','$imgUrl','$findnum','$pubTime','$pubNum','$printTime','$printNum','$size','$printPage','$totalWord','$total')");
echo "<script language='javascript'>alert('图书《$bookName($barcode)》的信息添加成功!');location.href='./book.php';</script>";
// history.back();
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">


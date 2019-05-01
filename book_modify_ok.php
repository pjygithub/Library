<?php 
include ("check_login.php");
//关闭报错
ini_set("display_errors", "off");
error_reporting(E_ALL | E_STRICT); 
session_start();
include("conn/conn.php");

$operator=$_SESSION["admin_name"];//操作员
$bid=$_POST[bid];
$barcode=$_POST["barcode"];//条形码
$bookName=$_POST["bookName"];//书题名
$typeid=$_POST["typeId"];//类别ID
$author=$_POST["author"];//作者
$translator=$_POST["translator"];//译者
$isbn=$_POST["isbn"];//出版社
$price=$_POST["price"];//价格
$page=$_POST["page"];//页码数
$bookcase=$_POST["bookcase"];//书架
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

$query=mysql_query("update tb_bookinfo set barcode='$barcode', bookName='$bookName' , typeid='$typeid', author='$author', translator='$translator', ISBN='$isbn' , price='$price' , page='$page' , bookcase='$bookcase', inTime='$inTime', operator='$operator', imgUrl='$imgUrl', findnum='$findnum',pubTime='$pubTime', pubNum='$pubNum' ,printTime='$printTime', printNum='$printNum', size='$size', printPage='$printPage', totalWord='$totalWord', total='$total' where id=$bid");
echo "<script language='javascript'>alert('图书《$bookName($barcode)》的信息修改成功!');location.href='./book.php';</script>";
mysql_close($conn);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">

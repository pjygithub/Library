<?php 
include ("check_login.php"); 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<?php
include("conn/conn.php");
$isbn=$_GET[isbn];

// $sql=mysql_query("select pub.*,borr.*,reader.*,rt.* from tb_publishing as pub, tb_borrow as borr join tb_reader as reader on borr.readerid=reader.typeid join tb_readertype as rt on reader.typeid=rt.id where pub.ISBN='$isbn'");
$sql = mysql_query("SELECT * FROM `tb_publishing` WHERE `ISBN`=$isbn");
$info=mysql_fetch_array($sql);
if($info){
	$query=mysql_query("DELETE FROM `tb_publishing` WHERE `ISBN`= $isbn");
	echo "<script language='javascript'>alert('出版社信息删除成功！');history.go(-1);</script>";
}else{
	echo "<script language='javascript'>alert('出版社信息删除操作失败！');history.go(-1);</script>";
}
?>

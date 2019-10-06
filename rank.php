<?php 
  	include ("check_login.php"); 
  	include ("conn/conn.php");
	//关闭报错
	ini_set("display_errors", "off");
	error_reporting(E_ALL | E_STRICT);
	if (!session_id()) session_start();
	// 数据库查询
	// 滚动通知查询
	$sql0=mysql_query("SELECT `introduce`,`notie` FROM `tb_library` WHERE 1");
	$info0=mysql_fetch_array($sql0);
	// echo $info0['notie'];	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书管理系统</title>
	<link rel="stylesheet" href="./common/bootstrap/3.3.7/css/bootstrap.min.css">  
	<link rel="stylesheet" href="./style.css">
	<script src="./common/jquery/2.1.1/jquery.min.js"></script>
	<script src="./common/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="home_head">
		<p>当前位置：<a href="./rank.php">首页</a></p>
	</div>
	<!-- 首页图书查询（已废弃） -->
	<!-- <div class="queryhead">
		<p style="width:100%;height:1%;font-size:22px;color:#000;">图书查询（列表）</p>
	</div>
	<iframe class="iframe" src="./bookQueryleft.php"></iframe> -->

	<!-- 滚动通知 -->
	<div class="notie">
		<span></span>
		<p>
			<marquee><?php echo $info0['notie'];?></marquee>
		</p>
	</div>
		<table class="table table-hover a">
		<caption style="">图书借阅排行榜</caption>
		<thead>
			<tr>
				<th><span>借阅</span><span>排名</span></th>
				<th class="mini-hidden">图书ISBN</th>
				<th>图书题名</th>
				<th><span>图书</span><span>作者</span></th>
				<th class="mini-hidden">图书译者</th>
				<th class="mini-hidden">出版社</th>
				<th>索书号</th>
				<th class="mini-hidden">页码数</th>
				<th class="mini-hidden">总字数</th>  
				<th><span>定价</span><span>(元)</span></th>
				<th class="mini-hidden">图书类型</th>
				<th><span>借阅</span><span>次数</span></th>    
				<th><span>总</span><span>库存</span></th>
			</tr>
		</thead>
		<tbody style="text-align: center;">
			<?php
				// 借阅排行查询
				$sql=mysql_query("select * from (select bookid,count(bookid) as degree from tb_borrow group by bookid) as borr join (select b.*,c.name as bookcasename,p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id where b.del=0) as book on borr.bookid=book.id order by borr.degree desc limit 10");
				$info=mysql_fetch_array($sql);
				$i=1;
				do{
			?>
			<tr>
				<td ><?php echo $i;?></td>
				<td class="mini-hidden"><?php echo $info["barcode"];?></td>
				<td ><a href="book_look.php?id=<?php echo $info["id"]; ?>"><?php echo $info["bookname"];?></a></td>
				<td ><?php echo $info["author"];?></td>
				<td class="mini-hidden"><?php echo $info["translator"];?></td>
				<td class="mini-hidden"><?php echo $info["pubname"];?></td>
				<td ><?php echo $info["bookcasename"];echo $info["findnum"];?></td>
				<td class="mini-hidden"><?php echo $info["page"];?></td>
				<td class="mini-hidden"><?php echo $info["totalWord"];?></td>
				<td ><?php echo $info["price"];?></td>
				<td class="mini-hidden"><?php echo $info["typename"];?></td>
				<td ><?php echo $info["degree"];?></td>
				<td ><?php echo $info["total"];?></td>                
			</tr>
			<?php 
				$i=$i+1;
				}while($info=mysql_fetch_array($sql));
			?>
		</tbody>
	</table>

</body>
</html>
<?php 
  include ("check_login.php"); 
  include("conn/conn.php");
  if (!session_id()) session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书管理系统</title>
	<link rel="stylesheet" href="./common/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="./common/jquery/2.1.1/jquery.min.js"></script>
	<script src="./common/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	.home_head{
		width:100%;
		position: fixed;
		top:1%;
	}
	.home_head p{
		background-color:#e6e6fa;
		margin-top:0px;
		width:100%;
		height:23px;
		color:#333;
	}
	.queryhead{
		width:30%;
		background-color: red;
		position: relative;
		top:28%;

	}
	.notie {
		font-size: 18px;
		line-height: 18px;
	}
	.notie p{
		/*height: 40%;*/
		display: inline-block;
		width: 60%;
	}
	.notie p marquee{
		width: 150%;
		color: red;
		font-size: 20px;
	}
</style>
<body style="margin-left:17%;margin-top:20px;height:50%;width:83%">
  <div class="home_head">
  	<p >当前位置：<a href="./rank.php">首页</a></p>
  </div>
<!-- 	<div class="queryhead"><p style="width:100%;height:1%;font-size:22px;color:#000;">图书查询（列表）</p>
	</div> -->
	<!-- <iframe class="iframe" src="./bookQueryleft.php"></iframe> -->
<?php
					$sql0=mysql_query("SELECT `introduce`,`notie` FROM `tb_library` WHERE 1");
					$info0=mysql_fetch_array($sql0);
					// echo $info0['notie'];
			?>
<div class="notie"><span>滚动通知：</span><p><marquee><?php echo $info0['introduce'];?><?php echo $info0['notie'];?></marquee></p>
</div>
	<br>
	<style type="text/css">
	.table.a{
		
		position: absolute;
		top: 12%;
		width: 83%;
	}
	.table tr{
		font-size: 14px;
	}
	</style>
	<table class="table table-hover a" style="font-size:14px;bottom:0px">
	<caption style="color:black;font-size:22px;">图书借阅排行榜</caption>
	<thead>
		<tr bgcolor="#E6E6FA" style="text-align: center;">
			<th>排名</th>
			<th>图书条形码ISBN</th>
			<th>图书题名</th>
      <th>作者</th>
      <th>译者</th>
      <th>出版社</th>
			<th>索书号</th>
      <th>页码数</th>
      <th>字数</th>  
			<th>定价(元)</th>
      <th>图书类型</th>
			<th>借阅次数</th>    
      <th>总库存</th>
		</tr>
	</thead>
	<tbody style="text-align: center;">
		<?php
					$sql=mysql_query("select * from (select bookid,count(bookid) as degree from tb_borrow group by bookid) as borr join (select b.*,c.name as bookcasename,p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id where b.del=0) as book on borr.bookid=book.id order by borr.degree desc limit 10");
					$info=mysql_fetch_array($sql);
					$i=1;
					do{
					?>
		<tr>
				<td ><?php echo $i;?></td>
                <td ><?php echo $info["barcode"];?></td>
                <td ><a href="book_look.php?id=<?php echo $info["id"]; ?>"><?php echo $info["bookname"];?></a></td>
                <td ><?php echo $info["author"];?></td>
                <td ><?php echo $info["translator"];?></td>
                <td ><?php echo $info["pubname"];?></td>
                <td ><?php echo $info["bookcasename"];echo $info["findnum"];?></td>
                <td ><?php echo $info["page"];?></td>
                <td ><?php echo $info["totalWord"];?></td>
                <td ><?php echo $info["price"];?></td>
                <td ><?php echo $info["typename"];?></td>
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
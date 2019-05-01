<?php 
	include ("check_login.php"); 
	//关闭报错
	ini_set("display_errors", "off");
	error_reporting(E_ALL | E_STRICT);
	session_start();
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
		*{
			padding: 0px;
			margin: 0px;
		}
		body{
		/*	background-color: #565656;
			color: #ffffff;*/
		}
		.book_all_info tr:hover{
			background-color: #e6e6fa;
		}
		.book_all_info tr td{
			font-size:16px;
			text-align: left;
			line-height: 26px;
			padding-left:0%;
			/*background-color:#565656;*/
			/*width: 33%;*/
		}
		.form1{
			width: 50%;
		}
		.book_all_info tr td img{
			width: 300px;
			height: 400px;
			display: block;
			float: left;
			padding-left: 0%;
		}
	</style>
	<body style="margin-left:19%;margin-top:0px;padding-top:0px;height:100%;width:80%">
		<?php 
	        include("./conn/conn.php");
	     $getid=$_GET['id'];

		$all_sql=mysql_query("SELECT DISTINCT book.*,book.id as bookid, pub.pubname, pub.pubAdrr,pub.pubPhoneNum,pub.pubUrl, bcase.name, btype.typename FROM `tb_bookinfo` book JOIN `tb_publishing` pub ON book.ISBN = pub.ISBN JOIN `tb_bookcase` bcase ON bcase.id = book.bookcase JOIN `tb_booktype` btype ON btype.id = book.typeid WHERE book.id =$getid");
		// SELECT book.barcode, book.id AS bookid, book.bookname, bt.typename, book.author, book.translator, pb.pubname, pb.pubAdrr, pb.pubUrl,pb.pubPhoneNum, book.price, book.page, bc.name, book.imgUrl, pubTime, pubNum, printTime, printNum, PAGE, price, size, typename, printPage, totalWord, findnum,total FROM tb_borrow a, tb_bookinfo book JOIN tb_booktype bt ON book.typeid = bt.id JOIN tb_publishing pb ON book.ISBN = pb.ISBN JOIN tb_bookcase bc ON book.bookcase = bc.id WHERE book.id = $getid
		$info=mysql_fetch_array($all_sql);
			?>
		<p style="background-color:#e6e6fa;margin-top:0px;height:23px;color:#333;position:fixed;top:1%;width:100%;">当前位置：<a href="./rank.php">首页</a>> 图书详细信息 > <a href="book_look.php?id=<?php echo $info["bookid"];?>"><?php echo $info["bookname"];?></a></p>
			<style type="text/css">
				.form{
					width: 100%;
					display: block;
					padding-top:0px;
					margin-top:0px;
				}
				</style>
		<form name="form1" method="post" action="reader_ok.php" class="form-horizontal">

			</style>
			<div style="font-size:16px;">
				<table class="book_all_info">
					<th colspan="2" style="background-color:#fff;">
						<p style="font-size:22px;width:30%;"><b>图书详细信息：</b></p>
					</th>
					<th style="background-color:#fff;">
						<div class="form-group" style="position:absolute;left:36%;top:7%;">
				<div class="col-sm-offset-2 col-sm-10" style="table-algin:left;background-color:#fff;">
					<button name="Submit2" id="Submit2" type="button" class="btn btn-primary" value="返回列表" onClick="history.back()">返回列表</button>
				</div>		
			</div></th>
								
					<tr>
						<td style="width:12%;">条&nbsp;&nbsp;&nbsp;形&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
						<td style="width:50%;"><b><?php echo "ISBN "; echo $info["barcode"];?></b></td>
						<td style="background-color:#fff;">图书封面预览：</td>
					</tr>
					<tr>
						<td>图&nbsp;书&nbsp;题&nbsp;&nbsp;名：</td>
						<td><b><?php echo $info["bookname"];?></b></td>
						<td colspan="1" rowspan="19" style="background-color:#fff;"><img src="<?php echo "./bookimg";echo $info["imgUrl"];?>"></td>
					</tr>
					<tr>
						<td>作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者：</td>
						<td><b><?php echo $info["author"];?></b> 编写</td>
					</tr>
					<tr>
						<td>译&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者：</td>
						<td><?php echo $info["translator"];?> 译</td>
					</tr>
					<tr>
						<td>出&nbsp;&nbsp;&nbsp;版&nbsp;&nbsp;&nbsp;&nbsp;社：</td>
						<td><b><?php echo $info["pubname"];?></b></td>
					</tr>
					<tr>
						<td>索&nbsp;&nbsp;&nbsp;书&nbsp;&nbsp;&nbsp;&nbsp;号：</td>
						<td><b><?php echo $info["name"];echo $info["findnum"];?></b></td>
					</tr>
					<tr>
						<td>出&nbsp;版&nbsp;年&nbsp;&nbsp;月：</td>
						<td><b><?php echo $info["pubTime"];?></b></td>
					</tr>
					<tr>
						<td>版&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;次：</td>
						<td>第<b> <?php echo $info["pubNum"];?></b> 版</td>
					</tr>
					<tr>
						<td>印&nbsp;刷&nbsp;年&nbsp;&nbsp;月：</td>
						<td><b><?php echo $info["printTime"];?></b></td>
					</tr>
					<tr>
						<td>印&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;次：</td>
						<td>第 <b><?php echo $info["printNum"];?></b> 次印刷</td>
					</tr>
					<tr>
						<td>页&nbsp;&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;&nbsp;&nbsp;数：</td>
						<td><b><?php echo $info["page"];?></b> 页</td>
					</tr>
					<tr>
						<td>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格：</td>
						<td><b><?php echo $info["price"];?> 元</b></td>
					</tr>
					<tr>
						<td>类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：</td>
						<td><b><?php echo $info["typename"];?></b></td>
					</tr>
					<tr>
						<td>大&nbsp;小&nbsp;尺&nbsp;&nbsp;寸：</td>
						<td><b><?php echo $info["size"];?></b></td>
					</tr>
					<tr>
						<td>印&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;张：</td>
						<td><b><?php echo $info["printPage"];?></b></td>
					</tr>
					<tr>
						<td>字&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数：</td>
						<td><b><?php echo $info["totalWord"];?> 千字</b></td>
					</tr>
										<tr>
						<td>库&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;存：</td>
						<td><b><?php echo $info["total"];?> 本</b></td>
					</tr>
					<tr>
						<td>流&nbsp;通&nbsp;状&nbsp;&nbsp;态：</td>
						<?php 
							//流通状态查询
							include('./conn/conn.php');
							$flagb = $info[bookid];
							// echo $flagb;
							$borrow_sql = mysql_query("SELECT a.bookid,a.ifback, a.backTime as udtime FROM tb_borrow a, tb_bookinfo book  WHERE a.bookid = $flagb ORDER BY udtime DESC LIMIT 1");
							$borrow_flag = mysql_fetch_array($borrow_sql);
							$flag = $borrow_flag["ifback"];
							
							// echo "$flag" ;
							if($flag=="0"){ 
								echo "<td><b>出借</b></td>";
							}else{ 
								echo "<td><b>在架可借</b></td>";
							};
						?>
					</tr>
					<tr>
						<td>出版社地址：</td>
						<td><b><?php echo $info["pubAdrr"];?></b></td>
					</tr>
					<tr>
						<td>联&nbsp;系&nbsp;电&nbsp;&nbsp;话：</td>
						<td><b><?php echo $info["pubPhoneNum"];?></b></td>
					</tr>					
					<tr>
						<td>出版社主页：</td>
						<td><a href="<?php echo $info["pubUrl"];?>" target="_black"><b><?php echo $info["pubUrl"];?></b></a></td>
					</tr>
				</table>
			</div>
		</div>

		</form>

	</body>
</html>
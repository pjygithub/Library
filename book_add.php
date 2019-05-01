<?php
include ("check_login.php"); 
//关闭报错
ini_set("display_errors", "off");
error_reporting(E_ALL | E_STRICT);
 session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书管理系统</title>
	<link rel="stylesheet" href="./common/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="./common/jquery/2.1.1/jquery.min.js"></script>
	<script src="./common/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	.maindiv label{
		/*width: 30%;*/
		display: inline-block;
		padding-top: 3%;
	}
	.maindiv div{
		width: 100%;
		display: block;
		padding-top: 1%;
	}
</style>
<script language="javascript">
function check(form){
	if(form.barcode.value==""){
		alert("请输入条形码!");form.barcode.focus();return false;

	}
	if(form.bookName.value==""){
		alert("请输入图书姓名!");form.bookName.focus();return false;
	}
	if(form.price.value==""){
		alert("请输入图书定价!");form.price.focus();return false;
	}
form.submit();
}
</script>
</head>
<body style="margin-left:12%;margin-top:20px;height:50%;width:80%">
	<p style="background-color:#e6e6fa;margin-top:0px;height:23px;color:#333">当前位置：<a href="./rank.php">首页</a>> 添加图书 > <a href="book_look.php?id=<?php echo $info["id"];?>"><?php echo $info["bookname"];?></a></p>

<form name="form1" method="post" action="book_ok.php" class="form-horizontal">
		<script type="text/javascript">
			function barcodetoimg(id,str){
			if (str=="") {
				document.getEelementById('barcode').focus();
			}else{
				// alert(str);
				document.getElementById('imgUrl').value='/'+ str + '.jpg';
			}	
		}
		</script>
		<div class="maindiv">
		<label for="firstname" class="col-sm-2 control-label" style="color:red;">条形码(必填)</label>
		<div class="col-sm-10" style="width:30%">
			<input name="barcode" type="text" class="form-control" id="barcode" onblur="barcodetoimg(this.id,this.value)">
		</div>

		<label for="firstname" class="col-sm-2 control-label"  style="color:red;">图书名称(必填)</label>
		<div class="col-sm-10"  style="width:30%">
			<input name="bookName" type="text" class="form-control" id="bookName">
		</div>
		<label for="lastname" class="col-sm-2 control-label">图书类型</label>
		<div class="col-sm-10" style="width:30%">
		<select name="typeId" class="form-control" id="typeId">
		<?php
		  include("conn/conn.php");
		  $sql=mysql_query("select * from tb_booktype");
		  $info=mysql_fetch_array($sql);
		  do{
		?> 		
				
          <option value="<?php echo $info["id"];?>"><?php echo $info["typename"];?></option>
		<?php
			}while($info=mysql_fetch_array($sql));
		?> 
        </select> <a href="./type.php">添加类型？</a>  
        </div>
        <label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-10" style="width:30%">
			<input name="author" type="text" class="form-control" id="author" >
		</div> 
		<label for="firstname" class="col-sm-2 control-label">译者</label>
		<div class="col-sm-10" style="width:30%">
			<input name="translator" type="text" class="form-control" id="translator" value="原文" >
		</div>
		<label for="lastname" class="col-sm-2 control-label">出版社</label>
		<div class="col-sm-10" style="width:30%">
		<select name="isbn" class="form-control" id="isbn" value="未知">
		<?php
		  $sql2=mysql_query("select * from tb_publishing");
		  $info2=mysql_fetch_array($sql2);
		  do{
		?> 		
						
		    <option value="<?php echo $info2["ISBN"];?>"><?php echo $info2["pubname"];?></option>
		<?php
		}while($info2=mysql_fetch_array($sql2));
		?> 
        </select>  <a href="./pub.php">添加出版社？</a> 
        </div>     
        <label for="firstname" class="col-sm-2 control-label" style="color:red;">价格(必填)</label>
		<div class="col-sm-10" style="width:30%">
			<input name="price" type="text" class="form-control" id="price" >
		</div>
		<label for="firstname" class="col-sm-2 control-label">页码</label>
		<div class="col-sm-10" style="width:30%">
			<input name="page" type="text" class="form-control" id="page" value="0">
		</div>
		<label for="lastname" class="col-sm-2 control-label">书架</label>
		<div class="col-sm-10" style="width:30%">
		<select name="bookcaseid" class="form-control" id="bookcaseid">
		<?php
		  $sql3=mysql_query("select * from tb_bookcase");
		  $info3=mysql_fetch_array($sql3);
		  do{
		?> 		
						
		    <option value="<?php echo $info3["id"];?>"><?php echo $info3["name"];?></option>
		<?php
		}while($info3=mysql_fetch_array($sql3));
		?> 
		    </select> <a href="./bookcase.php">添加书架？</a> 
		    <input name="operator" type="hidden" id="operator" value="<?php echo $info3["name"];?>">
        </div> 
        <label for="firstname" class="col-sm-2 control-label">图书封面图地址</label>
		<div class="col-sm-10" style="width:30%">
			<input name="imgUrl" type="text" class="form-control" id="imgUrl" value="/null.png">
		</div>
		<label for="firstname" class="col-sm-2 control-label">索书号</label>
		<div class="col-sm-10" style="width:30%">
			<input name="findnum" type="text" class="form-control" id="findnum" value="0000.00">
		</div>
		<label for="firstname" class="col-sm-2 control-label">出版年月</label>
		<div class="col-sm-10" style="width:30%">
			<input name="pubTime" type="text" class="form-control" id="pubTime" value="1900-1" onblur="pubtoprint(this.id,this.str)">
		</div>
		<script type="text/javascript">
			function pubtoprint(id,str){
			if (str=="") {
				document.getElementById('pubTime').focus();
			}else{
				var aa = document.getElementById('pubTime').value;
				document.getElementById('printTime').value= aa;
			}	
		}
		</script>
		<label for="firstname" class="col-sm-2 control-label">版次</label>
		<div class="col-sm-10" style="width:30%">
			<input name="pubNum" type="text" class="form-control" id="pubNum" value="一">
		</div>
		<label for="firstname" class="col-sm-2 control-label">印刷年月</label>
		<div class="col-sm-10" style="width:30%">
			<input name="printTime" type="text" class="form-control" id="printTime" value="1900-1" >
		</div>
		<label for="firstname" class="col-sm-2 control-label">印次</label>
		<div class="col-sm-10" style="width:30%">
			<input name="printNum" type="text" class="form-control" id="printNum" value="1">
		</div>
		<label for="firstname" class="col-sm-2 control-label">大小尺寸</label>
		<div class="col-sm-10" style="width:30%">
			<input name="size" type="text" class="form-control" id="size" value="0mm X 0mm 0k">
		</div>
		<label for="firstname" class="col-sm-2 control-label">印张</label>
		<div class="col-sm-10" style="width:30%">
			<input name="printPage" type="text" class="form-control" id="printPage" value="0 1/1">
		</div>
		<label for="firstname" class="col-sm-2 control-label">总字数</label>
		<div class="col-sm-10" style="width:30%">
			<input name="totalWord" type="text" class="form-control" id="totalWord" value="0">
		</div>
		<label for="firstname" class="col-sm-2 control-label">总库存</label>
		<div class="col-sm-10" style="width:30%">
			<input name="total" type="text" class="form-control" id="total" value="1">
		</div>

	</div>

<div class="form-group">
		
	</div>
</div>
<br>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="Submit" type="submit" class="btn btn-primary" onClick="return check(form1)" value="保存">保存</button>
			<button name="Submit2" id="Submit2" type="button" class="btn btn-danger" value="返回" onClick="history.back()">返回</button>
		</div>		
	</div>
</form>
<div style="margin-left:20%">填写示例：</div>
<img src="./Images/book_add_etc.png" width="80%" style="display:block;margin-left:20%">
</body>
</html>
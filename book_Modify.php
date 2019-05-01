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

<script language="javascript">
function check(form){
	if(form.barcode.value==""){
		alert("请输入条形码1!");form.barcode.focus();return false;
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
		<script type="text/javascript">
			function pubtoprint(id,str){
			if (str=="") {
				document.getElementById('pubTime').focus();
			}else{
				var aa = document.getElementById('pubTime').value;
				document.getElementById('printTime').value= aa;
			}	
		};
		function barcodetoimg(id,str){
			if (str=="") {
				document.getEelementById('barcode').focus();
			}else{
				// alert(str);
				document.getElementById('imgUrl').value='/'+ str + '.jpg';
			}	
		}
		</script>
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
</head>
<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
	<?php
	include("conn/conn.php");
	$sql=mysql_query("select book.*,book.barcode,book.id as bookid,book.bookname,bt.typename,book.typeid,book.author,book.ISBN,book.translator,book.bookcase,pb.pubname,book.price,book.page,bc.name as bcname,bc.id as bookcaseid from tb_bookinfo book join tb_booktype bt on book.typeid=bt.id join tb_publishing pb on book.ISBN=pb.ISBN join tb_bookcase bc on book.bookcase=bc.id where book.id=$_GET[id]");
	$info=mysql_fetch_array($sql);
	?>
<form name="form1" method="post" action="book_modify_ok.php" class="form-horizontal">
	
 <input type="hidden" name="bid" value="<?php echo $info[book.id 

];?>">
	<div class="maindiv">
		<label for="firstname" class="col-sm-2 control-label">条形码ISBN</label>
		<div class="col-sm-10" style="width:30%">
			<input name="barcode" type="text" class="form-control" id="barcode" value="<?php echo $info[barcode];?>" onblur="barcodetoimg(this.id,this.value)">
		</div>
		<label for="firstname" class="col-sm-2 control-label">图书名称</label>
		<div class="col-sm-10"  style="width:30%">
			<input name="bookName" type="text" class="form-control" id="bookName" value="<?php echo $info[bookname];?>">
		</div>
		<label for="lastname" class="col-sm-2 control-label">图书类型</label>
		<div class="col-sm-10" style="width:30%">
		<select name="typeId" class="form-control" id="typeId">
		<?php
		  include("conn/conn.php");
		  $sql_booktype=mysql_query("select * from tb_booktype");
		  $sql_flag = $info[typeid];
		  $sql_booktype_only=mysql_query("select * from tb_booktype where id=$sql_flag");
		  $info_booktype=mysql_fetch_array($sql_booktype);
		  $info_booktype_only=mysql_fetch_array($sql_booktype_only);
		  ?>
		<option value="<?php echo $info[typeid];?>" ><?php echo $info["typename"];?></option>
		  <?php
		  do{
		?> 		
				
          <option value="<?php echo $info_booktype['id'];?>"><?php echo $info_booktype["typename"];?></option>
		<?php
			}while($info_booktype=mysql_fetch_array($sql_booktype));
		?> 
        </select>  <a href="./type.php">添加类型？</a>  
        </div>
        <label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-10" style="width:30%">
			<input name="author" type="text" class="form-control" id="author" value="<?php echo $info[author];?>">

		</div> 
		<label for="firstname" class="col-sm-2 control-label">译者</label>
		<div class="col-sm-10" style="width:30%">
			<input name="translator" type="text" class="form-control" id="translator" value="<?php echo $info[translator];?>">
		</div>
		<label for="lastname" class="col-sm-2 control-label">出版社</label>
		<div class="col-sm-10" style="width:30%">
		<select name="isbn" class="form-control" id="isbn" <?php echo $info[typeid];?>>
		<?php
		  $sql_pub=mysql_query("select * from tb_publishing");
		  $info_pub=mysql_fetch_array($sql_pub);		  
		  $sql_flag = $info[ISBN];
		  $sql_pub_only=mysql_query("select * from tb_publishing where id=$sql_flag");
		  $info_pub_only=mysql_fetch_array($sql_pub_only);
		  ?>
		  
		  <option value="<?php echo $info[typeid];?>" ><?php echo $info["pubname"];?></option>
		  <?php
		  do{
		?> 		
						
		    <option value="<?php echo $info_pub["ISBN"];?>"><?php echo $info_pub["pubname"];?></option>
		<?php
		}while($info_pub=mysql_fetch_array($sql_pub));
		?> 
        </select>  <a href="./pub.php">添加出版社？</a> 
        </div>     
        <label for="firstname" class="col-sm-2 control-label">价格</label>
		<div class="col-sm-10" style="width:30%">
			<input name="price" type="text" class="form-control" id="price" value="<?php echo $info[price];?>">
		</div>
		<label for="firstname" class="col-sm-2 control-label">页码</label>
		<div class="col-sm-10" style="width:30%">
			<input name="page" type="text" class="form-control" id="page" value="<?php echo $info[page];?>">
		</div>
		<label for="lastname" class="col-sm-2 control-label">书架</label>
		<div class="col-sm-10" style="width:30%">
		<select name="bookcase" class="form-control" id="bookcase" value="<?php echo $info[bookcaseid];?>">
		<?php
		  include("conn/conn.php");
		  $sql_case=mysql_query("select * from tb_bookcase");
		  $sql_flag = $info[bookcaseid];
		  $sql_case_only=mysql_query("select * from tb_bookcase where id=$sql_flag");
		  $info_case=mysql_fetch_array($sql_case);
		  $info_case_only=mysql_fetch_array($sql_case_only);
		  ?>
		<option value="<?php echo $info[bookcaseid];?>" ><?php echo $info["bcname"];?></option>
		  <?php
		  do{
		?> 			
          <option value="<?php echo $info_case['id'];?>"><?php echo $info_case["name"];?></option>
		<?php
			}while($info_case=mysql_fetch_array($sql_case));
		?> 
		    </select> <a href="./bookcase.php">添加书架？</a>   
		    <input name="operator" type="hidden" id="operator" value="<?php echo $info3["name"];?>">
        </div> 
        <label for="firstname" class="col-sm-2 control-label">图书封面图地址</label>
		<div class="col-sm-10" style="width:30%">
			<input name="imgUrl" type="text" class="form-control" id="imgUrl" value="<?php echo $info[imgUrl];?>">
		</div>
		<label for="firstname" class="col-sm-2 control-label">索书号</label>
		<div class="col-sm-10" style="width:30%">
			<input name="findnum" type="text" class="form-control" id="findnum" value="<?php echo $info[findnum];?>">
		</div>
		<label for="firstname" class="col-sm-2 control-label">出版年月</label>
		<div class="col-sm-10" style="width:30%">
			<input name="pubTime" type="text" class="form-control" id="pubTime" value="<?php echo $info[pubTime];?>" onblur="pubtoprint(this.id,this.value)">
		</div>
		<label for="firstname" class="col-sm-2 control-label">版次</label>
		<div class="col-sm-10" style="width:30%">
			<input name="pubNum" type="text" class="form-control" id="pubNum" value="<?php echo $info[pubNum];?>">
		</div>
		<label for="firstname" class="col-sm-2 control-label">印刷年月</label>
		<div class="col-sm-10" style="width:30%">
			<input name="printTime" type="text" class="form-control" id="printTime" value="<?php echo $info[printTime];?>">
		</div>
		<label for="firstname" class="col-sm-2 control-label">印次</label>
		<div class="col-sm-10" style="width:30%">
			<input name="printNum" type="text" class="form-control" id="printNum" value="<?php echo $info[printNum];?>">
		</div>
		<label for="firstname" class="col-sm-2 control-label">大小尺寸</label>
		<div class="col-sm-10" style="width:30%">
			<input name="size" type="text" class="form-control" id="size" value="<?php echo $info[size];?>">
		</div>
		<label for="firstname" class="col-sm-2 control-label">印张</label>
		<div class="col-sm-10" style="width:30%">
			<input name="printPage" type="text" class="form-control" id="printPage" value="<?php echo $info[printPage];?>">
		</div>
		<label for="firstname" class="col-sm-2 control-label">总字数</label>
		<div class="col-sm-10" style="width:30%">
			<input name="totalWord" type="text" class="form-control" id="totalWord" value="<?php echo $info[totalWord];?>">
		</div>
		<label for="firstname" class="col-sm-2 control-label">总库存</label>
		<div class="col-sm-10" style="width:30%">
			<input name="total" type="text" class="form-control" id="total" value="<?php echo $info[total];?>">
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
<div style="margin-left:20%">原图预览：</div>
<img src="./bookimg<?php echo $info[imgUrl];?>" width="20%" style="display:block;margin-left:20%">
<script type="text/javascript">
	var aaa = document.getEelmentById('imgUrl').value;
	document.innerHTML="<img src='"+$aaa+"' width='20%' style='display:block;margin-left:20%'>";
</script>

</body>
</html>
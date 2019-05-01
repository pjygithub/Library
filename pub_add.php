<?php
include ("check_login.php"); 
 if (!session_id()) session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书管理系统</title>
	<link rel="stylesheet" href="./common/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="./common/jquery/2.1.1/jquery.min.js"></script>
	<script src="./common/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script language="javascript">
function check(form){
	if(form.pubname.value==""){
		alert("请输入出版社名称!");form.pubname.focus();return false;
	}
	// if(form.pubAdrr.value==""){
	// 	alert("请输入联系地址!");form.pubAdrr.focus();return false;
	// }
	// if(form.pubUrl.value==""){
	// 	alert("请输入主页网址!");form.pubUrl.focus();return false;
	// }	
}
</script>

<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
	<form name="form1" method="post" action="pub_ok.php" class="form-horizontal">
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">出版社</label>
		<div class="col-sm-10">
			<input type="text" name="pubname" class="form-control" id="pubname" value="">
		</div>
	</div>
		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">联系电话</label>
		<div class="col-sm-10">
			<input type="text" name="pubPhoneNum" class="form-control" id="pubPhoneNum" value="">
		</div>
	</div>
		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">联系地址</label>
		<div class="col-sm-10">
			<input type="text" name="pubAdrr" class="form-control" id="pubAdrr" value="">
		</div>
	</div>
			<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">主页地址</label>
		<div class="col-sm-10">
			<input type="text" name="pubUrl" class="form-control" id="pubUrl" value="">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="Submit" type="submit" class="btn btn-primary" onClick="check(form1)" value="保存">保存</button>
			<button name="Submit2" id="Submit2" type="button" class="btn btn-danger" value="关闭" onClick="history.back();">关闭</button>
		</div>		
	</div>




 </form>
</body>
</html>
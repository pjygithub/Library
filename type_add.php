<?php
include ("check_login.php"); 
//关闭报错
ini_set("display_errors", "off");
error_reporting(E_ALL | E_STRICT);
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
	if(form.typename.value==""){
		alert("请输入图书类型名称!");form.typename.focus();return false;
	}
	if(form.days.value==""){
		alert("请输入可借天数!");form.days.focus();return false;
	}	
}
</script>

<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
	<form name="form1" method="post" action="type_ok.php" class="form-horizontal">
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">图书类型</label>
		<div class="col-sm-10">
			<input type="text" name="typename" class="form-control" id="typename" value="">
		</div>
	</div>

		<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">可借天数</label>
		<div class="col-sm-10">
			<input type="text" name="days" class="form-control" id="days" value="">
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
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
<script language="javascript">
function checkForm(form){
	for(i=0;i<form.length-2;i++){
		if(form.elements[i].value==""){
			alert("请将图书馆信息填写完整!");
			form.elements[i].focus();
			return false;
		}
	}
}
</script>
</head>
<style type="text/css">
	.control-label{
		/*width: 50%；*/
	}
	.form-group input{
		width:60%;
	}
	.form-group select{
		width:60%;
	}
</style>
<body style="margin-left:22%;margin-top:20px;height:50%;width:80%">
<form name="form1" method="post" action="reader_ok.php" class="form-horizontal">
	<div class="form-group" style="color:red;">
		<label for="firstname" class="col-sm-2 control-label">姓名(必填)</label >
		<div class="col-sm-10">
			<input name="name" type="text" class="form-control" id="name">
		</div>
	</div>
	<div class="form-group" style="color:red;">
	<label for="firstname" class="col-sm-2 control-label">性别(必填)</label >
	<label class="radio-inline">
  <input name="sex" type="radio" value="男">男</label>
  <label class="radio-inline">
	<input name="sex" type="radio" value="女" >女</label>
	</div>
	<div class="form-group" style="color:red;">
		<label for="lastname" class="col-sm-2 control-label">条形码(必填)</label>
		<div class="col-sm-10" style="color:red;">
			<input type="text" name="barcode" class="form-control" id="barcode" >
		</div>
	</div>
	
	<div class="form-group" style="color:red;">
		<label for="lastname" class="col-sm-2 control-label">读者类型(必填)</label>
		<div class="col-sm-10">
		<select name="typeid" class="form-control" id="typeid" >
<?php
  include("conn/conn.php");
  $sql=mysql_query("select * from tb_readertype");
  $info=mysql_fetch_array($sql);
  do{
?> 		
				
          <option value="<?php echo $info["id"];?>"><?php echo $info["name"];?></option>
<?php
}while($info=mysql_fetch_array($sql));
?> 
        </select>   
        </div>     
</div>
	
	<div class="form-group" >
		<label for="lastname" class="col-sm-2 control-label">职业</label>
		<div class="col-sm-10">
			<input type="text" name="vocation" class="form-control" id="vocation" value="无">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">出生日期(必填)</label>
		<div class="col-sm-10">
			<input type="text" name="birthday" class="form-control" id="birthday" value="">2010-01-01
		</div>
	</div>

	<div class="form-group" style="color:red;">
		<label for="lastname" class="col-sm-2 control-label">有效证件(必填)</label>
			<div class="col-sm-10">
		<select name="paperType" class="form-control" id="paperType">
          <option value="身份证">身份证</option>
          <option value="学生证">学生证</option>
          <option value="军官证">军官证</option>
          <option value="工作证">工作证</option>
		</select>
		</div>
	</div>

	<div class="form-group" style="color:red;">
		<label for="lastname" class="col-sm-2 control-label">证件号码(必填)</label>
		<div class="col-sm-10">
			<input type="text" name="paperNO" class="form-control" id="paperNO">
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">电话</label>
		<div class="col-sm-10">
			<input type="text" name="tel" class="form-control" id="tel" value="00000000000">
		</div>
	</div>	

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">E-mail</label>
		<div class="col-sm-10">
			<input type="text" name="email" class="form-control" id="email" value="xxx@xxx.xxx">
		</div>
	</div>	

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">备注</label>
		<div class="col-sm-10">
			<input type="text" name="remark" class="form-control" id="remark" value=" ">
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button name="Submit" type="submit" class="btn btn-primary" onClick="return checkForm(form1)" value="保存">保存</button>
			<button name="Submit2" id="Submit2" type="button" class="btn btn-danger" value="取消" onClick="history.back()">返回</button>
		</div>		
	</div>
</form>

</body>
</html>
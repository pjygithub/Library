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
	<link rel="stylesheet" href="style.css">
</head>
<body style="">
<?php 
include("conn/conn.php");
$sql=mysql_query("select r.id,r.barcode,r.name,t.name as typename,r.paperType,r.paperNO,r.tel,r.email from tb_reader as r join (select * from tb_readertype) as t on r.typeid=t.id");
$info=mysql_fetch_array($sql);
if($info==false){
?> <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无读者信息！</td>
            </tr>
          </table>
<div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='reader_add.php'">添加读者信息</button>
</div>
 <?php 
}else{
  ?>

<table class="table table-hover">
	<thead>
		<tr  bgcolor="#E6E6FA">
			<th >读者ID</th>
			<th >姓名</th>
			<th >读者类型</th>
			<th class="mini-hidden">证件类型</th>
			<th class="mini-hidden">证件号码</th>
			<th >电话</th>
			<th class="mini-hidden">mail</th>
			<th >操作</th>
		</tr>
	</thead>
	<tbody>

<?php 
do{
?> 
 <tr>
    <td><?php echo $info["barcode"];?> </td>  
    <td><a href="reader_info.php?id=<?php echo $info["id"]; ?> "><?php echo $info["name"];?> </a></td>
    <td style="" ><?php echo $info["typename"];?> </td>
    <td class="mini-hidden"><?php echo $info["paperType"];?> </td>
    <td class="mini-hidden"><?php echo $info["paperNO"];?> </td>
    <td>&nbsp;<?php echo $info["tel"];?> </td>
    <td align="left" class="mini-hidden">&nbsp;<?php echo $info["email"];?> </td>
    <td ><a class="btn btn-primary" href="reader_modify.php?id=<?php echo $info["id"];?>">修改</a>
    <a class="btn btn-primary" href="reader_del.php?id=<?php echo $info["id"];?> ">删除</a></td>
  </tr>
<?php 
  }while($info=mysql_fetch_array($sql));
}
?>  
	</tbody>
</table>
<div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='reader_add.php'">添加读者信息</button>
</div>
       

</body>
</html>
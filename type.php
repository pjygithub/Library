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
<body style="margin-left:18%;margin-top:20px;height:50%;width:80%">
    <?php 
    include("conn/conn.php");
    $sql=mysql_query("select * from tb_booktype");
    $info=mysql_fetch_array($sql);

    if($info==false){
    ?>
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无图书类型信息！</td>
            </tr>
          </table>
          <div class="col-sm-offset-5 col-sm-10">
    <button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='type_add.php'">添加图书类型信息
    </button>
    </div>
 <?php
}else{
 ?>

<table class="table table-hover">
	<thead>
		<tr  bgcolor="#E6E6FA">
			<th width="35%">序号</th>
			<th width="35%">图书类型</th>
      <th width="35%">可借天数</th>
			<th width="14%">删除</th>
		</tr>
	</thead>
	<tbody>

<?php 
do{
?> 
  <tr>
    <td >&nbsp;<?php echo $info["id"];?></td>
    <td >&nbsp;<?php echo $info["typename"];?></td>
    <td >&nbsp;<?php echo $info["days"];?></td>
    <td ><a class="btn btn-primary" href="type_del.php?id=<?php echo $info["id"];?>">删除</a></td>
  </tr>
<?php
  }while($info=mysql_fetch_array($sql));
}
?>  
	</tbody>
</table>
    <div class="col-sm-offset-5 col-sm-10">
    <button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='type_add.php'">添加图书类型信息
    </button>
    <button name="Submit2" type="submit" class="btn btn-primary" onClick="history.back()">返回</button>
    </div>   
</body>
</html>
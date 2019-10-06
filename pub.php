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
    $sql=mysql_query("select * from tb_publishing ORDER BY `pubname` ASC");
    $info=mysql_fetch_array($sql);

    if($info==false){
    ?>
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无出版社信息！</td>
            </tr>
          </table>
          <div class="col-sm-offset-5 col-sm-10">
    <button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='pub_add.php'">添加出版社信息
    </button>
    </div>
 <?php
}else{
 ?>

<table class="table table-hover">
	<thead>
		<tr  bgcolor="#E6E6FA">
      <!-- <th width="8%">序号</th> -->
			<th >出版社</th>
      <th>出版社电话</th>
			<th class="mini-hidden">通讯地址</th>
      <th >主页</th>
			<th class="mini-hidden">删除</th>
		</tr>
	</thead>
	<tbody>

<?php 
do{
?> 
  <tr>
    <!-- <td >&nbsp;<?php echo $info["ISBN"];?></td> -->
    <td ><?php echo $info["pubname"];?></td>
    <td ><!-- &nbsp; --><?php echo $info["pubPhoneNum"];?></td>
    <td class="mini-hidden"><?php echo $info["pubAdrr"];?></td>
    <td ><a href="<?php echo $info["pubUrl"];?>" target="_black"><?php echo $info["pubUrl"];?></a></td>
    <td class="mini-hidden"><a class="btn btn-primary" href="pub_del.php?isbn=<?php echo $info["ISBN"];?>">删除</a></td>
  </tr>
<?php
  }while($info=mysql_fetch_array($sql));
}
?>  
	</tbody>
</table>
    <div class="col-sm-offset-5 col-sm-10">
    <button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='pub_add.php'">添加出版社信息
    </button>
    <button name="Submit2" type="submit" class="btn btn-primary" onClick="history.back()">返回</button>
    </div>   
</body>
</html>
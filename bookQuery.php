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
<body style="margin-left:17%;margin-top:0px;height:100%;width:100%;">
          <form class="form-inline" name="form1" method="post" action="">
          <table bordercolor="#FFFFFF" bgcolor="#9ECFEE" style="margin-top:2%;font-size:15px;">
  <tr style="margin-top:0px;font-size:15px;">
    <td >
&nbsp;</td>
    <td>&nbsp;&nbsp;请选择查询依据：
      <select name="f" class="form-control" id="f" width="37">
        <option value="<?php echo "b.barcode";?>" selected>条形码</option>
        <option value="<?php echo "t.typename";?>">类别</option>
        <option value="<?php echo "b.bookname";?>" >书名</option>
        <option value="<?php echo "b.author";?>">作者</option>
        <option value="<?php echo "p.pubname";?>">出版社</option>
        <option value="<?php echo "c.name";?>">书架</option>
                  </select>
<div class="form-group">
    <label class="sr-only" for="name"></label>
    <input name= "key1" type="text" class="form-control" id="key1">
  </div>
  <button type="submit" class="btn btn-primary" value="查询">查询</button>
    </td>
  </tr>
</table>
</form>
<?php
    include("Conn/conn.php");
    $query=mysql_query("select b.*,c.name as bookcasename,p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id");
    $result=mysql_fetch_array($query);
    $flagb = $result['id'];
        if($result==false){
    ?> 
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0" style="dispaly:block;width:100%;height:100%;">
            <tr>
              <td height="36" align="center">暂无图书信息！</td>
            </tr>
          </table>
 <?php
}else{
?>   
<table class="table table-hover" style="display:block;width:83%;margin-top:0px;font-size:12px;text-align: center;right:1%;left:17%">
	<thead style="text-align: center;width:80%;">
		<tr  bgcolor="#E6E6FA" style="text-align: center;width:100%;">
      <th >条形码ISBN</th>
      <th >图书题名</th>
      <th>作者</th>
      <th>译者</th>
      <th >出版社</th>
      <th >索书号</th>
      <th style="width:4%">页码</th>
      <th style="width:4%">价格</th>
      <th style="width:4%">类型</th>
      <th style="width:6%">出版年月</th>
      <th style="width:6%">印刷年月</th>
      <th style="width:4%">字数:千字</th>
      <th style="width:4%">总库存:本</th>
      <th style="width:4%">流通状态</th>
		</tr>
	</thead>
	<tbody>

<?php
if($_POST["key1"]==""){
do{
?>
<style type="text/css">
  .atr{
    text-align: center;
  }
</style>
  <tr class="atr">
    <td>&nbsp;<?php echo $result["barcode"];?></td>  
    <td><a href="book_look.php?id=<?php echo $result["id"]; ?>"><?php echo $result["bookname"];?></a></td>
    <td>&nbsp;<?php echo $result["author"];?></td>
        <td>&nbsp;<?php echo $result["translator"];?></td>
    <td>&nbsp;<?php echo $result["pubname"];?></td>
    <td>&nbsp;<?php echo $result["bookcasename"];echo $result["findnum"];?></td>
    <td>&nbsp;<?php echo $result["page"];?></td>      
    <td>&nbsp;￥<?php echo $result["price"];?></td>  
    <td>&nbsp;<?php echo $result["typename"];?></td>
    <td>&nbsp;<?php echo $result["pubTime"];?></td>      
    <td>&nbsp;<?php echo $result["printTime"];?></td>  
    <td>&nbsp;<?php echo $result["totalWord"];?></td>
    <td>&nbsp;<?php echo $result["total"];?></td>
    <?php 
              //流通状态查询
              include('./conn/conn.php');
              $flagb = $result[id];
              $borrow_sql = mysql_query("SELECT a.bookid,a.ifback, a.backTime as udtime FROM tb_borrow a, tb_bookinfo book  WHERE a.bookid = $flagb ORDER BY udtime DESC LIMIT 1");
              $borrow_flag = mysql_fetch_array($borrow_sql);
              $flag = $borrow_flag["ifback"];
              // echo $flag;
              // die;
              // echo "$flag" ;
              if($flag=="0"){ 
                echo "<td><b>借出</b></td>";
              }else{ 
                echo "<td><b>在架</b></td>";
              };
            ?>
    </tr>
<?php
  }while($result=mysql_fetch_array($query));
}else{
$f=$_POST["f"];
$key1=$_POST["key1"];
$sql=mysql_query("select b.*,c.name as bookcasename,p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id where $f like '%$key1%'");
$info=mysql_fetch_array($sql);
if($info==true){
do{
?>
  <tr>
    <td>&nbsp;<?php echo $result["barcode"];?></td>  
    <td><a href="book_look.php?id=<?php echo $result["id"]; ?>"><?php echo $result["bookname"];?></a></td>
    <td>&nbsp;<?php echo $result["author"];?></td>
        <td>&nbsp;<?php echo $result["translator"];?></td>
    <td>&nbsp;<?php echo $result["pubname"];?></td>
    <td>&nbsp;<?php echo $result["bookcasename"];echo $result["findnum"];?></td>
    <td>&nbsp;<?php echo $result["page"];?></td>      
    <td>￥<?php echo $result["price"];?></td>  
    <td>&nbsp;<?php echo $result["typename"];?></td>
    <td>&nbsp;<?php echo $result["pubTime"];?></td>      
    <td>&nbsp;<?php echo $result["printTime"];?></td>  
    <td>&nbsp;<?php echo $result["totalWord"];?></td>
    <td>&nbsp;<?php echo $result["total"];?></td>
        <?php 
              //流通状态查询
              include('./conn/conn.php');
              
              $borrow_sql = mysql_query("SELECT a.bookid,a.ifback, a.backTime as udtime FROM tb_borrow a, tb_bookinfo book  WHERE a.bookid = $flagb ORDER BY udtime DESC LIMIT 1");
              $borrow_flag = mysql_fetch_array($borrow_sql);
              $flag = $borrow_flag["ifback"];
              // echo $flag;
              // die;
              // echo "$flag" ;
              if($flag=="0"){ 
                echo "<td><b>借出</b></td>";
              }else{ 
                echo "<td><b>在架</b></td>";
              };
            ?>
    </tr>
<?php
}while($info=mysql_fetch_array($sql));
}else{
?>
    <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0" style="dispaly:block;width:100%;height:100%;font-size:22px;">
       <tr>
         <td height="36" align="center">您检索的图书信息不存在，请重新检索！</td>
       </tr>
    </table>
<?php
mysql_close($conn);
}
}
}
?>  
	</tbody>
</table>
</body>
</html>
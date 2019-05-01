<?php
include ("check_login.php"); 
 if (!session_id()) session_start();
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
<body style="margin-left:17%;margin-top:20px;height:50%;width:83%;font-size:10px;">
<?php
    include("Conn/conn.php");
    $query=mysql_query("SELECT book.*, book.barcode, book.id AS bookid, book.bookname, bt.typename, pb.pubname, bc.name, book.bookcase FROM tb_bookinfo book JOIN tb_booktype bt ON book.typeid = bt.id JOIN tb_publishing pb ON book.ISBN = pb.ISBN JOIN tb_bookcase bc ON book.bookcase = bc.id");
    $result=mysql_fetch_array($query);
    $flagb = $result['id'];
    $query_1=mysql_query("select b.*,c.name as bookcasename,p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id");
    $result_1=mysql_fetch_array($query_1);

        if($result==false){
    ?> 
    <style type="text/css">
    *{
      margin: 0;
      padding: 0;
    }
    .checkbook{
      width: 80%;
      font-size:39px;
      position: relative;
      top:50%;
    }
    .checkbook button{
      font-size: 14px;
      background-color: #c54a0eeb;
    }
    </style>
    <div class="checkbook">
          <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" align="center">暂无图书信息！</td>
            </tr>
          </table>
   <div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='book_add.php'">添加图书信息</button>
</div>
</div>
 <?php
}else{
?>
<div class="col-sm-offset-5 col-sm-10" style="width:10px;padding-left:0px;position:fixed;right:8%;top:0%;">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='book_add.php'" style="background-color:red;font-size:16px;">添加图书信息</button>
</div>   
<table class="table table-hover">
  <style type="text/css">
    thead tr td{
      text-align: center;
    }
  </style>
  <thead>
    <tr  bgcolor="#E6E6FA" >
      <th >条形码ISBN</th>
      <th >图书题名</th>
      <th style="width:5%">作者</th>
      <th style="width:5%">译者</th>
      <th >出版社</th>
      <th >索书号</th>
      <th style="width:4%">页码</th>
      <th style="width:4%">价格</th>
      <th style="width:4%">类型</th>
      <th style="width:5%">出版年月</th>
      <th style="width:5%">印刷年月</th>
      <th style="width:4%">字数:千字</th>
      <th style="width:4%">总库存:本</th>
      <th style="width:6%">预览图</th>
      <th style="width:4%">流通状态</th>
      <th colspan="2" style="width:5%">操作</th>
    </tr>
  </thead>
	<tbody>

<?php 
do{
?> 
 <tr class="atr" style="text-align: center;">
    <td><?php echo $result["barcode"];?></td>  
    <td><a href="book_look.php?id=<?php echo $result["id"]; ?>"><?php echo $result["bookname"];?></a></td>
    <td><?php echo $result["author"];?></td>
    <td><?php echo $result["translator"];?></td>
    <td><?php echo $result["pubname"];?></td>
    <td><?php echo $result["name"];echo $result["findnum"];?></td>
    <td><?php echo $result["page"];?></td>      
    <td>￥<?php echo $result["price"];?></td>  
    <td><?php echo $result["typename"];?></td>
    <td><?php echo $result["pubTime"];?></td>      
    <td><?php echo $result["printTime"];?></td>  
    <td><?php echo $result["totalWord"];?></td>
    <td><?php echo $result["total"];?></td>

    <td><img src="<?php echo "./bookimg/";echo $result["imgUrl"];?>" width="80%" style="display:block;margin-top:0px;position: relative;top:0px;left:0px;"></td>
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
    <td ><a class="btn btn-primary" href="book_Modify.php?id=<?php echo $result["bookid"];?>" style="font-size:6px;">修改</a></td>
    <td ><a class="btn btn-primary" href="book_del.php?id=<?php echo $result['bookid'];?>" style="font-size:6px;">删除</a></td>
  </tr>
<?php 
  }while($result=mysql_fetch_array($query));
}
?>  
	</tbody>
</table>
<!-- <div class="col-sm-offset-5 col-sm-10">
<button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='book_add.php'">添加图书信息</button>
</div> -->
</body>
</html>
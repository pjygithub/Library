<?php
    include ("check_login.php"); 
    //关闭报错
    ini_set("display_errors", "off");
    error_reporting(E_ALL | E_STRICT);
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
    <link rel="stylesheet" href="./style.css">
</head>
<body style="">
    <?php
        include("Conn/conn.php");
        $query=mysql_query("SELECT book.*, book.barcode, book.id AS bookid, book.bookname, bt.typename, pb.pubname, bc.name, book.bookcase FROM tb_bookinfo book JOIN tb_booktype bt ON book.typeid = bt.id JOIN tb_publishing pb ON book.ISBN = pb.ISBN JOIN tb_bookcase bc ON book.bookcase = bc.id");
        $result=mysql_fetch_array($query);
        $flagb = $result['id'];
        $query_1=mysql_query("select b.*,c.name as bookcasename,p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id");
        $result_1=mysql_fetch_array($query_1);

        if($result==false){ 
    ?>
        <div class="checkbook">
              <table width="100%" height="30"  border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="36" style="text-align:center">暂无图书信息！</td>
                </tr>
              </table>
        </div>
        <div class="col-sm-offset-5 col-sm-10">
            <button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='book_add.php'">添加图书信息</button>
        </div>
    <?php
        }else{
    ?>
          
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="mini-hidden">条形码ISBN</th>
                    <th >图书题名</th>
                    <th >作者</th>
                    <th class="mini-hidden">译者</th>
                    <th class="mini-hidden">出版社</th>
                    <th >索书号</th>
                    <th class="mini-hidden">页码</th>
                    <th >价格</th>
                    <th class="mini-hidden">类型</th>
                    <th class="mini-hidden">出版年月</th>
                    <th class="mini-hidden">印刷年月</th>
                    <th class="mini-hidden">字数:千字</th>
                    <th class="mini-hidden">总库存:本</th>
                    <th class="mini-hidden">预览图</th>
                    <th ><span>流通</span><span>状态</span></th>
                    <th colspan="2">
                      <div class="col-sm-offset-5 col-sm-10">
                          <button name="Submit" type="submit" class="btn btn-primary" onClick="self.location.href='book_add.php'" style="background-color:red;font-size:16px;">添加图书</button>
        </div><div>操作<div></th>
                </tr>
            </thead>
          <tbody>

    <?php 
        do{
    ?> 
        <tr class="atr" style="text-align: center;">
            <td class="mini-hidden"><?php echo $result["barcode"];?></td>  
            <td><a href="book_look.php?id=<?php echo $result["id"]; ?>"><?php echo $result["bookname"];?></a></td>
            <td><?php echo $result["author"];?></td>
            <td class="mini-hidden"><?php echo $result["translator"];?></td>
            <td class="mini-hidden"><?php echo $result["pubname"];?></td>
            <td><?php echo $result["name"];echo $result["findnum"];?></td>
            <td class="mini-hidden"><?php echo $result["page"];?></td>      
            <td>￥<?php echo $result["price"];?></td>  
            <td class="mini-hidden"><?php echo $result["typename"];?></td>
            <td class="mini-hidden"><?php echo $result["pubTime"];?></td>      
            <td class="mini-hidden"><?php echo $result["printTime"];?></td>  
            <td class="mini-hidden"><?php echo $result["totalWord"];?></td>
            <td class="mini-hidden"><?php echo $result["total"];?></td>
            <td class="mini-hidden">
              <img src="<?php echo "./bookimg/";echo $result["imgUrl"];?>" width="80%" style="display:block;margin-top:0px;position: relative;top:0px;left:0px;width:3.2rem">
            </td>
            <td>
                <b>
                    <?php 
                        //流通状态查询
                        include('./conn/conn.php');
                        $flagb = $result[id]; 
                        $borrow_sql = mysql_query("SELECT a.bookid,a.ifback, a.backTime as udtime FROM tb_borrow a, tb_bookinfo book  WHERE a.bookid = $flagb ORDER BY udtime DESC LIMIT 1");
                        $borrow_flag = mysql_fetch_array($borrow_sql);
                        $flag = $borrow_flag["ifback"];
                        if($flag=="0"){ 
                            echo "借出";
                        }else{ 
                            echo "在架";
                        };
                    ?>
               </b>
            </td>   
            <td >
              <a class="btn btn-primary" href="book_Modify.php?id=<?php echo $result["bookid"];?>" style="font-size:6px;">修改</a>
            </td>
            <td >
              <a class="btn btn-primary" href="book_del.php?id=<?php echo $result['bookid'];?>" style="font-size:6px;">删除</a>
            </td>
        </tr>
    <?php 
      }while($result=mysql_fetch_array($query));
    }
    ?>  
	  </tbody>
</table>
</body>
</html>
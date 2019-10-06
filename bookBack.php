<?php
include ("check_login.php"); 
     //自定义关闭报错
    ini_set("display_errors", "off");
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
  <link rel="stylesheet" href="style.css">

<script language="javascript">
		function checkreader(form){
			if(form.barcode.value==""){
				alert("请输入读者条形码!");form.barcode.focus();return;
			}
      // if(form.readername.value==""){
      //   alert("该读者不存在!");form.readername.focus();return;
      //   var obj = document.getEelementById("#barcode");
      //   $('#barcode').click(function(){
      //     $('.col-sm-10 input').each(function(){
      //       $(this).val('');
      //     })
      //   })

      // }   
			form.submit();
		}
</script>
</head>
<body style="">
	<?php
include("conn/conn.php");
$sql=mysql_query("select borr.id as borrid,borr.borrowTime,borr.backTime,borr.ifback,r.*,t.name as typename,t.number,book.bookname,book.price,pub.pubname,bc.name as bookcase from tb_borrow as borr join tb_reader r on borr.readerid=r.id join tb_readerType t on r.typeid=t.id join tb_bookinfo as book on book.id=borr.bookid join tb_publishing as pub on book.ISBN=pub.ISBN  join tb_bookcase as bc on book.bookcase=bc.id where r.barcode='".$_POST["barcode"]."' and borr.ifback=0");
$info=mysql_fetch_array($sql);
 ?>
<form name="form1" method="post" action="" class="form-horizontal">
	

<div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">读者条形码</label>
    <div class="col-sm-10" style="">
      <input name="barcode" type="text" class="form-control" id="barcode" value="<?php echo $info["barcode"];?>">
    </div>
<!-- 
  </div> -->
<!--   <div class="form-group"> -->
    <div class="col-sm-offset-2 col-sm-10" style="" >
      <button name="Button" type="button" class="btn btn-primary" onClick="checkreader(form1)" value="查询条码">查询条码</button>
    </div>    
  </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10" style="">
      <input name="readerid" type="hidden" class="form-control" id="readerid" value="<?php echo $info["id"];?>" readonly>
      <input name="readername" type="text" class="form-control" id="readername" value="<?php echo $info["name"];?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">性别</label>
    <div class="col-sm-10"  style="">
      <input name="sex" type="text" class="form-control" id="bookName" value="<?php echo $info["sex"];?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">证件类型</label>
    <div class="col-sm-10"  style="">
      <input name="paperType" type="text" class="form-control" id="paperType" value="<?php echo $info["paperType"];?>" readonly>
    </div>
  </div>
  <div class="form-group" style="width:;">
    <label for="firstname" class="col-sm-2 control-label">证件号码</label>
    <div class="col-sm-10"  style="">
      <input name="paperNo" type="text" class="form-control" id="paperNo" value="<?php echo $info["paperNO"];?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">读者类型</label>
    <div class="col-sm-10"  style="">
      <input name="readerType" type="text" class="form-control" id="readerType" value="<?php echo $info["number"];?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">可借数量</label>
    <div class="col-sm-10"  style="">
      <input name="number" type="text" class="form-control" id="number" value="<?php echo $info["number"];?>" readonly>
    </div>
  </div>  
       <tr>
         <td  ><table class="table table-hover">
                   <tr  bgcolor="#e3F4F7">
                     <td >图书名称</td>
                     <td>借阅时间</td>
                     <td >应还时间</td>
                     <td >出版社</td>
                     <td >书架</td>
                     <td >定价(元)</td>
                     <td >归还</td>
                   </tr>
<?php 
if($info){
do{ ?>
                   <tr>
                     <td>&nbsp;<?php echo $info["bookname"];?></td>
                     <td >&nbsp;<?php echo $info["borrowTime"];?></td>
                     <td>&nbsp;<?php echo $T=$info["backTime"];?></td>
                     <td>&nbsp;<?php echo $info["pubname"];?></td>
                     <td>&nbsp;<?php echo $info["bookcase"];?></td>
                     <td>&nbsp;<?php echo $info["price"];?></td>
                     <td><a class="btn btn-primary" href="bookBack_ok.php?borrid=<?php echo $info["borrid"];?>&barcode=<?php echo $info["barcode"];?>">归还</a>&nbsp;
                     </td>
                   </tr>
<?php }while($info=mysql_fetch_array($sql));}?>
                 </table>                 </td>
       </tr>
</form>

</body>
</html>
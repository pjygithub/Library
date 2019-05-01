<?php
include("./conn.php");
//详细查询
	$all_sql=mysql_query("SELECT book.barcode, book.id AS bookid, book.bookname, bt.typename, book.author, book.translator, pb.pubname, pb.pubAdrr, pb.pubUrl, book.price, book.page, bc.name, book.imgUrl, pubTime, pubNum, printTime, printNum, PAGE, price, size, typename, printPage, totalWord, findnum,total FROM tb_borrow a, tb_bookinfo book JOIN tb_booktype bt ON book.typeid = bt.id JOIN tb_publishing pb ON book.ISBN = pb.ISBN JOIN tb_bookcase bc ON book.bookcase = bc.id WHERE book.id = $_GET[id]");
	$info=mysql_fetch_array($all_sql);
	echo $info;
//流通状态查询
	$borrow_sql = mysql_query("SELECT a.bookid,a.ifback, a.backTime as udtime FROM tb_borrow a, tb_bookinfo book  WHERE a.bookid = $_GET[id] ORDER BY udtime DESC LIMIT 1 ");
	$borrow_flag = mysql_fetch_array($borrow_sql);
	$flag = $borrow_flag["ifback"];
	echo $flag;
//搜索查询
	$query=mysql_query("select b.*,c.name as bookcasename,p.pubname,t.typename from tb_bookinfo b left join tb_bookcase c on b.bookcase=c.id join tb_publishing p on b.ISBN=p.ISBN join tb_booktype t on b.typeid=t.id");
    $result=mysql_fetch_array($query);
    $query_1=mysql_query("select b.borrowTime,b.backTime,b.ifback,r.barcode as readerbarcode,r.name,k.id,k.barcode,k.bookname from tb_borrow b join tb_reader r on b.readerid=r.id join tb_bookinfo k on b.bookid=k.id");
    $result_1=mysql_fetch_array($query_1);
	echo $result;
	echo $result_1;   

?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>图书管理系统-后台</title>
	<link rel="stylesheet" type="text/css" href="admin/css/htmleaf-demo.css">
	<link rel="stylesheet" type="text/css" href="admin/css/nav.css">
	<link rel="stylesheet" type="text/css" href="admin/fonts/iconfont.css">
	<link rel="stylesheet" href="./style.css">
</head>
<div class="nav-mini" style="height:100%;">
	        <div class="nav-top">
	            <div id="mini" style="border-bottom:1px solid rgba(255,255,255,.1)">
	            <p class="userinfo-mini" style="">欢迎您，<?php echo $_SESSION["admin_name"];?>。</p>
	            <img src="admin/images/mini.png">
	        </div>
	        <ul>
	        	<li class="nav-item">
	                <a href="rank.php" target="menuFrame"><i class="iconfont icon-shouye"></i><span>首页</span></a>
	            </li>
	            <li class="nav-item">
	                <a href="book.php" target="menuFrame"><i class="iconfont icon-tushuguanli"></i><span>图书管理</span></a>
	            </li>
	            <li class="nav-item">
	                <a href="javascript:;"><i class="iconfont icon-jieyueguanli"></i><span>借阅管理</span><i class="iconfont icon-gengduo"></i></a>
	                <ul>
	                    <li><a href="bookBorrow.php" target="menuFrame"><span>图书借阅</span></a></li>
	                    <li><a href="bookRenew.php" target="menuFrame"><span>图书续借</span></a></li>
	                    <li><a href="bookBack.php" target="menuFrame"><span>图书归还</span></a></li>
	                </ul>
	            </li>
	            <li class="nav-item">
	                <a href="javascript:;"><i class="iconfont icon-search"></i><span>系统查询</span><i class="iconfont icon-gengduo"></i></a>
	                <ul>
	                    <li><a href="bookQuery.php" target="menuFrame"><span>图书档案查询</span></a></li>
	                    <li><a href="borrowQuery.php" target="menuFrame"><span>图书借阅查询</span></a></li>
	                    <li><a href="bremind.php" target="menuFrame"><span>借阅到期提醒</span></a></li>
	                </ul>
	            </li>	            
	            <li class="nav-item">
	                <a href="javascript:;"><i class="iconfont icon-duzheguanli"></i><span>读者管理</span><i class="iconfont icon-gengduo"></i></a>
	                <ul>
	                	<li><a href="reader.php" target="menuFrame"><span>读者档案</span></a></li>
	                    <li><a href="readerType.php" target="menuFrame"><span>读者类型</span></a></li>

	                </ul>
	            </li>
	            <li class="nav-item">
	                <a href="javascript:;"><i class="iconfont icon-houtai-xitongguanli"></i><span>系统管理</span><i class="iconfont icon-gengduo"></i></a>
	                <ul>
	                	<li><a href="pub.php" target="menuFrame"><span>出版社信息设置</span></a></li>
	                	<li><a href="type.php" target="menuFrame"><span>图书类型设置</span></a></li>
	                	<li><a href="bookcase.php" target="menuFrame"><span>书架设置</span></a></li>                 
	                    <li><a href="library_modify.php" target="menuFrame"><span>图书馆信息</span></a></li>
	                    <li><a href="manager.php" target="menuFrame"><span>管理员管理</span></a></li>
	                    <li><a href="parameter_modify.php" target="menuFrame"><span>证件参数设置</span></a></li>


	                </ul>
	            </li>

	            <li class="nav-item">
	                <a href="pwd_Modify.php" target="menuFrame"><i class="iconfont icon-genggaimima"></i><span>更改口令</span></a>
	            </li>
	            <li class="nav-item">
	                <a href="safequit.php" ><i class="iconfont icon-anquantuichu"></i><span>安全退出</span></a>
	            </li>
	        </ul>
	    </div>
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `tb_bookcase` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '书架ID',
  `name` varchar(30) NOT NULL COMMENT '书架号',
  `more` varchar(655) DEFAULT NULL COMMENT '更多'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='书架表';

INSERT INTO `tb_bookcase` (`id`, `name`, `more`) VALUES
(1, 'A', '最底层'),
(2, 'B', ''),
(3, 'C', ''),
(4, 'D', ''),
(5, 'E', '');

CREATE TABLE `tb_bookinfo` (
  `id` int(20) NOT NULL COMMENT '图书ID',
  `barcode` varchar(60) DEFAULT NULL COMMENT '条形码',
  `bookname` varchar(255) DEFAULT NULL COMMENT '图书名称',
  `author` varchar(60) DEFAULT NULL COMMENT '作者',
  `translator` varchar(60) DEFAULT NULL COMMENT '译者',
  `ISBN` int(10) DEFAULT NULL COMMENT '出版社ID',
  `bookcase` int(10) DEFAULT NULL COMMENT '书架ID',
  `findnum` varchar(60) DEFAULT NULL COMMENT '索书号尾号',
  `pubTime` varchar(30) DEFAULT NULL COMMENT '出版时间',
  `pubNum` varchar(30) DEFAULT NULL COMMENT '版次',
  `printTime` varchar(30) DEFAULT NULL COMMENT '印刷时间',
  `printNum` varchar(10) DEFAULT NULL COMMENT '印次',
  `page` int(12) DEFAULT NULL COMMENT '页码数',
  `price` float DEFAULT NULL COMMENT '价格',
  `typeid` int(10) DEFAULT NULL COMMENT '图书类别ID',
  `size` varchar(70) DEFAULT NULL COMMENT '大小',
  `printPage` varchar(70) DEFAULT NULL COMMENT '印张',
  `totalWord` int(12) DEFAULT NULL COMMENT '字数',
  `total` int(10) DEFAULT NULL COMMENT '库存',
  `imgUrl` varchar(655) DEFAULT NULL COMMENT '图书预览图',
  `operator` varchar(60) CHARACTER SET gb2312 DEFAULT NULL COMMENT '登记员',
  `inTime` date DEFAULT NULL COMMENT '入库时间',
  `storage` int(100) DEFAULT NULL,
  `del` tinyint(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图书信息表';

INSERT INTO `tb_bookinfo` (`id`, `barcode`, `bookname`, `author`, `translator`, `ISBN`, `bookcase`, `findnum`, `pubTime`, `pubNum`, `printTime`, `printNum`, `page`, `price`, `typeid`, `size`, `printPage`, `totalWord`, `total`, `imgUrl`, `operator`, `inTime`, `storage`, `del`) VALUES
(3, '4526271143002', '说话心理学——跟任何人都聊得来', '宋璐璐', '原文', 1, 3, '0000.01', '2016-7', '一', '2016-7', '1', 100, 32, 1, '0134mm X 1110mm 16k', '19 1/6', 577, 1, '/4526271143002.jpg', 'admin', '2019-05-01', NULL, 0),
(4, '9787122081667', '有机化学', ' 段文贵 主编', '原文', 1, 2, '0000.00', '1900-1', '一', '1900-1', '1', 305, 39, 1, '0mm X 0mm 0k', '0 1/1', 0, 1, '/9787122081667.jpg', 'admin', '2019-05-01', NULL, 0);

CREATE TABLE `tb_booktype` (
  `id` int(10) UNSIGNED NOT NULL,
  `typename` varchar(30) CHARACTER SET gb2312 DEFAULT NULL COMMENT '图书类别',
  `days` int(10) UNSIGNED DEFAULT NULL COMMENT '可借天数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图书类别表';

INSERT INTO `tb_booktype` (`id`, `typename`, `days`) VALUES
(1, '大学教材', 30),
(2, '工具书', 45),
(3, '高中教材', 20),
(4, '计算机技术学习资料', 30),
(5, '心理&哲学', 30);

CREATE TABLE `tb_borrow` (
  `id` int(10) UNSIGNED NOT NULL,
  `readerid` int(10) UNSIGNED DEFAULT NULL COMMENT '读者ID',
  `bookid` int(10) DEFAULT NULL COMMENT '图书ID',
  `borrowTime` date DEFAULT NULL COMMENT '借出时间',
  `backTime` date DEFAULT NULL COMMENT '还书时间',
  `operator` varchar(30) DEFAULT NULL COMMENT '操作员',
  `ifback` tinyint(1) DEFAULT '0' COMMENT '已还'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='借阅表';

INSERT INTO `tb_borrow` (`id`, `readerid`, `bookid`, `borrowTime`, `backTime`, `operator`, `ifback`) VALUES
(1, 1, 1, '2019-04-30', '2019-05-30', 'admin', 0),
(2, 1, 2, '2019-04-30', '2019-05-30', 'admin', 0),
(3, 1, 3, '2019-04-30', '2019-05-01', 'admin', 1),
(4, 5, 4, '2019-05-01', '2019-05-31', 'admin', 0);

CREATE TABLE `tb_library` (
  `id` int(10) UNSIGNED NOT NULL,
  `libraryname` varchar(50) CHARACTER SET gb2312 DEFAULT NULL COMMENT '图书馆名称',
  `curator` varchar(10) CHARACTER SET gb2312 DEFAULT NULL COMMENT '馆长',
  `tel` varchar(20) CHARACTER SET gb2312 DEFAULT NULL COMMENT '联系电话',
  `address` varchar(100) CHARACTER SET gb2312 DEFAULT NULL COMMENT '图书馆地址',
  `email` varchar(100) CHARACTER SET gb2312 DEFAULT NULL COMMENT '邮箱',
  `url` varchar(100) CHARACTER SET gb2312 DEFAULT NULL COMMENT '主页',
  `createDate` date DEFAULT NULL COMMENT '建馆时间',
  `introduce` text CHARACTER SET gb2312 COMMENT '图书馆简介',
  `notie` varchar(655) DEFAULT NULL COMMENT '通知'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图书馆信息表';

INSERT INTO `tb_library` (`id`, `libraryname`, `curator`, `tel`, `address`, `email`, `url`, `createDate`, `introduce`, `notie`) VALUES
(1, '图书馆', '金馆长', '157******91', '中国', '********@qq.com', 'http://10.10.10.10', '2019-12-31', '哈哈', '唧唧');

CREATE TABLE `tb_manager` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL COMMENT '管理员登录名',
  `pwd` varchar(40) DEFAULT NULL COMMENT '登录口令'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员表';

INSERT INTO `tb_manager` (`id`, `name`, `pwd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

CREATE TABLE `tb_parameter` (
  `id` int(10) UNSIGNED NOT NULL,
  `cost` int(10) UNSIGNED DEFAULT NULL COMMENT '办证费',
  `validity` int(10) UNSIGNED DEFAULT NULL COMMENT '证件有效期'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='参数设置表';

INSERT INTO `tb_parameter` (`id`, `cost`, `validity`) VALUES
(1, 0, 12);

CREATE TABLE `tb_publishing` (
  `ISBN` int(10) NOT NULL COMMENT '出版社ID',
  `pubname` varchar(30) CHARACTER SET gb2312 DEFAULT NULL COMMENT '出版社名称',
  `pubAdrr` varchar(255) DEFAULT NULL COMMENT '出版社地址',
  `pubUrl` varchar(255) DEFAULT NULL COMMENT '出版社主页',
  `pubPhoneNum` varchar(12) DEFAULT '0000000000' COMMENT '联系电话'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='出版社列表';

INSERT INTO `tb_publishing` (`ISBN`, `pubname`, `pubAdrr`, `pubUrl`, `pubPhoneNum`) VALUES
(1, '北京:化学工业出版社', '北京市东城区青年湖南街13号（100011）', 'http://www.cip.com.cn', '010-64518888');

CREATE TABLE `tb_purview` (
  `id` int(11) NOT NULL,
  `sysset` tinyint(1) DEFAULT '0' COMMENT '系统设置',
  `readerset` tinyint(1) DEFAULT '0' COMMENT '读者管理',
  `bookset` tinyint(1) DEFAULT '0' COMMENT '图书档案管理',
  `borrowback` tinyint(1) DEFAULT '0' COMMENT '图书借还',
  `sysquery` tinyint(1) DEFAULT '0' COMMENT '系统查询'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限表';

INSERT INTO `tb_purview` (`id`, `sysset`, `readerset`, `bookset`, `borrowback`, `sysquery`) VALUES
(1, 1, 1, 1, 1, 1);

CREATE TABLE `tb_reader` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) CHARACTER SET gb2312 DEFAULT NULL COMMENT '读者姓名',
  `sex` varchar(4) CHARACTER SET gb2312 DEFAULT NULL COMMENT '性别',
  `barcode` varchar(30) CHARACTER SET gb2312 DEFAULT NULL COMMENT '读者条形码',
  `vocation` varchar(50) CHARACTER SET gb2312 DEFAULT NULL COMMENT '身份职位',
  `birthday` date DEFAULT NULL COMMENT '出生日期',
  `paperType` varchar(10) CHARACTER SET gb2312 DEFAULT NULL COMMENT '证件类型',
  `paperNO` varchar(20) CHARACTER SET gb2312 DEFAULT NULL COMMENT '证件号码',
  `tel` varchar(20) CHARACTER SET gb2312 DEFAULT NULL COMMENT '联系电话',
  `email` varchar(100) CHARACTER SET gb2312 DEFAULT NULL COMMENT '联系邮箱',
  `createDate` date DEFAULT NULL COMMENT '办证时间',
  `operator` varchar(30) CHARACTER SET gb2312 DEFAULT NULL COMMENT '操作员',
  `remark` varchar(255) CHARACTER SET gb2312 DEFAULT NULL COMMENT '备注',
  `typeid` int(11) DEFAULT NULL COMMENT '读者类别'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='读者表';

INSERT INTO `tb_reader` (`id`, `name`, `sex`, `barcode`, `vocation`, `birthday`, `paperType`, `paperNO`, `tel`, `email`, `createDate`, `operator`, `remark`, `typeid`) VALUES
(5, '潘先生', '男', '1111', '无', '2010-06-03', '身份证', '45102719********73', '00000000000', 'xxx@xxx.xxx', '2019-04-30', '', ' ', 1);

CREATE TABLE `tb_readertype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET gb2312 DEFAULT NULL COMMENT '类型名称',
  `number` int(4) DEFAULT NULL COMMENT '可借图书数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='读者类别表';

INSERT INTO `tb_readertype` (`id`, `name`, `number`) VALUES
(1, '学生', 4),
(2, '图书爱好者', 3),
(3, '教师', 2),
(4, '程序员', 2),
(5, '普通读者', 3),
(6, 'VIP读者', 5);


ALTER TABLE `tb_bookcase`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_bookinfo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_booktype`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_borrow`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_library`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_manager`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_parameter`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_publishing`
  ADD PRIMARY KEY (`ISBN`);

ALTER TABLE `tb_purview`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_reader`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_readertype`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tb_bookcase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '书架ID', AUTO_INCREMENT=6;
ALTER TABLE `tb_bookinfo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT '图书ID', AUTO_INCREMENT=5;
ALTER TABLE `tb_booktype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `tb_borrow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `tb_library`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `tb_manager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
ALTER TABLE `tb_parameter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `tb_publishing`
  MODIFY `ISBN` int(10) NOT NULL AUTO_INCREMENT COMMENT '出版社ID', AUTO_INCREMENT=2;
ALTER TABLE `tb_purview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `tb_reader`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `tb_readertype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

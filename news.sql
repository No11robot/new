-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-06-21 06:18:32
-- 服务器版本： 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `cId` int(11) NOT NULL AUTO_INCREMENT,
  `uId` int(4) NOT NULL COMMENT '外键，用户id',
  `Ccontent` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '评论内容',
  `cDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论时间',
  `nId` int(11) NOT NULL COMMENT '外键，新闻id',
  PRIMARY KEY (`cId`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='新闻评论表';

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`cId`, `uId`, `Ccontent`, `cDate`, `nId`) VALUES
(1, 2, '紧随习大大脚步', '2018-05-28 03:17:00', 1),
(2, 3, 'The King ,骑士总冠军！！！', '2018-05-29 06:00:00', 5),
(3, 2, 'long live the king!!!', '2018-05-30 09:00:00', 5),
(4, 1, '骑勇4.0，哈哈哈', '2018-05-31 02:00:00', 5),
(5, 4, '站我破骑，逆天改命！！！', '2018-05-30 01:00:00', 5),
(6, 2, '愿世界和平~', '2018-06-05 07:00:00', 2),
(7, 4, '科技强国', '2018-06-05 08:16:02', 1),
(8, 4, 'dadwdqwww', '2018-06-05 08:20:59', 1),
(9, 1, '愿天堂没有病痛。', '2018-06-05 08:37:58', 7),
(10, 2, '一路走好', '2018-06-05 08:40:19', 7),
(14, 3, 'test1111', '2018-06-05 14:17:42', 1);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `comments_users`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `comments_users`;
CREATE TABLE IF NOT EXISTS `comments_users` (
`nId` int(11)
,`cId` int(11)
,`Ccontent` varchar(100)
,`cDate` timestamp
,`uId` int(11)
,`uName` varchar(20)
,`headShot` varchar(20)
);

-- --------------------------------------------------------

--
-- 表的结构 `disclose`
--

DROP TABLE IF EXISTS `disclose`;
CREATE TABLE IF NOT EXISTS `disclose` (
  `dId` int(11) NOT NULL AUTO_INCREMENT,
  `dName` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '爆料人姓名',
  `dPhone` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '电话',
  `dEmail` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '邮箱',
  `dConnent` text CHARACTER SET utf8 NOT NULL COMMENT '爆料内容',
  `dTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '爆料时间',
  `uName` varchar(20) CHARACTER SET utf8 DEFAULT '游客' COMMENT '用户名',
  PRIMARY KEY (`dId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='爆料表';

--
-- 转存表中的数据 `disclose`
--

INSERT INTO `disclose` (`dId`, `dName`, `dPhone`, `dEmail`, `dConnent`, `dTime`, `uName`) VALUES
(1, '刘先生', '12356748231', 'liu123@sohu.com', '中山路步行街路段有人持枪抢劫，目前已有一人受伤，警察尚未赶到。。。', '2018-06-06 02:18:37', 'abc'),
(5, '西西', '333333333333', '3333@hfsdin', '南昌下大大冰咆但是科举考试积分抵扣', '2018-06-10 14:52:13', '游客'),
(3, '齐天大圣', '11111111111', 'shuiliantong@qq.com', '俺老孙，要去大闹天空了！！', '2018-06-06 02:54:38', '游客');

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `nId` int(11) NOT NULL AUTO_INCREMENT,
  `nDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新闻时间',
  `author` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '记者名',
  `title` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '标题',
  `sketch` varchar(400) CHARACTER SET utf8 NOT NULL COMMENT '新闻简述',
  `content` varchar(80) CHARACTER SET utf8 NOT NULL COMMENT '新闻内容文件路径',
  `sId` int(4) NOT NULL COMMENT '外键，板块',
  `picture` varchar(80) CHARACTER SET utf8 DEFAULT NULL COMMENT '图片路径',
  `hotWords` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '热词',
  PRIMARY KEY (`nId`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='新闻表';

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`nId`, `nDate`, `author`, `title`, `sketch`, `content`, `sId`, `picture`, `hotWords`) VALUES
(1, '2018-05-28 01:18:00', '陈芳、余晓洁', '习近平：瞄准世界科技前沿引领科技发展方向 \r\n抢占先机迎难而上建设世界科技强国', '5月28日，中国科学院第十九次院士大会、中国工程院第十四次院士大会在北京人民大会堂隆重开幕。中共中央总书记、国家主席、中央军委主席习近平出席会议并发表重要讲话。', '../allnews/inland/inland1/inland1.docx', 1, '../allnews/inland/inland1/inland1.jpg', '科技'),
(2, '2018-05-29 20:12:00', '佚名', '比利时恐袭事件致3死2伤 枪手以警察为袭击目标', '中新网5月30日电 综合报道，29日，比利时东部城市列日发生枪击事件，36岁枪手赫尔曼枪杀2名女警以及一名22岁路人，之后逃进一所学校并挟持人质，最终与警方交火遭击毙。此外，该事件还导致另外2名警察受伤。比利时检方称，现以恐怖袭击调查这起攻击事件。报道称，枪手以警察为袭击目标。', '../allnews/international/international2/international2.docx', 2, '../allnews/international/international2/international2.jpg', '恐袭'),
(3, '2018-05-30 09:00:00', ' 问政', '中国首座公铁两用跨海大桥主塔即将全部封顶', '5月27日，福建福平铁路有限责任公司介绍：平潭海峡公铁两用大桥鼓屿门水道桥Z03主塔计划于6月中下旬完成封顶，届时，平潭海峡公铁两用大桥三座航道桥六个主塔将全部实现封顶', '../allnews/inland/inland3/inland3.docx', 1, '../allnews/inland/inland3/inland3.jpg', '跨海大桥'),
(4, '2018-05-29 23:00:00', '傅鑫', '波兰将建常驻美军基地 俄专家:核弹可瞄准华沙', '【环球网综合报道】针对媒体报道波兰国防部有意出资15亿至20亿美元，支持美军在波兰建立常驻基地的消息，俄罗斯方面反应强烈，俄外交部称将在军事计划中制定回应措施。', '../allnews/military/military4/military4.docx', 5, '../allnews/military/military4/military4.jpg', '核弹'),
(5, '2018-05-29 05:23:00', '梁东泽', 'NBA总决赛赛程：勇骑连续四年相会 1日激情开打', '北京时间5月29日，随着勇士淘汰火箭杀入总决赛，本赛季争冠的两支球队也最终诞生，骑士和勇士连续四年会师总决赛，按照NBA官方之前公布的总决赛赛程，首场比赛定于北京时间6月1日，如果出现抢七，那我们将在6月18日见证冠军诞生。', '../allnews/sport/sport5/sport5.docx', 3, '../allnews/sport/sport5/sport5.jpg', 'nba'),
(7, '2018-05-31 16:00:00', '梁东泽', '58岁“中国好人”沈汝波病逝：近40年做好事11万余件', '优秀共产党员、中国好人、燕赵楷模沈汝波同志因患食道癌，经救治无效，于6月1日凌晨1时15分不幸逝世，享年58岁。沈汝波同志遗体告别仪式将于6月3日在市殡仪馆举行。', '../allnews/inland/inland7/inland7.docx', 1, '../allnews/inland/inland7/inland7.jpg', '好人'),
(8, '2018-06-08 09:17:29', 'norman超', '詹姆斯：勇士就像马刺爱国者，你没有犯错空间', '北京时间6月8日，克里夫兰骑士队进行了例行训练，准备明天开打的第四场比赛。核心勒布朗-詹姆斯接受了媒体的采访，他盛赞勇士队非常强大，并拿马刺队以及NFL霸主爱国者队作为参照', '../allnews/sport/sport8/sport8.docx', 3, '../allnews/sport/sport8/sport8.jpg', '詹姆斯'),
(12, '2018-06-10 07:57:04', '小梁', '习近平主持中俄蒙元首第四次会晤', '6月9日，国家主席习近平同俄罗斯总统普京、蒙古国总统巴特图勒嘎在青岛举行中俄蒙三国元首第四次会晤。习近平主持会晤', '../allnews/inland/inland12/inland12.docx', 1, '../allnews/inland/inland12/inland12.jpg', '习近平'),
(16, '2018-06-12 01:39:03', 'qqq', 'qqqqqqqdrtdgfdrtdtrrd', 'qqqqqqqqqqqhfchgfytdfgdf', '../allnews/international/international16/international16.docx', 2, '../allnews/international/international16/international16.jpeg', 'qqqq');

-- --------------------------------------------------------

--
-- 表的结构 `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `sId` int(4) NOT NULL COMMENT '主键，板块标识(1.国内，2国际，3体育，4经济，5军事，6娱乐',
  `sName` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '模板名',
  `description` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '板块描述',
  PRIMARY KEY (`sId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='新闻板块表';

--
-- 转存表中的数据 `section`
--

INSERT INTO `section` (`sId`, `sName`, `description`) VALUES
(1, 'inland', '国内'),
(2, 'international', '国际'),
(3, 'sport', '体育'),
(4, 'finance', '经济'),
(5, 'military', '军事'),
(6, 'amusement', '娱乐');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uId` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键用户ID',
  `uName` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `pwd` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '密码',
  `email` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '邮箱',
  `grade` int(4) NOT NULL DEFAULT '2' COMMENT '用户等级（1管理员，2普通用户，0小黑屋）',
  `headShot` varchar(20) CHARACTER SET utf8 DEFAULT 'headshot.jpg' COMMENT '头像',
  `loves` varchar(40) CHARACTER SET utf8 DEFAULT NULL COMMENT '喜爱模块',
  PRIMARY KEY (`uId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='用户表';

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`uId`, `uName`, `pwd`, `email`, `grade`, `headShot`, `loves`) VALUES
(2, 'abc', '123', 'abc@qq.com', 2, 'abc.jpg', '6'),
(1, 'admin', '123456', 'admin@baidu.com', 1, 'headshot.jpg', '1，2，3，4，5，6'),
(3, 'liang', '123', 'liang@winxi.com', 2, 'liang.jpg', '1，3，4，6'),
(4, '11号机器人', '123', '11haojiqiren@qq.com', 1, '11.jpg', '1，2，3'),
(8, 'momo', '123', 'momo@156.com', 2, 'headshot.jpg', NULL),
(10, 'haha', '123', 'haha@qq.com', 2, 'headshot.jpg', NULL),
(11, 'xixi', '123', 'xixi@qq.com', 2, 'headshot.jpg', NULL),
(13, 'ddd', '111', '12sdfujwe@uefnJ.COM', 2, 'headshot.jpg', NULL);

-- --------------------------------------------------------

--
-- 视图结构 `comments_users`
--
DROP TABLE IF EXISTS `comments_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comments_users`  AS  select `comments`.`nId` AS `nId`,`comments`.`cId` AS `cId`,`comments`.`Ccontent` AS `Ccontent`,`comments`.`cDate` AS `cDate`,`users`.`uId` AS `uId`,`users`.`uName` AS `uName`,`users`.`headShot` AS `headShot` from (`comments` left join `users` on((`comments`.`uId` = `users`.`uId`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

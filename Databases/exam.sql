/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : exam

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-06-03 23:38:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ex_chapter`
-- ----------------------------
DROP TABLE IF EXISTS `ex_chapter`;
CREATE TABLE `ex_chapter` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `iSubid` int(8) NOT NULL,
  `cName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_chapter
-- ----------------------------
INSERT INTO `ex_chapter` VALUES ('1', '1', '第一章第一节');
INSERT INTO `ex_chapter` VALUES ('2', '1', '第二章');
INSERT INTO `ex_chapter` VALUES ('3', '1', '第三章');
INSERT INTO `ex_chapter` VALUES ('4', '1', '第四章');
INSERT INTO `ex_chapter` VALUES ('5', '2', '第一章');
INSERT INTO `ex_chapter` VALUES ('6', '2', '第二章');
INSERT INTO `ex_chapter` VALUES ('7', '1', '第一章第二节');

-- ----------------------------
-- Table structure for `ex_codanswer`
-- ----------------------------
DROP TABLE IF EXISTS `ex_codanswer`;
CREATE TABLE `ex_codanswer` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iPapid` int(8) NOT NULL,
  `iPrbNo` int(8) NOT NULL,
  `cAnswer1` varchar(255) NOT NULL,
  `cAnswer2` varchar(255) NOT NULL,
  `bIscor` bit(1) DEFAULT NULL,
  `iScore` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_codanswer
-- ----------------------------

-- ----------------------------
-- Table structure for `ex_filanswer`
-- ----------------------------
DROP TABLE IF EXISTS `ex_filanswer`;
CREATE TABLE `ex_filanswer` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iPapid` int(8) NOT NULL,
  `iPrbNo` int(8) NOT NULL,
  `canswer` varchar(255) NOT NULL,
  `bIscor` bit(1) DEFAULT NULL,
  `iScore` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_filanswer
-- ----------------------------

-- ----------------------------
-- Table structure for `ex_judanswer`
-- ----------------------------
DROP TABLE IF EXISTS `ex_judanswer`;
CREATE TABLE `ex_judanswer` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iPapid` int(8) NOT NULL,
  `iPrbNo` int(8) NOT NULL,
  `bAnswer` bit(1) NOT NULL,
  `bIscor` bit(1) DEFAULT NULL,
  `iScore` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_judanswer
-- ----------------------------

-- ----------------------------
-- Table structure for `ex_paper`
-- ----------------------------
DROP TABLE IF EXISTS `ex_paper`;
CREATE TABLE `ex_paper` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iUserid` int(8) DEFAULT NULL,
  `iTemid` int(8) NOT NULL,
  `iSubid` int(8) NOT NULL,
  `cPapName` varchar(255) NOT NULL,
  `iPapState` int(2) NOT NULL,
  `dTesDate` date NOT NULL,
  `iTotScore` int(3) NOT NULL,
  `iScore` int(3) NOT NULL,
  `iWroNum` int(3) NOT NULL,
  `iTestType` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_paper
-- ----------------------------

-- ----------------------------
-- Table structure for `ex_papproblem`
-- ----------------------------
DROP TABLE IF EXISTS `ex_papproblem`;
CREATE TABLE `ex_papproblem` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iSubid` int(8) NOT NULL,
  `iPapid` int(8) NOT NULL,
  `iPrbNo` int(8) NOT NULL,
  `iTypeid` int(8) NOT NULL,
  `iPrbid` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_papproblem
-- ----------------------------

-- ----------------------------
-- Table structure for `ex_paptemplate`
-- ----------------------------
DROP TABLE IF EXISTS `ex_paptemplate`;
CREATE TABLE `ex_paptemplate` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iSubid` int(8) NOT NULL,
  `cTemName` varchar(255) NOT NULL,
  `iPrbNum` int(3) NOT NULL,
  `iTotScore` int(3) NOT NULL,
  `cRemarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_paptemplate
-- ----------------------------
INSERT INTO `ex_paptemplate` VALUES ('2', '1', '123', '0', '0', '123');

-- ----------------------------
-- Table structure for `ex_pcode`
-- ----------------------------
DROP TABLE IF EXISTS `ex_pcode`;
CREATE TABLE `ex_pcode` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iSubid` int(8) NOT NULL,
  `iChaid` int(8) NOT NULL,
  `tTitle` text NOT NULL,
  `cCorrect1` varchar(255) NOT NULL,
  `cCorrect2` varchar(255) NOT NULL,
  `cKey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_pcode
-- ----------------------------
INSERT INTO `ex_pcode` VALUES ('1', '1', '1', '题目1', '答案1', '答案2', '解析1');

-- ----------------------------
-- Table structure for `ex_pfillblank`
-- ----------------------------
DROP TABLE IF EXISTS `ex_pfillblank`;
CREATE TABLE `ex_pfillblank` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iSubid` int(8) NOT NULL,
  `iChaid` int(8) NOT NULL,
  `tTitle` text NOT NULL,
  `cCorrect` varchar(255) NOT NULL,
  `cKey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_pfillblank
-- ----------------------------
INSERT INTO `ex_pfillblank` VALUES ('1', '1', '1', '题目1题目1题目1', '正确答案1', '解析1');
INSERT INTO `ex_pfillblank` VALUES ('3', '1', '3', '题目3', '答案3', '解析3');

-- ----------------------------
-- Table structure for `ex_pjudge`
-- ----------------------------
DROP TABLE IF EXISTS `ex_pjudge`;
CREATE TABLE `ex_pjudge` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iSubid` int(8) NOT NULL,
  `iChaid` int(8) NOT NULL,
  `tTitle` text NOT NULL,
  `bCorrect` bit(1) NOT NULL,
  `cKey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_pjudge
-- ----------------------------
INSERT INTO `ex_pjudge` VALUES ('2', '1', '1', '题目1', '', '解析1');

-- ----------------------------
-- Table structure for `ex_prbtype`
-- ----------------------------
DROP TABLE IF EXISTS `ex_prbtype`;
CREATE TABLE `ex_prbtype` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `cTabName` varchar(255) NOT NULL,
  `cName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_prbtype
-- ----------------------------
INSERT INTO `ex_prbtype` VALUES ('1', 'ex_pselect', '选择题');
INSERT INTO `ex_prbtype` VALUES ('2', 'ex_fillblank', '填空题');
INSERT INTO `ex_prbtype` VALUES ('3', 'ex_judge', '判断题');
INSERT INTO `ex_prbtype` VALUES ('4', 'ex_readcode', '程序阅读题');
INSERT INTO `ex_prbtype` VALUES ('5', 'ex_code', '代码补全题');

-- ----------------------------
-- Table structure for `ex_preadcode`
-- ----------------------------
DROP TABLE IF EXISTS `ex_preadcode`;
CREATE TABLE `ex_preadcode` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iSubid` int(8) NOT NULL,
  `iChaid` int(8) NOT NULL,
  `tTitle` text NOT NULL,
  `cCorrect` varchar(255) NOT NULL,
  `cKey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_preadcode
-- ----------------------------
INSERT INTO `ex_preadcode` VALUES ('1', '1', '1', '题目', '答案1答案1答案1', '解析1');

-- ----------------------------
-- Table structure for `ex_pselect`
-- ----------------------------
DROP TABLE IF EXISTS `ex_pselect`;
CREATE TABLE `ex_pselect` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `iSubid` int(8) NOT NULL,
  `iChaid` int(8) NOT NULL,
  `tTitle` text NOT NULL,
  `cItemA` varchar(255) NOT NULL,
  `cItemB` varchar(255) NOT NULL,
  `cItemC` varchar(255) NOT NULL,
  `cItemD` varchar(255) NOT NULL,
  `iCorrect` int(1) NOT NULL,
  `cKey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_pselect
-- ----------------------------
INSERT INTO `ex_pselect` VALUES ('1', '1', '1', '题目1题目1题目1题目1题目1题目1题目1', '1a', '1b', '1c', '1d', '0', '解析1');
INSERT INTO `ex_pselect` VALUES ('2', '1', '1', '题目2', '2a', '2b', '2c', '2d', '2', '解析2');
INSERT INTO `ex_pselect` VALUES ('4', '1', '2', '题目3题目3题目3题目3', '3a', '3b', '3c', '3d', '2', '解析3');
INSERT INTO `ex_pselect` VALUES ('6', '1', '1', 'function formatStr($s){\r\n    for($i = 0; $i &lt; strlen($s); $i++){\r\n        $c = substr($s,$i,1);\r\n        if ($c == &quot;&lt;&quot;)\r\n            $s = substr_replace($s,&quot;&amp;lt&quot;,$i,1);\r\n        else if ($c == &quot;&gt;&quot;)\r\n            $s = substr_replace($s,&quot;&amp;gt&quot;,$i,1);\r\n        else if ($c == &quot;&amp;&quot;)\r\n            $s = substr_replace($s,&quot;&amp;amp&quot;,$i,1);\r\n        else if ($c == &quot; &quot;)\r\n            $s = substr_replace($s,&quot;&amp;nbsp&quot;,$i,1);\r\n    }\r\n    $s = nl2br($s);\r\n    return $s;\r\n}', 'ssd', 'sdfsd', 'sdfds', 'fsdfsd', '0', 'sdfsdf');
INSERT INTO `ex_pselect` VALUES ('7', '1', '1', 'function formatStr($s){<br />\r\n    for($i = 0; $i &lt; strlen($s); $i++){<br />\r\n        $c = substr($s,$i,1);<br />\r\n        if ($c == &quot;&lt;&quot;)<br />\r\n            $s = substr_replace($s,&quot;&amp;lt&quot;,$i,1);<br />\r\n        else if ($c == &quot;&gt;&quot;)<br />\r\n            $s = substr_replace($s,&quot;&amp;gt&quot;,$i,1);<br />\r\n        else if ($c == &quot;&amp;&quot;)<br />\r\n            $s = substr_replace($s,&quot;&amp;amp&quot;,$i,1);<br />\r\n        else if ($c == &quot; &quot;)<br />\r\n            $s = substr_replace($s,&quot;&amp;nbsp&quot;,$i,1);<br />\r\n    }<br />\r\n    $s = nl2br($s);<br />\r\n    return $s;<br />\r\n}', 'dsdf', 'dfdsf', 'sdfs', 'sdf', '0', 'sdfdf');

-- ----------------------------
-- Table structure for `ex_pwcode`
-- ----------------------------
DROP TABLE IF EXISTS `ex_pwcode`;
CREATE TABLE `ex_pwcode` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iSubid` int(8) NOT NULL,
  `iChaid` int(8) NOT NULL,
  `tTitle` text NOT NULL,
  `cCorrect` varchar(255) NOT NULL,
  `cKey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_pwcode
-- ----------------------------
INSERT INTO `ex_pwcode` VALUES ('1', '1', '1', '题目1', '答案1', '解析1');

-- ----------------------------
-- Table structure for `ex_reaanswer`
-- ----------------------------
DROP TABLE IF EXISTS `ex_reaanswer`;
CREATE TABLE `ex_reaanswer` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iPapid` int(8) NOT NULL,
  `iPrbNo` int(8) NOT NULL,
  `cAnswer` varchar(255) NOT NULL,
  `bIscor` bit(1) DEFAULT NULL,
  `iScore` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_reaanswer
-- ----------------------------

-- ----------------------------
-- Table structure for `ex_selanswer`
-- ----------------------------
DROP TABLE IF EXISTS `ex_selanswer`;
CREATE TABLE `ex_selanswer` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iPapid` int(8) NOT NULL,
  `iPrbNo` int(8) NOT NULL,
  `iAnswer` int(1) NOT NULL,
  `bIscor` bit(1) DEFAULT NULL,
  `iScore` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_selanswer
-- ----------------------------

-- ----------------------------
-- Table structure for `ex_subject`
-- ----------------------------
DROP TABLE IF EXISTS `ex_subject`;
CREATE TABLE `ex_subject` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `cName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `iSetid` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ex_subject
-- ----------------------------
INSERT INTO `ex_subject` VALUES ('1', 'VB程序设计', '0');
INSERT INTO `ex_subject` VALUES ('2', 'C++程序设计', '0');

-- ----------------------------
-- Table structure for `ex_temproblem`
-- ----------------------------
DROP TABLE IF EXISTS `ex_temproblem`;
CREATE TABLE `ex_temproblem` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `iTemid` int(8) NOT NULL,
  `iPrbNo` int(8) NOT NULL,
  `iTypeid` int(8) NOT NULL,
  `iChaid` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_temproblem
-- ----------------------------

-- ----------------------------
-- Table structure for `ex_user`
-- ----------------------------
DROP TABLE IF EXISTS `ex_user`;
CREATE TABLE `ex_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `cUser` varchar(40) NOT NULL,
  `cCode` varchar(15) NOT NULL,
  `bManager` bit(1) NOT NULL,
  `bEnable` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ex_user
-- ----------------------------
INSERT INTO `ex_user` VALUES ('1', '001', '123456', '', '');
INSERT INTO `ex_user` VALUES ('2', '2013040802017', '123', '', '');

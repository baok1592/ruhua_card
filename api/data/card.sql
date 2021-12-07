/*
 Navicat Premium Data Transfer

 Source Server         : XamppSQl
 Source Server Type    : MariaDB
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : card3

 Target Server Type    : MariaDB
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 07/12/2021 15:47:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for vc_admin
-- ----------------------------
DROP TABLE IF EXISTS `vc_admin`;
CREATE TABLE `vc_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pwd` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `create_time` int(11) NULL DEFAULT NULL,
  `delete_time` int(11) NULL DEFAULT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vc_admin
-- ----------------------------
INSERT INTO `vc_admin` VALUES (2, 'root3', '63a9f0ea7bb98050796b649e85481845', NULL, NULL, NULL);
INSERT INTO `vc_admin` VALUES (3, 'root', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 1636611758);
INSERT INTO `vc_admin` VALUES (4, 'root2', '63a9f0ea7bb98050796b649e85481845', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for vc_article
-- ----------------------------
DROP TABLE IF EXISTS `vc_article`;
CREATE TABLE `vc_article`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NULL DEFAULT NULL COMMENT '1公司图集 2公司产品 3公司新闻',
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '文章标题',
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '文章简介',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '文章正文',
  `aid` int(11) NULL DEFAULT NULL COMMENT '发布人id',
  `ceategory_id` int(11) NULL DEFAULT NULL,
  `create_time` int(11) NULL DEFAULT NULL,
  `delete_time` int(11) NULL DEFAULT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 65 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vc_article
-- ----------------------------
INSERT INTO `vc_article` VALUES (52, 2, '如花商城商业版', 'http://card2.ruhuashop.com/uploads/c8/5dbf0fd33f79cbcae8d87c44277dfe.png', '￥398.00', '<p><strong>为什么需要授权证书?</strong></p><p>商业授权是软件开发者授权用户将软件用于商业用途的凭证（商业使用权利)﹔如果在未经官方商业授权而将系统版权去除或用于商业用途，则将会被官方视为侵权。对于商业用户,我们建议您购买商业授权以保护您的合法权益，享受更多的增值服务。</p><p><strong>授权期限与系统升级</strong></p><p>—次购买永久授权，获得授权之后，在系统升级、功能升级时，不会另收费用。购买单商户系统授权不能用于多商户系统</p><p><strong>—份商业授权可以用于多个网站吗?</strong></p><p>不可以，商业授权是根据网站域名来授权的，一份商业授权只能授予一个网站一个域名。</p><p><strong>商业授权后域名可以更改吗?</strong></p><p>由于商品特殊性,商业授权后更改域名，需要缴纳100元人工费。</p><p><strong>还没确定好域名，可以先购买吗?</strong></p><p>可以先购买授权，获得商业版源码;等确定好域名后，再告知我们绑定域名。必须三个月内绑定授权域名。</p><p><br/></p><p><br/></p>', 0, NULL, 1636687973, NULL, 1637823346);
INSERT INTO `vc_article` VALUES (54, 2, '外卖点餐系统', 'http://card2.ruhuashop.com/uploads/a9/638523f77461baba17547381cb940f.jpg', '￥368.00', '<p><strong>系统特点:</strong><br/></p><p>1.扫码点餐:常见扫码点餐，吧台扫码，店内餐桌扫码2.小票打印:对接三方小票机，打印小票+语音播报3.自定义地址:针对某小区，某医院，某学校配送4.余额使用、积分抵扣:暂未完善</p><p>5.优惠券</p><p>6.分销:分销后获得的佣金到余额，做余额使用，不能提现</p><p><strong>开发语言:</strong></p><p>后端语言php，基于thinkphp6框架前端基于vue、uniapp、element</p><p><br/></p>', 0, NULL, 1636688877, NULL, 1637823353);
INSERT INTO `vc_article` VALUES (55, 2, '轻松自助建站系统', 'http://card2.ruhuashop.com/uploads/c6/4bf0f45b8ad9a6c94b937325e28e57.jpg', '￥338.00', '<p>ggez<br/></p>', 0, NULL, 1636689188, NULL, 1637823362);
INSERT INTO `vc_article` VALUES (57, 1, '贵州鹏升纸业集团', 'http://card2.ruhuashop.com/uploads/16/67e43e66427afbd3a16754dca3a156.jpg', '网站实例', '<p>ggez<br/></p>', 0, NULL, 1636689524, NULL, 1637823369);
INSERT INTO `vc_article` VALUES (58, 1, '中国金州木贾商品批发城', 'http://card2.ruhuashop.com/uploads/9f/23a9805ecc3a42c8b2c41e2dc3b057.jpg', '网站实例', '<p>ggez<br/></p>', 0, NULL, 1636689674, NULL, 1637823375);
INSERT INTO `vc_article` VALUES (59, 1, '兴义小西门装饰', 'http://card2.ruhuashop.com/uploads/c9/c2570872a74dc2e33578a03ef14a6d.jpg', '网站实例', '<p>ggez<br/></p>', 0, NULL, 1636692153, NULL, 1637823386);
INSERT INTO `vc_article` VALUES (60, 1, '贵州黔鼎金融', 'http://card2.ruhuashop.com/uploads/56/e3f8e8d973537ef7aa184aaec280c7.jpg', '网站实例', '<p>ggez<br/></p>', 0, NULL, 1636693440, NULL, 1637823392);
INSERT INTO `vc_article` VALUES (62, 3, '黔域隆重推出兴义微趣多', 'http://card2.ruhuashop.com/uploads/a9/638523f77461baba17547381cb940f.jpg', '新闻1', '<p><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">&nbsp; &nbsp;微信是腾讯推出的一款很受欢迎的软件，它的覆盖面也越来越广，为了迎合市场需求，黔域特推出微信公众账号兴义微趣多，以丰富广大微信朋友的时间。</span><br style=\"margin: 0px; padding: 0px; color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp; 兴义微趣多集合了众多以兴义为主题的特色游戏，让你随时随地体会指尖上的乐趣。其中有测试、互动、免费话费、周边旅游、趣听等，更有具有挑战性的闯关、图猜兴义等小游戏，还有为广大朋友提供了一个畅所欲言的空间的微社区，让朋友们可以卸下伪装，卸下防备，做一个真实的自己，这些只是目前推出的一些活动和小游戏，还有更多精彩活动正在陆续推出中……</span><br style=\"margin: 0px; padding: 0px; color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">&nbsp;</span><br style=\"margin: 0px; padding: 0px; color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp; 相信有了兴义微趣多这个平台，不但可以丰富很多朋友的生活，还可以凝聚越来越多的朋友，黔域一定会很努力的做好兴义微趣多，让我们的朋友圈不断壮大，也让更多的朋友可以享受微信的乐趣。</span></p>', 0, NULL, 1636693644, NULL, 1637823322);
INSERT INTO `vc_article` VALUES (63, 3, '黔域成为西部数码代理商', 'http://card2.ruhuashop.com/uploads/4f/0d4d6d98b014c4f06609e15a111d08.jpg', '新闻2', '<p><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\"></span><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">昨日，黔域工作室正式签约西部数码，荣获IDC产品核心代理，并成为黔西南地区备案核验点。</span><br style=\"margin: 0px; padding: 0px; color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"margin: 0px; padding: 0px; color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">西部数码是全国十佳IDC服务商，全国域名主机服务的第一品牌，西部数码的多线路虚拟主机、分布式集群主机、云主机等多种类型的主机产品其稳定性、高速、性价比均刷新主机行业记录，故得到了30余万客户的认可！24小时完善的技术咨询与产品的稳定性、高速性及强大的后台功能，黔域签约为西部数码代理商也倍感自豪！</span><br style=\"margin: 0px; padding: 0px; color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"margin: 0px; padding: 0px; color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">此次成为西部数码代理商，意味着我们将投入更多的精力为黔西南互联网提供更多更好的业务服务，将以更加稳定的产品服务于广大客户，为您在互联网发展保驾护航！为黔西南州做网站，</span><a href=\"http://www.qianyugzs.com/\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-decoration-line: none; outline: none; font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\">兴义做网站</a><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">提供更加稳定、高速的主机服务与完善的域名及备案服务。</span><br style=\"margin: 0px; padding: 0px; color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"margin: 0px; padding: 0px; color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">需购买主机，域名，空间的顾客可访问</span><a href=\"http://kj.qianyugzs.com/\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-decoration-line: none; outline: none; font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\">kj.qianyugzs.com</a><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\">咨询及购买</span><span style=\"color: rgb(85, 85, 85); font-family: Verdana, Arial, &quot;Times New Roman&quot;, 瀹嬩綋; font-size: 12px; background-color: rgb(255, 255, 255);\"></span></p>', 0, NULL, 1636693674, NULL, 1637822979);

-- ----------------------------
-- Table structure for vc_banner
-- ----------------------------
DROP TABLE IF EXISTS `vc_banner`;
CREATE TABLE `vc_banner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '广告名',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '广告描述',
  `img_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '广告图路径',
  `cid` int(11) NULL DEFAULT NULL COMMENT '广告位',
  `auth` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vc_banner
-- ----------------------------
INSERT INTO `vc_banner` VALUES (19, 'ddd', '', 'http://card2.ruhuashop.com/uploads/3b/1983eef035237dd35bae12495f286a.png', 1, NULL);

-- ----------------------------
-- Table structure for vc_colleague
-- ----------------------------
DROP TABLE IF EXISTS `vc_colleague`;
CREATE TABLE `vc_colleague`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '姓名',
  `himg_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '头像图路径',
  `position` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '职位',
  `c_phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '电话',
  `wechart_nub` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '微信号',
  `wechart_eurl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '微信二维码路径',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '电子邮件',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '个人简介',
  `create_time` int(11) NULL DEFAULT NULL,
  `delete_time` int(11) NULL DEFAULT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vc_colleague
-- ----------------------------
INSERT INTO `vc_colleague` VALUES (1, '安妮·沃斯奇', 'http://card2.ruhuashop.com/uploads/5e/4d1806601b1d6236ee3aa2395b1485.jpg', '产品代理', '15612311231', 'xinyi151888', 'http://card2.ruhuashop.com/uploads/5e/4d1806601b1d6236ee3aa2395b1485.jpg', 'xinyi@qq.com', '<p>詹妮弗·安妮斯顿（Jennifer Aniston），1969年2月11日出生于美国加利福尼亚州，美国影视演员、制片人、导演。</p><p>1990年，出演了电视剧处女作《Molloy》。1994年9月22日，主演的情景喜剧《老友记第一季》首播。1999年2月19日，出演的喜剧电影《上班一条虫》上映。2001年9月27日，主演的情景喜剧《老友记第八季》开播，凭借该剧获得了第4届青少年选择奖最佳喜剧TV女演员奖 [1]&nbsp; 。2002年8月25日，主演的喜剧电影《好女孩》上映，凭借该片获得了第6届好莱坞电影节最佳女主角奖&nbsp;</p><p><br style=\"white-space: normal;\"/></p><p><br/></p>', 1635399942, NULL, 1638252146);
INSERT INTO `vc_colleague` VALUES (2, '安妮·海瑟薇', 'http://card2.ruhuashop.com/uploads/59/8568752dd267285fc5d1533365e972.jpg', 'CEO', '18988888888', 'SUK8988', 'https://', 'SUK@qq.com', '<p>安妮·海瑟薇（Anne Hathaway），1982年11月12日出生于美国纽约州布鲁克林，美国女演员。</p><p>1999年，17岁的安妮·海瑟薇在电视剧《Get Real》中初次亮相。2000年，主演爱情喜剧电影《公主日记》 [1-2]&nbsp; ，她凭借该片入围第4届青少年选择奖最佳喜剧电影女演员奖。2004年，由其出演的电影《公主日记2：皇室婚约》上映。2005年，主演爱情电影《断背山》 [3]&nbsp; 。2007年，凭借爱情电影《成为简·奥斯汀》入围第10届英国独立电影奖最佳女主角奖 [4]&nbsp; 。2008年，凭借家庭伦理电影《蕾切尔的婚礼》获得第81届奥斯卡金像奖最佳女主角提名 [5]&nbsp; 、第66届美国金球奖电影类-剧情类最佳女主角提名 [6]&nbsp; 。</p><p><br/></p><p><br style=\"white-space: normal;\"/></p><p><br/></p>', 1635401733, NULL, 1638252158);
INSERT INTO `vc_colleague` VALUES (3, '汤姆·克鲁斯', 'http://card2.ruhuashop.com/uploads/68/554856038a59c1f2cacf8684603c92.png', '员工', '15213367735', '3sdasas', 'http://card2.ruhuashop.com/uploads/68/554856038a59c1f2cacf8684603c92.png', '11384@qq.com', '<p>汤姆·克鲁斯，1962年7月3日出生于美国纽约，美国电影演员、制片人 [1]&nbsp; 。</p><p>1981年，出演剧情片《熄灯号》，从而出道 [2]&nbsp; 。1984年，凭借主演的喜剧片《乖仔也疯狂》获得第41届美国金球奖音乐喜剧类最佳男主角提名 [3]&nbsp; 。1986年，因主演励志片《壮志凌云》被观众所熟知 [4]&nbsp; ；同年，留名好莱坞星光大道 [1]&nbsp; 。1988年，主演剧情片《雨人》 [5]&nbsp; 。1990年，凭借主演的传记片《生于七月四日》获得第47届美国金球奖剧情类最佳男主角、第62届奥斯卡金像奖最佳男主角提名 [6-7]&nbsp; 。1994年，领衔主演的奇幻片《夜访吸血鬼》累计票房为1亿526万美元 [8]&nbsp; 。</p><p><br style=\"white-space: normal;\"/></p><p><br/></p>', 1636694091, NULL, 1638252174);
INSERT INTO `vc_colleague` VALUES (59, '迈克尔·乔丹', 'http://card2.ruhuashop.com/uploads/e6/82042c62cbf32310ae121cadb28bde.jpg', '项目经理', '18546847847', 'qiaoWx123', 'http://card2.ruhuashop.com/uploads/6e/c85977650bafb208e76a1603046f8e.jpeg', '123456@qq.com', '<p>迈克尔·乔丹（Michael Jordan），1963年2月17日生于美国纽约布鲁克林，前美国职业篮球运动员，司职得分后卫，绰号“飞人”（Air Jordan），现为夏洛特黄蜂队老板。 [1]&nbsp; [22]&nbsp;</p><p>迈克尔·乔丹在1984年NBA选秀中于第1轮第3位被芝加哥公牛队选中，职业生涯曾效力于芝加哥公牛队以及华盛顿奇才队，新秀赛季当选NBA年度最佳新秀。1986-87赛季，乔丹场均得到37.1分，首次获得NBA得分王称号。1991-93赛季，乔丹连续2次荣膺常规赛MVP（1991、1992）和3次总决赛MVP（FMVP） [2-3]&nbsp; ，率领芝加哥公牛队3夺NBA总冠军。</p><p><br style=\"white-space: normal;\"/></p><p><br/></p>', 1636708168, NULL, 1638252187);

-- ----------------------------
-- Table structure for vc_sys_config
-- ----------------------------
DROP TABLE IF EXISTS `vc_sys_config`;
CREATE TABLE `vc_sys_config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '英文简述',
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desc` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' COMMENT '描述',
  `auth` int(11) NULL DEFAULT NULL COMMENT '有效值',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vc_sys_config
-- ----------------------------
INSERT INTO `vc_sys_config` VALUES (1, 'company', '黔域网络科技有限公司', '', 1);
INSERT INTO `vc_sys_config` VALUES (2, 'addrss', '兴义市汇金中心B栋', '', 1);
INSERT INTO `vc_sys_config` VALUES (3, 'email', 'luoyangyibai@163.com', '邮箱', 1);
INSERT INTO `vc_sys_config` VALUES (4, 'website', 'www.ruhuashop.com', '网址', 1);
INSERT INTO `vc_sys_config` VALUES (5, 'title', '黔域网络科技部', '站点名称', 1);
INSERT INTO `vc_sys_config` VALUES (6, 'log', '壹佰超级名片33', 'dada', 0);
INSERT INTO `vc_sys_config` VALUES (7, 'img', 'http://card2.ruhuashop.com/uploads/0d/a0b583b22fd2141c4c5f52045f48d7.jpg', 'dada', 4);
INSERT INTO `vc_sys_config` VALUES (8, 'description', '<p>兴义市黔域网络科技部专注于黔西南州企事业网站建设项目及其相关的网络服务，包括：网站建设、网络推广、软件开发、微信开发、手机APP开发。 黔域秉承&quot;立足黔西南、服务黔西南、开辟黔西南&quot;的创业思想用心建站；坚持以&quot;把客户变为销售&quot;的思路紧抓产品质量，完善服务内容，拼尽全力树立良好口碑，努力将自身打造成为——黔西南最受好评的网络服务商。&nbsp;</p><p>&nbsp;给客户的价值远远不止于建站\n建站只是技术的实现；我们更注重的是以业务为主导，通过品牌设计和SEO的技术手段，为客户提供完善的网络营销解决方案。黔域结合多年的电子商务实施经验，凭借过硬的互联网技术和丰富的建站经验以及较强的互联网资源整合能力和推广能力，成功帮助众多企业开辟了网络市场，实现利润增长。</p>', 'sadas', 4);
INSERT INTO `vc_sys_config` VALUES (9, 'longla', '104.928185@25.111248', '地址', 4);
INSERT INTO `vc_sys_config` VALUES (10, 'art', '0', '公司图集', 3);
INSERT INTO `vc_sys_config` VALUES (11, 'art2', '0', '公司新闻', 3);
INSERT INTO `vc_sys_config` VALUES (12, 'art3', '0', '公司产品', 3);
INSERT INTO `vc_sys_config` VALUES (13, 'conn', '0', '联系方式', 3);
INSERT INTO `vc_sys_config` VALUES (14, 'coll', '0', '同事', 3);
INSERT INTO `vc_sys_config` VALUES (15, 'title', '黔域网络科技部', '站点名称', 0);
INSERT INTO `vc_sys_config` VALUES (16, 'conpany', '0', '公司信息', 3);
INSERT INTO `vc_sys_config` VALUES (17, 'gzh_appid', '', '公众号appid', 2);
INSERT INTO `vc_sys_config` VALUES (18, 'gzh_secret', '', '公众号密钥', 2);
INSERT INTO `vc_sys_config` VALUES (19, 'wx_token_expire', '7200', 'token持续时长', 2);
INSERT INTO `vc_sys_config` VALUES (20, 'xcx_appid', '', '小程序appid', 2);
INSERT INTO `vc_sys_config` VALUES (21, 'xcx_secret', '', '小程序密钥', 2);

-- ----------------------------
-- Table structure for vc_tj_login
-- ----------------------------
DROP TABLE IF EXISTS `vc_tj_login`;
CREATE TABLE `vc_tj_login`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NULL DEFAULT NULL,
  `u_id` int(11) NULL DEFAULT NULL,
  `create_time` int(11) NULL DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0 COMMENT '0 待处理  1已处理',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vc_tj_login
-- ----------------------------
INSERT INTO `vc_tj_login` VALUES (1, 1, 3, 1635302100, 1);
INSERT INTO `vc_tj_login` VALUES (5, 2, 3, 1636074116, 1);
INSERT INTO `vc_tj_login` VALUES (6, 2, 4, 1636074420, 0);
INSERT INTO `vc_tj_login` VALUES (7, 3, 1, 1636616191, 0);

-- ----------------------------
-- Table structure for vc_user
-- ----------------------------
DROP TABLE IF EXISTS `vc_user`;
CREATE TABLE `vc_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '用户名',
  `u_phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `passworld` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `c_id` int(11) NULL DEFAULT 0,
  `headpic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '头像路径',
  `create_time` int(11) NULL DEFAULT 0,
  `auth` int(11) NULL DEFAULT NULL,
  `openid_gzh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unionid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vc_user
-- ----------------------------

-- ----------------------------
-- Table structure for vc_user_phone
-- ----------------------------
DROP TABLE IF EXISTS `vc_user_phone`;
CREATE TABLE `vc_user_phone`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `create_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vc_user_phone
-- ----------------------------
INSERT INTO `vc_user_phone` VALUES (1, '15888805817', 1630395565);
INSERT INTO `vc_user_phone` VALUES (19, '15645436773', 1636074116);
INSERT INTO `vc_user_phone` VALUES (20, '15284449804', 1636616192);

SET FOREIGN_KEY_CHECKS = 1;

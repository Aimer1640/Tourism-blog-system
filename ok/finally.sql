/*
Navicat MySQL Data Transfer

Source Server         : interim text
Source Server Version : 50149
Source Host           : 127.0.0.1:3308
Source Database       : finally

Target Server Type    : MYSQL
Target Server Version : 50149
File Encoding         : 65001

Date: 2021-12-14 10:13:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for body
-- ----------------------------
DROP TABLE IF EXISTS `body`;
CREATE TABLE `body` (
  `num` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `postTime` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `content` text,
  `updateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of body
-- ----------------------------
INSERT INTO `body` VALUES ('1', '1', '2021-12-06 20:49:31', '1', '初秋适合带着喜欢的人来一场治愈大冒险，于是我们来了一场说走就走的户外野营！青岛连续下了几天的雨，空气都清新了好多。不能浪费这样的好天气，暂停一切所谓的原计划，拽上阿崔，找一个好地方野营去，趁机好好放松下。[放假]\r\n\r\n野营地点还是选在了我们常去的小石老人。因为是假期前一天去的，所以人不是很多。找一个风景绝佳的位置扎好帐篷，静静的欣赏着眼前的美景，看着日月变幻，别提有多治愈了！被装修折磨出来的坏心情瞬间一扫而光。', '游记', '<p><img src=\"/ueditor/php/upload/image/20211207/1638808415410003.jpg\" title=\"1638808415410003.jpg\" alt=\"背景图.jpg\"/></p>', '2021-12-07 00:33:38');
INSERT INTO `body` VALUES ('2', '2', '2021-12-06 15:37:07', '2', '刚入秋的青岛，天气还是有些干燥，所以我们比较注重旅行时做好补水，我最近基本上用的都是[求关注]HFP与独立插画师孙佳艺联名的牛油果霜，在海边玩的时候，被海风吹了一整天，踏浪过后皮肤也因为沾过海水而变得干燥紧绷，这时候薄薄地抹上一层牛油果霜，脸就会变得水润很多，这款质地清清爽爽还蛮好吸收的，而且插画风格的外包装真的好治愈好好看，颜值和秋天很搭。你们平常怎么治愈自己呢？把你们的治愈大冒险也分享出来吧！', '游记', '', '2021-12-07 00:04:18');
INSERT INTO `body` VALUES ('3', '3', '2021-12-06 22:53:33', '3', '北海不北，它坐落于中国南海之滨、北部湾畔。北海不大，它三面环海，城市的每条道路都通向大海。这是一个让所有人神往的地方，被称为天下第一滩的北海银滩，被中国国家地理评为“中国最美小岛”的涠洲岛，还有北海老街，火山口地质公园，五彩滩日出……', '游记', '', '2021-12-07 00:05:52');
INSERT INTO `body` VALUES ('4', '4', '2021-12-06 22:53:48', '4', '刚从北海游玩回来，体验了北海旅游的正确打开方式，去了北海银滩、北海老街、疍家小镇、涠洲岛、火山口地质公园、海上运动基地、天主教堂等精华景点。\r\n找人专门定制的独立私家团，专属的导游兼司机只服务我们，人均费用才1千多，行程轻松自由，吃住品质很高。', '游记', '', '2021-12-06 22:53:48');
INSERT INTO `body` VALUES ('5', '51111', '2021-12-06 22:53:57', '5', '', '512w', '', '2021-12-14 10:11:41');
INSERT INTO `body` VALUES ('6', '9', '2021-12-07 16:26:32', '9', '', '233', '', '2021-12-14 10:08:42');
INSERT INTO `body` VALUES ('33', 'tyu', '2021-12-14 09:31:40', '12345678', '', '6666', '', '2021-12-14 09:31:40');
INSERT INTO `body` VALUES ('12121', '12121', '2021-12-14 10:05:41', '12222', '22', '1221', '<p><img src=\"/ueditor/php/upload/image/20211214/1639447533180320.jpg\" title=\"1639447533180320.jpg\" alt=\"1.jpg\"/></p>', '2021-12-14 10:05:41');
INSERT INTO `body` VALUES ('1123', '123', '2021-12-14 10:08:22', '1123', '123', '123', '', '2021-12-14 10:08:22');

-- ----------------------------
-- Table structure for com
-- ----------------------------
DROP TABLE IF EXISTS `com`;
CREATE TABLE `com` (
  `username` varchar(255) DEFAULT NULL,
  `word` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of com
-- ----------------------------
INSERT INTO `com` VALUES ('123', '1111');
INSERT INTO `com` VALUES ('123333', '222222');
INSERT INTO `com` VALUES ('1234', '9999');
INSERT INTO `com` VALUES ('1224', '1222222');
INSERT INTO `com` VALUES ('1224', '1222222');

-- ----------------------------
-- Table structure for uploadfile
-- ----------------------------
DROP TABLE IF EXISTS `uploadfile`;
CREATE TABLE `uploadfile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uploadfile` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uploadfile
-- ----------------------------
INSERT INTO `uploadfile` VALUES ('1', '999fde6dacf0f2cccd2f12b10d96752b.jpg', null, null, null);
INSERT INTO `uploadfile` VALUES ('2', '1.jpg', null, null, null);
INSERT INTO `uploadfile` VALUES ('3', 'main1.jpg', null, null, null);
INSERT INTO `uploadfile` VALUES ('6', 'main1.jpg', null, null, null);
INSERT INTO `uploadfile` VALUES ('7', '1.jpg', null, null, null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `id` int(10) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('admin', 'admin', '1', '1234567890');
INSERT INTO `user` VALUES ('123', '123', '2', '2345678901');
INSERT INTO `user` VALUES ('456', '456', '3', '3456789012');
INSERT INTO `user` VALUES ('1234', '1234', null, '1111');
INSERT INTO `user` VALUES ('1224', '1224', null, '1224');

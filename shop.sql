/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : shop

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 03/06/2020 18:01:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for shop_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin_user`;
CREATE TABLE `shop_admin_user`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用户表',
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名称',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '用户密码',
  `add_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  `add_uid` tinyint(5) NOT NULL COMMENT '添加人',
  `status` tinyint(5) NOT NULL DEFAULT 1 COMMENT '状态 0禁用 1活跃',
  `last_login_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '最后登录ip地址',
  `real_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '真实名称',
  `last_login_date` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '最后登录时间',
  `deleted_at` datetime(0) NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_admin_user
-- ----------------------------
INSERT INTO `shop_admin_user` VALUES (1, 'admin', 'eyJpdiI6ImJsdnpRc2JRbVBNMk1KdDBsY0crUmc9PSIsInZhbHVlIjoiaHVJMGd5TFZWeFo3MmttdmlsWm0vUT09IiwibWFjIjoiYTY2ODJhY2ExMzU4NzU5NWYxZjkwMzY3YWY1MzNkNjIzZjU2NmRiMTFlZmFlMTQyNzIyZTQ2MzJiYjhkMWI3YiJ9', '2020-05-24 19:49:51', 0, 1, '127.0.0.1', '罗阳', '2020-05-24 19:49:51', NULL);

-- ----------------------------
-- Table structure for shop_brand
-- ----------------------------
DROP TABLE IF EXISTS `shop_brand`;
CREATE TABLE `shop_brand`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '品牌方表',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '名称',
  `com_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '公司名称',
  `contact_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '联系人',
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '联系电话',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '联系邮箱',
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `add_uid` int(11) NOT NULL COMMENT '添加人id',
  `add_real_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '添加人姓名',
  `update_uid` int(11) NULL DEFAULT NULL COMMENT '更新人id',
  `update_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  `add_date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0已暂停 1合作中',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_brand
-- ----------------------------
INSERT INTO `shop_brand` VALUES (2, '合作方', '公司名称', '联系人', '18627143152', '393622951@qq.com', NULL, 1, '罗阳', NULL, NULL, '2020-05-27 16:56:14', 0);

-- ----------------------------
-- Table structure for shop_dealer
-- ----------------------------
DROP TABLE IF EXISTS `shop_dealer`;
CREATE TABLE `shop_dealer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '经销商表',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '名称',
  `com_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '公司名称',
  `contact_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '联系人',
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '联系电话',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '联系邮箱',
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `add_uid` int(11) NOT NULL COMMENT '添加人id',
  `add_real_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '添加人姓名',
  `update_uid` int(11) NULL DEFAULT NULL COMMENT '更新人id',
  `update_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  `add_date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0已暂停 1合作中',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_dealer
-- ----------------------------
INSERT INTO `shop_dealer` VALUES (3, '测试经销商', '大大大', '罗阳', '18627143152', '393622951@qq.com', NULL, 1, '罗阳', NULL, NULL, '2020-05-28 15:37:51', 0);

-- ----------------------------
-- Table structure for shop_goods
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods`;
CREATE TABLE `shop_goods`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '产品表',
  `goods_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '产品名称',
  `alias_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL COMMENT '产品别名',
  `brand_id` int(11) NOT NULL COMMENT '品牌方id',
  `add_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '添加人',
  `add_uid` int(5) NOT NULL COMMENT '添加人',
  `update_uid` int(5) NULL DEFAULT NULL COMMENT '修改人',
  `add_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  `update_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  `repertory` int(11) NULL DEFAULT 0 COMMENT '库存',
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0 COMMENT '审核状态0待审核 1审核通过',
  `audit_uid` int(11) NULL DEFAULT NULL COMMENT '审核人id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_goods
-- ----------------------------
INSERT INTO `shop_goods` VALUES (1, 'Quinton天然海洋水润眼喷雾', '111111111111111111111111111111111111111111', 1, '', 1, 1, '2020-05-27 15:14:17', '2020-05-27 15:14:17', 0, '2020-05-27 15:14:17', 0, NULL);
INSERT INTO `shop_goods` VALUES (2, '马栗香膏', 'a:187:{i:0;s:140:\"告别酸痛 一抹轻松 德国Almisan艾美森热活马栗膏 5分钟告别腰酸背痛肩颈不适 摆脱关节炎 老寒腿 运动损伤\";i:1;s:66:\"【5分钟见效 告别酸疼】德国进口Almisan马栗露香膏\";i:2;s:15:\"马栗膏红色\";i:3;s:92:\"【折扣】阿尔美森+马栗露香膏+缓解肌肉不适感！德国足球部指定品牌\";i:4;s:74:\"德国正品Almisan阿尔美森马栗露按摩凝胶 膝腰肩颈舒缓膏\";i:5;s:28:\"Almisan艾美森马栗香膏\";i:6;s:78:\"德国足球队都在用，德国进口马栗香膏，涂一涂，告别不适\";i:7;s:96:\"德国阿尔美森马栗露香膏 渐褪酸疼 五分钟好多了 八种植物不疼提取成分\";i:8;s:34:\"德国almisan艾美森马栗香膏\";i:9;s:35:\"Almisan艾美森 马栗露按摩膏\";i:10;s:15:\"马栗露香膏\";i:11;s:12:\"红色马膏\";i:12;s:165:\"春节期间正常发货 告别酸痛 一抹轻松 德国Almisan艾美森热活马栗膏 5分钟告别腰酸背痛肩颈不适 摆脱关节炎 老寒腿 运动损伤\";i:13;s:75:\"德国原装进口马栗膏 放松肩颈 自发热凝胶 腰椎德国马膏\";i:14;s:84:\"德国原德国原装进口马栗膏 放松肩颈 自发热凝胶 腰椎德国马膏\";i:15;s:66:\"装进口马栗膏 放松肩颈 自发热凝胶 腰椎德国马膏\";i:16;s:156:\"限时送3ml小样「告别酸痛 一抹轻松」德国Almisan艾美森热活马栗露香膏 摆脱关节炎、风湿、腰肩关节酸痛 50年匠心品质\";i:17;s:162:\"德国进口（ Almisan）阿尔美森马栗露香膏 热活马栗露香膏热感凝胶 热感凝胶缓解不适舒缓关节 马栗露香膏(便携旅行装) 96ml\";i:18;s:159:\"阿尔美森（almisan）马栗露香膏 舒缓肩颈肌肉酸痛 驱寒活血祛瘀 艾美森马栗露 修护关节德国进口 马栗露香膏（250毫升）\";i:19;s:158:\"阿尔美森（almisan）马栗露香膏 舒缓肩颈肌肉酸痛 驱寒活血祛瘀 艾美森马栗露 修护关节德国进口 马栗露香膏（96毫升）\";i:20;s:90:\"阿尔美森马栗露香膏舒缓肌肉酸痛肩颈霜风湿关节膏马粟乐按摩凝胶\";i:21;s:83:\"阿尔美森almisan马栗露香膏 缓解疼痛 德国原装 艾美森马栗膏96ml\";i:22;s:84:\"阿尔美森ALMISAN马栗露香膏德国艾美森马栗膏肌肉酸痛按摩膏250ml\";i:23;s:75:\"德国原装进口马栗膏 放松肩颈 自发热凝胶 腰椎德国马膏\";i:24;s:115:\"5分钟驱痛】德国Almisan阿尔美森马栗露香膏 1分钟发热 5分钟驱痛 德国足球队专用关节膏\";i:25;s:9:\"马栗露\";i:26;s:9:\"关节膏\";i:27;s:12:\"马膏红色\";i:28;s:59:\"马栗膏   告别酸痛，一抹轻松，50年匠心品质\";i:29;s:59:\"马栗膏   告别酸痛，一抹轻松，50年匠心品质\";i:30;s:36:\"德国足球员专用关节膏凝露\";i:31;s:30:\"德国足球员专用关节膏\";i:32;s:40:\"Almisan艾美森马栗露香膏按摩膏\";i:33;s:28:\"德国Almisan马栗露香膏\";i:34;s:85:\"德国Almisan艾美森热活马栗露香膏关节膏风湿关节炎腰肩颈椎酸痛\";i:35;s:59:\"马栗膏   告别酸痛，一抹轻松，50年匠心品质\";i:36;s:36:\"德国足球员专用关节膏凝露\";i:37;s:119:\"德国Almisan马栗露香膏艾美德国almisan阿尔艾美森筋骨酸痛舒缓香膏马栗膏马栗露乐按摩凝胶\";i:38;s:52:\"颜色分类:白色包装红色膏体森马栗香膏\";i:39;s:85:\"德国almisan阿尔艾美森筋骨酸痛舒缓香膏马栗膏马栗露乐按摩凝胶\";i:40;s:37:\"颜色分类:白色包装红色膏体\";i:41;s:85:\"德国almisan艾美森马栗露膏风湿骨痛膏肌肉酸痛舒缓香膏按摩凝胶\";i:42;s:36:\"马栗露（艾美森马栗香膏）\";i:43;s:25:\"艾美森马栗香膏96ml\";i:44;s:36:\"阿尔艾森筋骨舒缓按摩凝胶\";i:45;s:39:\"艾美森热活马栗露香膏关节膏\";i:46;s:48:\"10575	Almisan 阿尔美森热活马栗香膏96ml\";i:47;s:85:\"德国almisan阿尔艾美森筋骨酸痛舒缓香膏马栗膏马栗露乐按摩凝胶\";i:48;s:49:\"5分钟缓解肩颈酸痛｜艾美森马栗香膏\";i:49;s:43:\"身体一抹就轻松 艾美森马栗香膏\";i:50;s:15:\"马栗露红膏\";i:51;s:96:\"【0元抽奖】阿尔美森 马栗露香膏 缓解肌肉不适感！德国足球部指定品牌\";i:52;s:34:\"艾美森马栗香膏热活型96ml\";i:53;s:122:\"德国Almisan艾美森热活马栗露香膏关节膏风湿关节炎腰肩颈椎酸痛 净含量: 体验装（96ml/罐*1）\";i:54;s:9:\"栗香膏\";i:55;s:205:\"「告别酸痛 一抹轻松」德国Almisan艾美森热活马栗露香膏1分钟发热，5分钟驱痛，摆脱关节炎、风湿、腰肩关节酸痛 50年匠心品质，德国足球队员专用关节膏\";i:56;s:97:\"德国马栗德国almisan阿尔艾美森筋骨酸痛舒缓香膏马栗膏马栗露乐按摩凝胶\";i:57;s:37:\"颜色分类:白色包装红色膏体\";i:58;s:92:\"【折扣】阿尔美森 马栗露香膏 缓解肌肉不适感！德国足球部指定品牌\";i:59;s:33:\"一抹祛痛的艾美森马栗露\";i:60;s:28:\"阿尔美森 马栗露香膏\";i:61;s:60:\"艾美森马栗香膏｜止痛舒缓，身体一抹就轻松\";i:62;s:36:\"一抹祛痛的艾美森马栗香膏\";i:63;s:85:\"德国almisan阿尔艾美森筋骨酸痛舒缓香膏马栗膏马栗露乐按摩凝胶\";i:64;s:37:\"颜色分类:白色包装红色膏体\";i:65;s:151:\"【德国足球队专用】德国 Almisan 阿尔美森关节膏！1分钟吸收，按摩关节、肩颈、腰部，舒缓酸痛，马栗精粹香膏！\";i:66;s:176:\"德国Almisan艾美森热活马栗露香膏 身体一抹就轻松 ，1分钟吸收，5分钟舒缓，活络肌肉缓解关节酸痛 50年匠心品质，德国足球队员专用\";i:67;s:103:\"【肉疼克星】德国马栗露Almisan舒缓活络凝露阿尔艾美森马栗香膏解关节肌肉痛\";i:68;s:48:\"身体一抹就轻松 艾美森马栗香膏 96ml\";i:69;s:34:\"艾美森马栗香膏热活型96ml\";i:70;s:9:\"马栗膏\";i:71;s:53:\"德国Almisan阿尔艾美森马栗香膏热活型96ml\";i:72;s:22:\"艾美森马栗膏96ml\";i:73;s:21:\"艾美森马栗香膏\";i:74;s:39:\"艾美森热活马栗露香膏关节膏\";i:75;s:13:\"马栗膏96ml\";i:76;s:80:\"阿尔美森 马栗露香膏 缓解肌肉不适感！德国足球部指定品牌\";i:77;s:60:\"艾美森马栗香膏｜止痛舒缓，身体一抹就轻松\";i:78;s:99:\"德国阿尔美森马栗露香膏 告别酸痛 五分钟缓解 八种天然植物止痛提取成分\";i:79;s:47:\"身体一抹就轻松 艾美森马栗香膏96ml\";i:80;s:70:\"【肉疼克星马栗露】德国Almisan舒缓活络凝露马栗香膏\";i:81;s:119:\"【肉疼克星 缓解空调痛】德国马栗露Almisan舒缓活络凝露阿尔艾美森马栗香膏解关节肌肉痛\";i:82;s:50:\"德国进口马栗膏 丨5分钟缓解肩颈酸痛\";i:83;s:25:\"艾美森马栗香膏96ml\";i:84;s:94:\"【7.15-21下单赠送小样5ml】艾美森马栗香膏｜止痛舒缓，身体一抹就轻松\";i:85;s:79:\"5分钟缓解肩颈疼痛，德国进口马栗香膏，涂一涂，告别不适\";i:86;s:110:\"德国Almisan马栗露香膏 丨 1分钟发热，5分钟驱痛，摆脱肩颈、风湿、关节、肌肉酸痛\";i:87;s:28:\"马栗膏便携装（96ml）\";i:88;s:20:\"规格:马栗膏96ml\";i:89;s:18:\"艾美森马栗膏\";i:90;s:16:\"almisan马栗膏\";i:91;s:85:\"德国Almisan阿尔艾美森热活马栗香膏舒活按摩缓解关节酸疼痛凝露\";i:92;s:12:\"德国香膏\";i:93;s:9:\"栗香膏\";i:94;s:151:\"【德国足球队专用】德国 Almisan 阿尔美森关节膏！1分钟吸收，按摩关节、肩颈、腰部，舒缓酸痛，马栗精粹香膏！\";i:95;s:189:\"限时送5ml小样试用【告别酸痛 一抹轻松】德国Almisan艾美森热活马栗露香膏 1分钟发热，5分钟驱痛  50年匠心品质，德国足球队员专用关节膏凝露\";i:96;s:50:\"德国almisan艾美森肌肉舒缓马栗香膏96ml\";i:97;s:189:\"限时送5ml小样试用【告别酸痛 一抹轻松】德国Almisan艾美森热活马栗露香膏 1分钟发热，5分钟驱痛  51年匠心品质，德国足球队员专用关节膏凝露\";i:98;s:61:\"舒缓酸痛按摩膏 德国Almisan马栗膏 96ML [数量:1];\";i:99;s:22:\"德国Almisan马栗膏\";i:100;s:22:\"德国Almisan马栗膏\";i:101;s:152:\"「告别酸痛 一抹轻松」德国Almisan艾美森热活马栗露香膏 1分钟发热，5分钟驱痛，摆脱关节炎、风湿、腰肩关节酸痛\";i:102;s:89:\"【折扣】阿尔美森 马栗露香膏 一抹舒缓疼痛！德国足球部指定产品\";i:103;s:189:\"限时送3ml小样试用【告别酸痛 一抹轻松】德国Almisan艾美森热活马栗露香膏 1分钟发热，5分钟驱痛  50年匠心品质，德国足球队员专用关节膏凝露\";i:104;s:213:\"爆仓72小时内发货 限时送3ml小样试用【告别酸痛 一抹轻松】德国Almisan艾美森热活马栗露香膏 1分钟发热，5分钟驱痛  50年匠心品质，德国足球队员专用关节膏凝露\";i:105;s:110:\"德国Almisan马栗露香膏 丨 摆脱肩颈、风湿、关节、肌肉酸痛，1分钟发热，5分钟驱痛\";i:106;s:148:\"「告别酸痛 一抹轻松」德国Almisan艾美森热活马栗露香膏 1分钟发热，5分钟驱痛，摆脱关节炎 体验装（96ml/罐*1）\";i:107;s:134:\"德国Almisan艾美森热活马栗露香膏 | 1分钟发热5分钟驱痛，50年匠心品质，德国足球队员专用关节膏凝露\";i:108;s:118:\"【5分钟驱痛】德国Almisan阿尔美森马栗露香膏 1分钟发热 5分钟驱痛 德国足球队专用关节膏\";i:109;s:59:\"马栗膏   告别酸痛，一抹轻松，50年匠心品质\";i:110;s:36:\"德国足球员专用关节膏凝露\";i:111;s:65:\"  马栗膏   告别酸痛，一抹轻松，50年匠心品质\";i:112;s:36:\"德国足球员专用关节膏凝露\";i:113;s:26:\"almisan马栗舒缓膏96ml\";i:114;s:75:\"德国Almisan阿尔美森马栗露香膏1分钟发热5分钟驱痛关节膏\";i:115;s:52:\"gao  告别酸痛，一抹轻松，50年匠心品质\";i:116;s:36:\"德国足球员专用关节膏凝露\";i:117;s:85:\"德国almisan阿尔艾美森筋骨酸痛舒缓香膏马栗膏马栗露乐按摩凝胶\";i:118;s:37:\"颜色分类:白色包装红色膏体\";i:119;s:105:\"德国原装Almisan艾美森马栗香膏96ml&250ml 去除酸痛，一抹轻松，德国运动员都用它\";i:120;s:61:\"马栗膏   告别酸痛，一抹轻松，50年匠心品质\";i:121;s:36:\"德国足球员专用关节膏凝露\";i:122;s:61:\"马栗膏   告别酸痛，一抹轻松，50年匠心品质\";i:123;s:36:\"德国足球员专用关节膏凝露\";i:124;s:93:\"【0元抽奖】阿尔美森 马栗露香膏 一抹舒缓疼痛！德国足球部指定产品\";i:125;s:56:\"Almisan阿尔美森马栗露香膏（96ml）赠3ml小样\";i:126;s:34:\"Almisan阿尔美森马栗露香膏\";i:127;s:95:\"【积分抽奖】阿尔美森 马栗露香膏 一抹舒缓疼痛！德国足球部指定产品\";i:128;s:61:\"马栗膏   告别酸痛，一抹轻松，50年匠心品质\";i:129;s:36:\"德国足球员专用关节膏凝露\";i:130;s:55:\"阿尔美森Almisan® 马栗露肌肉关节舒缓香膏\";i:131;s:102:\"德国阿尔美森马栗露香膏 渐褪酸疼 五分钟好多了 八种天然植物不疼提取成分\";i:132;s:86:\"5分钟舒缓肩颈酸痛｜almisan阿尔美森马栗露香膏（每单送试用装）\";i:133;s:118:\"【5分钟驱痛】德国Almisan阿尔美森马栗露香膏 1分钟发热 5分钟驱痛 德国足球队专用关节膏\";i:134;s:85:\"德国Almisan阿尔艾美森热活马栗香膏舒活按摩缓解关节酸疼痛凝露\";i:135;s:227:\"「5分钟驱痛，摆脱关节炎、风湿」德国Almisan艾美森热活马栗露香膏 1分钟发热，5分钟驱痛，摆脱关节炎、风湿、腰肩关节酸痛 50年匠心品质，德国足球队员专用关节膏凝露\";i:136;s:78:\"德国足球队都在用，德国进口马栗香膏，涂一涂，告别不适\";i:137;s:24:\"艾美森马栗露香膏\";i:138;s:77:\"阿尔美森 马栗露香膏 一抹舒缓疼痛！德国足球部指定产品\";i:139;s:43:\"德国Almisan艾美森热活马栗露香膏\";i:140;s:14:\"96ml/小罐装\";i:141;s:9:\"栗香膏\";i:142;s:118:\"【5分钟驱痛】德国Almisan阿尔美森马栗露香膏 1分钟发热 9分钟驱痛 德国足球队专用关节膏\";i:143;s:34:\"Almisan阿尔美森马栗露香膏\";i:144;s:62:\"5分钟舒缓肩颈酸痛｜almisan阿尔美森马栗露香膏\";i:145;s:21:\"红色马栗露香膏\";i:146;s:135:\"德国Almisan艾美森热活马栗露香膏 | 1分钟发热5分钟驱痛，106年匠心品质，德国足球队员专用关节膏凝露\";i:147;s:134:\"德国Almisan艾美森热活马栗露香膏 | 1分钟发热5分钟驱痛，51年匠心品质，德国足球队员专用关节膏凝露\";i:148;s:134:\"德国Almisan艾美森热活马栗露香膏 | 1分钟发热5分钟驱痛，52年匠心品质，德国足球队员专用关节膏凝露\";i:149;s:122:\"德国Almisan艾美森热活马栗露香膏关节膏风湿关节炎腰肩颈椎酸痛 净含量: 体验装（96ml/罐*1）\";i:150;s:34:\"almisan阿尔美森马栗露香膏\";i:151;s:9:\"马粟膏\";i:152;s:21:\"艾尔美森马栗膏\";i:153;s:34:\"德国Almisan阿尔美森马栗膏\";i:154;s:33:\"艾尔美森马栗膏（专用）\";i:155;s:118:\"【5分钟驱痛】德国Almisan阿尔美森马栗露香膏 1分钟发热 5分钟驱痛 德国足球队专用关节膏\";i:156;s:110:\"Almisan马栗露 | 肩颈疼痛、肌肉酸胀，轻轻一抹，5分钟就缓解了，德国足球队都在用\";i:157;s:56:\"马栗膏告别酸痛，一抹轻松，50年匠心品质\";i:158;s:36:\"德国足球员专用关节膏凝露\";i:159;s:60:\"艾美森马栗香膏，止痛舒缓，身体一抹就轻松\";i:160;s:43:\"艾美森almisan德国原装马栗露香膏\";i:161;s:59:\"马栗膏   告别酸痛，一抹轻松，50年匠心品质\";i:162;s:36:\"德国足球员专用关节膏凝露\";i:163;s:126:\"艾美森马栗香膏｜止痛舒缓，身体一抹就轻松【12.10-12.12购买96ml送3ml/袋，250ml送牛角刮板一个】\";i:164;s:126:\"【12.10-12.12购买96ml送3ml/袋，250ml送牛角刮板一个】艾美森马栗香膏｜止痛舒缓，身体一抹就轻松\";i:165;s:37:\"almisan阿尔艾美森马栗露香膏\";i:166;s:85:\"almisan阿尔艾美森马栗露香膏风湿骨痛膏肌肉酸痛舒缓膏按摩凝胶\";i:167;s:110:\"德国almisan阿尔美森马栗膏露香膏【红膏】5分钟缓解肌体酸痛德国足球队员专用药膏\";i:168;s:46:\"德国原装进口Almisan阿尔美森马栗露\";i:169;s:36:\"阿尔美森马栗露香膏热活型\";i:170;s:36:\"阿尔美森马栗露香膏热和型\";i:171;s:113:\"【下单赠小样】舒缓身体，减缓身体不适 来自德国的Almisan阿尔艾美森马栗香膏热活型\";i:172;s:78:\"艾美森马栗香膏【顺丰发货】｜止痛舒缓，身体一抹就轻松\";i:173;s:113:\"【下单赠小样】舒缓身体，减缓身体不适 来自德国的Almisan阿尔艾美森马栗香膏热活型\";i:174;s:69:\"艾美森马栗露香膏丨一涂一抹，像敷热毛巾一样舒服\";i:175;s:54:\"阿尔美森Almisan? 马栗露肌肉关节舒缓香膏\";i:176;s:70:\"【肉疼克星马栗露】德国Almisan舒缓活络凝露马栗香膏\";i:177;s:69:\"艾美森马栗露香膏丨一涂一抹，像敷热毛巾一样舒服\";i:178;s:69:\"艾美森马栗露香膏丨一涂一抹，像敷热毛巾一样舒服\";i:179;s:27:\"艾美森马栗露香膏丨\";i:180;s:165:\"春节期间正常发货 告别酸痛 一抹轻松 德国Almisan艾美森热活马栗膏 5分钟告别腰酸背痛肩颈不适 摆脱关节炎 老寒腿 运动损伤\";i:181;s:63:\"德国Almisan艾美森 热活马栗露香膏 缓解肌肉酸痛\";i:182;s:66:\"【5分钟见效 告别酸疼】德国进口Almisan马栗露香膏\";i:183;s:49:\"阿尔美森马栗露香膏 肌肉酸痛按摩膏\";i:184;s:92:\"【折扣】阿尔美森 马栗露香膏 缓解肌肉不适感！德国足球部指定品牌\";i:185;s:110:\"德国Almisan马栗露香膏 丨 摆脱肩颈、风湿、关节、肌肉酸痛，1分钟发热，5分钟驱痛\";i:186;s:85:\"德国Almisan阿尔美森马栗露香膏 1分钟发热 德国足球队专用关节膏\";}', 2, '罗阳', 1, NULL, '2020-06-01 14:54:16', NULL, 0, NULL, 0, NULL);

-- ----------------------------
-- Table structure for shop_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods_attr`;
CREATE TABLE `shop_goods_attr`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '产品规格表',
  `goods_id` int(11) NOT NULL COMMENT '产品id',
  `attr_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '规格名称',
  `alias_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '别名名称',
  `attr_count` int(5) NOT NULL DEFAULT 0 COMMENT '规格数量',
  `add_uid` int(11) NOT NULL COMMENT '添加人',
  `add_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_goods_attr
-- ----------------------------
INSERT INTO `shop_goods_attr` VALUES (1, 1, '测试', '1133', 1, 1, '2020-05-25 17:18:56');
INSERT INTO `shop_goods_attr` VALUES (2, 1, '11', '66666', 11, 1, '2020-05-27 10:46:43');
INSERT INTO `shop_goods_attr` VALUES (3, 1, '第三个', '33', 2, 1, '2020-05-25 17:18:25');
INSERT INTO `shop_goods_attr` VALUES (4, 1, '第四个', '！！！！！！！！！！！！！！！！！！！', 4, 1, NULL);
INSERT INTO `shop_goods_attr` VALUES (5, 2, '250ml', 'a:94:{i:0;s:5:\"250ml\";i:1;s:13:\"规格:250ml;\";i:2;s:54:\"德国Almisan阿尔艾美森马栗香膏热活型250ml\";i:3;s:5:\"250ml\";i:4;s:30:\"款式:热活型;规格:250ml;\";i:5;s:13:\"250毫升/罐\";i:6;s:30:\"款式:热活型;规格:250ml;\";i:7;s:12:\"如图 250ml\";i:8;s:13:\"规格:250ml;\";i:9;s:28:\"容量:家庭装（250ml）;\";i:10;s:11:\"250ml/罐*1\";i:11;s:9:\"250ml/罐\";i:12;s:37:\"净含量: 家庭装（250ml/罐*1）\";i:13;s:13:\"规格:250ML;\";i:14;s:13:\"规格:250ml;\";i:15;s:28:\"规格:家庭装250ml/罐；\";i:16;s:33:\"规格:家庭装（250ml/罐*1）\";i:17;s:13:\"almisan-250ml\";i:18;s:5:\"250ML\";i:19;s:5:\"250ml\";i:20;s:25:\"盒:家庭装（250ml）;\";i:21;s:30:\"款式:热活型;规格:250ml;\";i:22;s:16:\"规格 250毫升\";i:23;s:32:\"规格:250ml/瓶，赠3ml小样;\";i:24;s:5:\"250ml\";i:25;s:15:\"250ml/大罐装\";i:26;s:26:\"家庭装（250ml/罐*1）\";i:27;s:26:\"艾美森马栗香膏250ml\";i:28;s:9:\"250ml/瓶\";i:29;s:31:\"规格:250ml/瓶，赠3ml小样\";i:30;s:30:\"款式:热活型;规格:250ml;\";i:31;s:30:\"款式:热活型;规格:250ml;\";i:32;s:25:\"盒:家庭装（250ml）;\";i:33;s:23:\"规格:家庭装 250ML;\";i:34;s:20:\"家庭装（250ml）\";i:35;s:11:\"250ml/罐*1\";i:36;s:26:\"家庭装（250ml/罐*1）\";i:37;s:26:\"艾美森马栗香膏250ml\";i:38;s:5:\"250ml\";i:39;s:26:\"艾美森马栗香膏250ml\";i:40;s:17:\"规格:250ml/瓶;\";i:41;s:30:\"款式:热活型;规格:250ml;\";i:42;s:20:\"250ML热活型红膏\";i:43;s:26:\"艾美森马栗香膏250ml\";i:44;s:30:\"款式:热活型;规格:250ml;\";i:45;s:0:\"\";i:46;s:13:\"规格:250ml;\";i:47;s:24:\"马栗露香膏250ml/盒\";i:48;s:9:\"家庭装\";i:49;s:11:\"规格250ml\";i:50;s:35:\"艾美森马栗香膏热活型250ml\";i:51;s:27:\"almisan马栗舒缓膏250ml\";i:52;s:61:\"舒缓酸痛按摩膏 德国Almisan马栗膏 250ML [数量:1]\";i:53;s:10:\"支:250ml;\";i:54;s:16:\"净含量:250ML;\";i:55;s:0:\"\";i:56;s:57:\"Almisan阿尔美森马栗露香膏（250ml）赠3ml小样\";i:57;s:23:\"规格:家庭装 250ML;\";i:58;s:85:\"规格 马栗露香膏250ml购买须知 快递实名制，下单请填写真实姓名\";i:59;s:16:\"(家庭装250ml)\";i:60;s:15:\"家庭装 250ML\";i:61;s:9:\"250毫升\";i:62;s:13:\"规格:250ML;\";i:63;s:13:\"规格:250ml;\";i:64;s:15:\"250ml毫升/罐\";i:65;s:16:\"规格 250毫升\";i:66;s:30:\"款式:热活型;规格:250ml;\";i:67;s:11:\"红膏250ml\";i:68;s:12:\"规格:250ml\";i:69;s:22:\"规格:家庭装 250ML\";i:70;s:13:\"规格:250ML;\";i:71;s:35:\"艾美森马栗香膏热活型250ml\";i:72;s:16:\"净含量:250ML;\";i:73;s:14:\"马栗膏250ml\";i:74;s:5:\"250ml\";i:75;s:10:\"250ml*1瓶\";i:76;s:5:\"250ml\";i:77;s:5:\"250ml\";i:78;s:14:\"家庭装250ml\";i:79;s:14:\"家庭装250ml\";i:80;s:26:\"规格:家庭装250ml/罐;\";i:81;s:13:\"规格:250ML;\";i:82;s:5:\"250ml\";i:83;s:14:\"家庭装250ml\";i:84;s:30:\"款式:热活型;规格:250ml;\";i:85;s:5:\"250ml\";i:86;s:24:\"马栗露香膏250ml/瓶\";i:87;s:5:\"250ML\";i:88;s:26:\"家庭装（250ml/罐*1）\";i:89;s:21:\"艾美森马栗香膏\";i:90;s:9:\"250ml/罐\";i:91;s:14:\"规格：250ml\";i:92;s:20:\"250ML热活型红膏\";i:93;s:43:\"规格:250ml（额外赠袋装小样3ml）;\";}', 1, 1, NULL);

-- ----------------------------
-- Table structure for shop_import_log
-- ----------------------------
DROP TABLE IF EXISTS `shop_import_log`;
CREATE TABLE `shop_import_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '导入记录表',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '导入文件名称',
  `import_tpl_id` int(11) NOT NULL COMMENT '导入的模板id',
  `dealer_id` int(11) NOT NULL COMMENT '经销商id',
  `add_date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `add_uid` int(11) NOT NULL COMMENT '添加人id',
  `add_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '添加人名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_import_log
-- ----------------------------
INSERT INTO `shop_import_log` VALUES (5, '3721 20200525马粟膏.xlsx', 7, 3, NULL, 1591170685, 1, '罗阳');

-- ----------------------------
-- Table structure for shop_import_tpl
-- ----------------------------
DROP TABLE IF EXISTS `shop_import_tpl`;
CREATE TABLE `shop_import_tpl`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '导入模板表',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '模板名称',
  `dealer_id` int(5) NOT NULL COMMENT '经销商id',
  `start_line` int(3) NOT NULL COMMENT '开始行数',
  `table_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '表名称',
  `add_date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  `add_uid` int(11) NOT NULL COMMENT '添加人',
  `table_config` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '表结构',
  `update_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `add_real_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '添加人姓名',
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '状态 1正常 0暂停',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_import_tpl
-- ----------------------------
INSERT INTO `shop_import_tpl` VALUES (1, '阿宝', 3, 1, 'import_tpl_ab_526', '2020-06-01 10:58:24', 1, 'a:5:{i:0;a:7:{s:5:\"title\";s:14:\"文件模板id\";s:3:\"col\";s:0:\"\";s:4:\"type\";s:3:\"int\";s:6:\"length\";i:5;s:6:\"filter\";s:13:\"import_tpl_id\";s:6:\"tag_id\";s:0:\"\";s:7:\"is_null\";s:8:\"NOT NULL\";}i:1;a:7:{s:5:\"title\";s:17:\"导入的文件id\";s:3:\"col\";s:0:\"\";s:4:\"type\";s:3:\"int\";s:6:\"length\";i:11;s:6:\"filter\";s:7:\"file_id\";s:6:\"tag_id\";s:0:\"\";s:7:\"is_null\";s:8:\"NOT NULL\";}i:2;a:7:{s:5:\"title\";s:12:\"订单编号\";s:3:\"col\";s:1:\"A\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";i:255;s:6:\"filter\";s:4:\"ddbh\";s:6:\"tag_id\";s:1:\"4\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:3;a:7:{s:5:\"title\";s:15:\"外部订单号\";s:3:\"col\";s:1:\"B\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";i:255;s:6:\"filter\";s:5:\"wbddh\";s:6:\"tag_id\";N;s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:4;a:7:{s:5:\"title\";s:12:\"商品名称\";s:3:\"col\";s:1:\"C\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";i:255;s:6:\"filter\";s:4:\"spmc\";s:6:\"tag_id\";N;s:7:\"is_null\";s:12:\"DEFAULT NULL\";}}', '2020-06-01 10:58:24', NULL, '罗阳', 1);
INSERT INTO `shop_import_tpl` VALUES (6, '罗拉贸易', 3, 1, 'import_tpl_lly_971', '2020-06-01 10:58:26', 1, 'a:12:{i:0;a:6:{s:5:\"title\";s:14:\"文件模板id\";s:4:\"type\";s:3:\"int\";s:6:\"length\";i:5;s:6:\"filter\";s:13:\"import_tpl_id\";s:6:\"tag_id\";s:0:\"\";s:7:\"is_null\";s:8:\"NOT NULL\";}i:1;a:6:{s:5:\"title\";s:17:\"导入的文件id\";s:4:\"type\";s:3:\"int\";s:6:\"length\";i:11;s:6:\"filter\";s:7:\"file_id\";s:6:\"tag_id\";s:0:\"\";s:7:\"is_null\";s:8:\"NOT NULL\";}i:2;a:6:{s:5:\"title\";s:15:\"商城订单号\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:5:\"scddh\";s:6:\"tag_id\";s:1:\"4\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:3;a:6:{s:5:\"title\";s:12:\"订单时间\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:4:\"ddsj\";s:6:\"tag_id\";s:1:\"5\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:4;a:6:{s:5:\"title\";s:15:\"收件人姓名\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:5:\"sjrxm\";s:6:\"tag_id\";s:1:\"6\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:5;a:6:{s:5:\"title\";s:21:\"收件人手机号码\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:7:\"sjrsjhm\";s:6:\"tag_id\";s:1:\"7\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:6;a:6:{s:5:\"title\";s:3:\"省\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:1:\"s\";s:6:\"tag_id\";s:1:\"8\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:7;a:6:{s:5:\"title\";s:6:\"地市\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:2:\"ds\";s:6:\"tag_id\";s:2:\"10\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:8;a:6:{s:5:\"title\";s:21:\"收件人具体地址\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:7:\"sjrjtdz\";s:6:\"tag_id\";s:2:\"11\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:9;a:6:{s:5:\"title\";s:12:\"商品名称\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:4:\"spmc\";s:6:\"tag_id\";s:1:\"1\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:10;a:6:{s:5:\"title\";s:9:\"SKU规格\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:5:\"skugg\";s:6:\"tag_id\";s:1:\"2\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:11;a:6:{s:5:\"title\";s:9:\"SKU数量\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:5:\"skusl\";s:6:\"tag_id\";s:1:\"3\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}}', '2020-06-01 10:58:26', NULL, '罗阳', 1);
INSERT INTO `shop_import_tpl` VALUES (7, '3721', 3, 1, 'import_tpl_3721_863', '2020-06-03 09:08:45', 1, 'a:16:{i:0;a:4:{s:5:\"title\";s:14:\"文件模板id\";s:6:\"filter\";s:13:\"import_tpl_id\";s:4:\"type\";s:3:\"int\";s:6:\"tag_id\";N;}i:1;a:4:{s:5:\"title\";s:17:\"导入的文件id\";s:6:\"filter\";s:7:\"file_id\";s:4:\"type\";s:3:\"int\";s:6:\"tag_id\";N;}i:2;a:4:{s:5:\"title\";s:12:\"订单编号\";s:6:\"filter\";s:4:\"ddbh\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:1:\"4\";}i:3;a:4:{s:5:\"title\";s:12:\"订单时间\";s:6:\"filter\";s:4:\"ddsj\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:1:\"5\";}i:4;a:4:{s:5:\"title\";s:12:\"商品名称\";s:6:\"filter\";s:4:\"spmc\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:1:\"1\";}i:5;a:4:{s:5:\"title\";s:12:\"商品型号\";s:6:\"filter\";s:4:\"spxh\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:1:\"2\";}i:6;a:4:{s:5:\"title\";s:12:\"购买数量\";s:6:\"filter\";s:4:\"gmsl\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:1:\"3\";}i:7;a:4:{s:5:\"title\";s:15:\"收件人姓名\";s:6:\"filter\";s:5:\"sjrxm\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:1:\"6\";}i:8;a:4:{s:5:\"title\";s:3:\"省\";s:6:\"filter\";s:1:\"s\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:1:\"8\";}i:9;a:4:{s:5:\"title\";s:6:\"地市\";s:6:\"filter\";s:2:\"ds\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:1:\"9\";}i:10;a:4:{s:5:\"title\";s:3:\"区\";s:6:\"filter\";s:1:\"q\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:2:\"10\";}i:11;a:4:{s:5:\"title\";s:18:\"收货详细地址\";s:6:\"filter\";s:6:\"shxxdz\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:2:\"11\";}i:12;a:4:{s:5:\"title\";s:12:\"物流公司\";s:6:\"filter\";s:4:\"wlgs\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";N;}i:13;a:4:{s:5:\"title\";s:12:\"物流单号\";s:6:\"filter\";s:4:\"wldh\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";N;}i:14;a:4:{s:5:\"title\";s:6:\"备注\";s:6:\"filter\";s:2:\"bz\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:2:\"12\";}i:15;a:4:{s:5:\"title\";s:15:\"收件人手机\";s:6:\"filter\";s:8:\"sjrsj_84\";s:4:\"type\";s:7:\"varchar\";s:6:\"tag_id\";s:1:\"7\";}}', '2020-06-03 09:08:45', NULL, '罗阳', 1);

-- ----------------------------
-- Table structure for shop_import_tpl_3721_863
-- ----------------------------
DROP TABLE IF EXISTS `shop_import_tpl_3721_863`;
CREATE TABLE `shop_import_tpl_3721_863`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `add_uid` int(5) NOT NULL COMMENT '添加时间',
  `import_log_id` int(5) NOT NULL COMMENT '文件模板id',
  `ddbh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '订单编号',
  `ddsj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '订单时间',
  `spmc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '商品名称',
  `spxh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '商品型号',
  `gmsl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '购买数量',
  `sjrxm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '收件人姓名',
  `s` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '省',
  `ds` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '地市',
  `q` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '区',
  `shxxdz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '收货详细地址',
  `wlgs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '物流公司',
  `wldh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '物流单号',
  `bz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '备注',
  `sjrsj_84` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '收件人手机',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shop_import_tpl_3721_863
-- ----------------------------
INSERT INTO `shop_import_tpl_3721_863` VALUES (5, 1591170685, 1, 5, 'E20200523231644032700001', '43974.970393519', '马粟膏', '250ML', '1', '马洁菲', '广东省', '广州市', '荔湾区', '广东省广州市荔湾区中山八路18号富力广场(北区)506房', NULL, NULL, NULL, '	13824417074');
INSERT INTO `shop_import_tpl_3721_863` VALUES (6, 1591170685, 1, 5, 'E20200523124533032700003', '43974.531724537', '马粟膏', '250ML', '1', '章月萍', '浙江省', '绍兴市', '新昌县', '浙江省绍兴市新昌县南明街道环城东路49号131', NULL, NULL, NULL, '	13858593535');

-- ----------------------------
-- Table structure for shop_import_tpl_field
-- ----------------------------
DROP TABLE IF EXISTS `shop_import_tpl_field`;
CREATE TABLE `shop_import_tpl_field`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '导入模板字段映射表',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内部字段',
  `order_columns` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '字段名称',
  `is_null` tinyint(2) NOT NULL DEFAULT 0 COMMENT '是否可以为空 1不能 2可以',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_import_tpl_field
-- ----------------------------
INSERT INTO `shop_import_tpl_field` VALUES (1, '商品名称', 'goods_name', 1);
INSERT INTO `shop_import_tpl_field` VALUES (2, '商品规格', 'goods_attr_name', 1);
INSERT INTO `shop_import_tpl_field` VALUES (3, '商品数量', 'goods_count', 1);
INSERT INTO `shop_import_tpl_field` VALUES (4, '订单编号', 'order_sn', 1);
INSERT INTO `shop_import_tpl_field` VALUES (5, '订单时间', 'order_time', 0);
INSERT INTO `shop_import_tpl_field` VALUES (6, '收件人', 'consignee', 1);
INSERT INTO `shop_import_tpl_field` VALUES (7, '收件电话', 'consignee_mobile', 1);
INSERT INTO `shop_import_tpl_field` VALUES (8, '省', 'province', 0);
INSERT INTO `shop_import_tpl_field` VALUES (9, '市', 'city', 0);
INSERT INTO `shop_import_tpl_field` VALUES (10, '区', 'district', 0);
INSERT INTO `shop_import_tpl_field` VALUES (11, '具体地址', 'address', 0);
INSERT INTO `shop_import_tpl_field` VALUES (12, '买家备注', 'buyer_remrk', 0);
INSERT INTO `shop_import_tpl_field` VALUES (13, '备注', 'remark', 0);

-- ----------------------------
-- Table structure for shop_import_tpl_lly_971
-- ----------------------------
DROP TABLE IF EXISTS `shop_import_tpl_lly_971`;
CREATE TABLE `shop_import_tpl_lly_971`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `add_uid` int(5) NOT NULL COMMENT '添加时间',
  `import_tpl_id` int(5) NOT NULL COMMENT '文件模板id',
  `file_id` int(11) NOT NULL COMMENT '导入的文件id',
  `scddh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '商城订单号',
  `ddsj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '订单时间',
  `sjrxm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '收件人姓名',
  `sjrsjhm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '收件人手机号码',
  `s` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '省',
  `ds` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '地市',
  `sjrjtdz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '收件人具体地址',
  `spmc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT '商品名称',
  `skugg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT 'SKU规格',
  `skusl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL COMMENT 'SKU数量',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_import_tpl_lly_971
-- ----------------------------

-- ----------------------------
-- Table structure for shop_order
-- ----------------------------
DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单表',
  `import_log_id` int(11) NOT NULL COMMENT '导入的文件id',
  `dealer_id` int(11) NOT NULL COMMENT '经销商id',
  `goods_id` int(11) NOT NULL COMMENT '商品id',
  `goods_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `goods_attr_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '规格名称',
  `goods_attr_id` int(11) NOT NULL COMMENT '规格id',
  `goods_attr_count` int(5) NOT NULL COMMENT '规格数量',
  `goods_count` int(5) NOT NULL COMMENT '商品数量',
  `order_sn` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '导入订单号',
  `order_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '订单时间',
  `consignee` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '收件人',
  `consignee_mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '收件电话',
  `province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '省',
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '市',
  `district` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '区',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '具体地址',
  `buyer_remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '买家备注',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '备注',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `add_date` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  `add_uid` int(11) NOT NULL COMMENT '导入人',
  `add_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '导入人',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_order
-- ----------------------------
INSERT INTO `shop_order` VALUES (1, 5, 3, 2, '马粟膏', '250ML', 5, 1, 1, 'E20200523231644032700001', '43974.970393519', '马洁菲', '	13824417074', '广东省', '广州市', '荔湾区', '广东省广州市荔湾区中山八路18号富力广场(北区)506房', '', '', 1591170685, NULL, 1, '罗阳');
INSERT INTO `shop_order` VALUES (2, 5, 3, 2, '马粟膏', '250ML', 5, 1, 1, 'E20200523124533032700003', '43974.531724537', '章月萍', '	13858593535', '浙江省', '绍兴市', '新昌县', '浙江省绍兴市新昌县南明街道环城东路49号131', '', '', 1591170685, NULL, 1, '罗阳');

SET FOREIGN_KEY_CHECKS = 1;

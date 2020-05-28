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

 Date: 28/05/2020 18:00:06
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

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
  `goods_alias_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL COMMENT '产品别名',
  `brand_id` int(11) NOT NULL COMMENT '品牌方id',
  `add_uid` int(5) NOT NULL COMMENT '添加人',
  `update_uid` int(5) NULL DEFAULT NULL COMMENT '修改人',
  `add_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  `update_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '修改时间',
  `repertory` int(11) NULL DEFAULT 0 COMMENT '库存',
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0 COMMENT '审核状态0待审核 1审核通过',
  `audit_uid` int(11) NULL DEFAULT NULL COMMENT '审核人id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_goods
-- ----------------------------
INSERT INTO `shop_goods` VALUES (1, 'Quinton天然海洋水润眼喷雾', '111111111111111111111111111111111111111111', 1, 1, 1, '2020-05-27 15:14:17', '2020-05-27 15:14:17', 0, '2020-05-27 15:14:17', 0, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_goods_attr
-- ----------------------------
INSERT INTO `shop_goods_attr` VALUES (1, 1, '测试', '1133', 1, 1, '2020-05-25 17:18:56');
INSERT INTO `shop_goods_attr` VALUES (2, 1, '11', '66666', 11, 1, '2020-05-27 10:46:43');
INSERT INTO `shop_goods_attr` VALUES (3, 1, '第三个', '33', 2, 1, '2020-05-25 17:18:25');
INSERT INTO `shop_goods_attr` VALUES (4, 1, '第四个', '！！！！！！！！！！！！！！！！！！！', 4, 1, NULL);

-- ----------------------------
-- Table structure for shop_import_log
-- ----------------------------
DROP TABLE IF EXISTS `shop_import_log`;
CREATE TABLE `shop_import_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '导入记录表',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '导入文件名称',
  `import_tpl_id` int(11) NOT NULL COMMENT '导入的模板id',
  `dealer_id` int(11) NOT NULL COMMENT '经销商id',
  `add_date` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `add_uid` int(11) NOT NULL COMMENT '添加人id',
  `add_username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '添加人名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_import_log
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_import_tpl
-- ----------------------------
INSERT INTO `shop_import_tpl` VALUES (1, '阿宝', 123, 1, 'import_tpl_ab_526', '2020-05-14 18:00:31', 1, 'a:5:{i:0;a:7:{s:5:\"title\";s:14:\"文件模板id\";s:3:\"col\";s:0:\"\";s:4:\"type\";s:3:\"int\";s:6:\"length\";i:5;s:6:\"filter\";s:13:\"import_tpl_id\";s:6:\"tag_id\";s:0:\"\";s:7:\"is_null\";s:8:\"NOT NULL\";}i:1;a:7:{s:5:\"title\";s:17:\"导入的文件id\";s:3:\"col\";s:0:\"\";s:4:\"type\";s:3:\"int\";s:6:\"length\";i:11;s:6:\"filter\";s:7:\"file_id\";s:6:\"tag_id\";s:0:\"\";s:7:\"is_null\";s:8:\"NOT NULL\";}i:2;a:7:{s:5:\"title\";s:12:\"订单编号\";s:3:\"col\";s:1:\"A\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";i:255;s:6:\"filter\";s:4:\"ddbh\";s:6:\"tag_id\";s:1:\"4\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:3;a:7:{s:5:\"title\";s:15:\"外部订单号\";s:3:\"col\";s:1:\"B\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";i:255;s:6:\"filter\";s:5:\"wbddh\";s:6:\"tag_id\";N;s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:4;a:7:{s:5:\"title\";s:12:\"商品名称\";s:3:\"col\";s:1:\"C\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";i:255;s:6:\"filter\";s:4:\"spmc\";s:6:\"tag_id\";N;s:7:\"is_null\";s:12:\"DEFAULT NULL\";}}', NULL, NULL, '', 1);
INSERT INTO `shop_import_tpl` VALUES (6, '罗拉贸易', 123, 1, 'import_tpl_lly_971', '2020-05-23 22:49:10', 1, 'a:12:{i:0;a:6:{s:5:\"title\";s:14:\"文件模板id\";s:4:\"type\";s:3:\"int\";s:6:\"length\";i:5;s:6:\"filter\";s:13:\"import_tpl_id\";s:6:\"tag_id\";s:0:\"\";s:7:\"is_null\";s:8:\"NOT NULL\";}i:1;a:6:{s:5:\"title\";s:17:\"导入的文件id\";s:4:\"type\";s:3:\"int\";s:6:\"length\";i:11;s:6:\"filter\";s:7:\"file_id\";s:6:\"tag_id\";s:0:\"\";s:7:\"is_null\";s:8:\"NOT NULL\";}i:2;a:6:{s:5:\"title\";s:15:\"商城订单号\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:5:\"scddh\";s:6:\"tag_id\";s:1:\"4\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:3;a:6:{s:5:\"title\";s:12:\"订单时间\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:4:\"ddsj\";s:6:\"tag_id\";s:1:\"5\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:4;a:6:{s:5:\"title\";s:15:\"收件人姓名\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:5:\"sjrxm\";s:6:\"tag_id\";s:1:\"6\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:5;a:6:{s:5:\"title\";s:21:\"收件人手机号码\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:7:\"sjrsjhm\";s:6:\"tag_id\";s:1:\"7\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:6;a:6:{s:5:\"title\";s:3:\"省\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:1:\"s\";s:6:\"tag_id\";s:1:\"8\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:7;a:6:{s:5:\"title\";s:6:\"地市\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:2:\"ds\";s:6:\"tag_id\";s:2:\"10\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:8;a:6:{s:5:\"title\";s:21:\"收件人具体地址\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:7:\"sjrjtdz\";s:6:\"tag_id\";s:2:\"11\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:9;a:6:{s:5:\"title\";s:12:\"商品名称\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:4:\"spmc\";s:6:\"tag_id\";s:1:\"1\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:10;a:6:{s:5:\"title\";s:9:\"SKU规格\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:5:\"skugg\";s:6:\"tag_id\";s:1:\"2\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}i:11;a:6:{s:5:\"title\";s:9:\"SKU数量\";s:4:\"type\";s:7:\"varchar\";s:6:\"length\";s:3:\"255\";s:6:\"filter\";s:5:\"skusl\";s:6:\"tag_id\";s:1:\"3\";s:7:\"is_null\";s:12:\"DEFAULT NULL\";}}', NULL, NULL, '', 1);

-- ----------------------------
-- Table structure for shop_import_tpl_field
-- ----------------------------
DROP TABLE IF EXISTS `shop_import_tpl_field`;
CREATE TABLE `shop_import_tpl_field`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '导入模板字段映射表',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '内部字段',
  `order_columns` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '字段名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_import_tpl_field
-- ----------------------------
INSERT INTO `shop_import_tpl_field` VALUES (1, '商品名称', 'goods_name');
INSERT INTO `shop_import_tpl_field` VALUES (2, '商品规格', 'goods_attr_name');
INSERT INTO `shop_import_tpl_field` VALUES (3, '商品数量', 'goods_count');
INSERT INTO `shop_import_tpl_field` VALUES (4, '订单编号', 'order_sn');
INSERT INTO `shop_import_tpl_field` VALUES (5, '订单时间', 'order_time');
INSERT INTO `shop_import_tpl_field` VALUES (6, '收件人', 'consignee');
INSERT INTO `shop_import_tpl_field` VALUES (7, '收件电话', 'consignee_mobile');
INSERT INTO `shop_import_tpl_field` VALUES (8, '省', 'province');
INSERT INTO `shop_import_tpl_field` VALUES (9, '市', 'city');
INSERT INTO `shop_import_tpl_field` VALUES (10, '区', 'district');
INSERT INTO `shop_import_tpl_field` VALUES (11, '具体地址', 'address');
INSERT INTO `shop_import_tpl_field` VALUES (12, '买家备注', 'buyer_remrk');
INSERT INTO `shop_import_tpl_field` VALUES (13, '备注', 'remark');

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
  `order_time` datetime(0) NULL DEFAULT NULL COMMENT '订单时间',
  `consignee` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '收件人',
  `consignee_mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '收件电话',
  `province` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '省',
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '市',
  `district` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '区',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '具体地址',
  `buyer_remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '买家备注',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT '备注',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `add_date` datetime(0) NOT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of shop_order
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;

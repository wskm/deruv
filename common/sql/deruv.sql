/*
Navicat MySQL Data Transfer

Source Server         : mysql57a
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : deruv

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-08-03 22:24:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for de_auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `de_auth_assignment`;
CREATE TABLE `de_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `de_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `de_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_auth_assignment
-- ----------------------------
INSERT INTO `de_auth_assignment` VALUES ('admin', '1', '1492681041');
INSERT INTO `de_auth_assignment` VALUES ('author', '1', '1497957799');
INSERT INTO `de_auth_assignment` VALUES ('author', '3', '1497957785');

-- ----------------------------
-- Table structure for de_auth_item
-- ----------------------------
DROP TABLE IF EXISTS `de_auth_item`;
CREATE TABLE `de_auth_item` (
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `de_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `de_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_auth_item
-- ----------------------------
INSERT INTO `de_auth_item` VALUES ('/*', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/admin/*', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1495632132', '1495632132');
INSERT INTO `de_auth_item` VALUES ('/article/*', '2', null, null, null, '1495806205', '1495806205');
INSERT INTO `de_auth_item` VALUES ('/article/create', '2', null, null, null, '1495806205', '1495806205');
INSERT INTO `de_auth_item` VALUES ('/article/index', '2', null, null, null, '1495806205', '1495806205');
INSERT INTO `de_auth_item` VALUES ('/block-kind/*', '2', null, null, null, '1496578252', '1496578252');
INSERT INTO `de_auth_item` VALUES ('/block-kind/create', '2', null, null, null, '1496578252', '1496578252');
INSERT INTO `de_auth_item` VALUES ('/block-kind/delete', '2', null, null, null, '1496578252', '1496578252');
INSERT INTO `de_auth_item` VALUES ('/block-kind/index', '2', null, null, null, '1496578252', '1496578252');
INSERT INTO `de_auth_item` VALUES ('/block-kind/set-cache', '2', null, null, null, '1501071627', '1501071627');
INSERT INTO `de_auth_item` VALUES ('/block-kind/update', '2', null, null, null, '1496578252', '1496578252');
INSERT INTO `de_auth_item` VALUES ('/block-kind/view', '2', null, null, null, '1496578252', '1496578252');
INSERT INTO `de_auth_item` VALUES ('/block/*', '2', null, null, null, '1495806205', '1495806205');
INSERT INTO `de_auth_item` VALUES ('/block/create', '2', null, null, null, '1495806205', '1495806205');
INSERT INTO `de_auth_item` VALUES ('/block/delete', '2', null, null, null, '1497956689', '1497956689');
INSERT INTO `de_auth_item` VALUES ('/block/index', '2', null, null, null, '1495806205', '1495806205');
INSERT INTO `de_auth_item` VALUES ('/block/row', '2', null, null, null, '1496578252', '1496578252');
INSERT INTO `de_auth_item` VALUES ('/block/set-cache', '2', null, null, null, '1501071627', '1501071627');
INSERT INTO `de_auth_item` VALUES ('/block/update', '2', null, null, null, '1497956689', '1497956689');
INSERT INTO `de_auth_item` VALUES ('/block/view', '2', null, null, null, '1497956689', '1497956689');
INSERT INTO `de_auth_item` VALUES ('/category/*', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/category/create', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/category/delete', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/category/index', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/category/set-cache', '2', null, null, null, '1501071627', '1501071627');
INSERT INTO `de_auth_item` VALUES ('/category/update', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/category/view', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/comment/*', '2', null, null, null, '1498998721', '1498998721');
INSERT INTO `de_auth_item` VALUES ('/comment/create', '2', null, null, null, '1498998721', '1498998721');
INSERT INTO `de_auth_item` VALUES ('/comment/delete', '2', null, null, null, '1498998721', '1498998721');
INSERT INTO `de_auth_item` VALUES ('/comment/index', '2', null, null, null, '1498998721', '1498998721');
INSERT INTO `de_auth_item` VALUES ('/comment/update', '2', null, null, null, '1498998721', '1498998721');
INSERT INTO `de_auth_item` VALUES ('/comment/view', '2', null, null, null, '1498998721', '1498998721');
INSERT INTO `de_auth_item` VALUES ('/content/*', '2', null, null, null, '1496132988', '1496132988');
INSERT INTO `de_auth_item` VALUES ('/content/create', '2', null, null, null, '1496132988', '1496132988');
INSERT INTO `de_auth_item` VALUES ('/content/delete', '2', null, null, null, '1496132988', '1496132988');
INSERT INTO `de_auth_item` VALUES ('/content/index', '2', null, null, null, '1496132988', '1496132988');
INSERT INTO `de_auth_item` VALUES ('/content/search', '2', null, null, null, '1497956689', '1497956689');
INSERT INTO `de_auth_item` VALUES ('/content/update', '2', null, null, null, '1496132988', '1496132988');
INSERT INTO `de_auth_item` VALUES ('/content/view', '2', null, null, null, '1496132988', '1496132988');
INSERT INTO `de_auth_item` VALUES ('/core/*', '2', null, null, null, '1498998721', '1498998721');
INSERT INTO `de_auth_item` VALUES ('/debug/*', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/gii/*', '2', null, null, null, '1495631869', '1495631869');
INSERT INTO `de_auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/log-action/*', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-action/create', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-action/delete', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-action/delete-expired', '2', null, null, null, '1498047808', '1498047808');
INSERT INTO `de_auth_item` VALUES ('/log-action/index', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-action/update', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-action/view', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-login/*', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-login/create', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-login/delete', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-login/delete-expired', '2', null, null, null, '1498047808', '1498047808');
INSERT INTO `de_auth_item` VALUES ('/log-login/index', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-login/update', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log-login/view', '2', null, null, null, '1497963150', '1497963150');
INSERT INTO `de_auth_item` VALUES ('/log/*', '2', null, null, null, '1495806206', '1495806206');
INSERT INTO `de_auth_item` VALUES ('/log/create', '2', null, null, null, '1495806206', '1495806206');
INSERT INTO `de_auth_item` VALUES ('/log/index', '2', null, null, null, '1495806205', '1495806205');
INSERT INTO `de_auth_item` VALUES ('/notice/*', '2', null, null, null, '1498047798', '1498047798');
INSERT INTO `de_auth_item` VALUES ('/notice/list', '2', null, null, null, '1498047808', '1498047808');
INSERT INTO `de_auth_item` VALUES ('/plugin/*', '2', null, null, null, '1495806206', '1495806206');
INSERT INTO `de_auth_item` VALUES ('/plugin/create', '2', null, null, null, '1495806206', '1495806206');
INSERT INTO `de_auth_item` VALUES ('/plugin/index', '2', null, null, null, '1495806206', '1495806206');
INSERT INTO `de_auth_item` VALUES ('/setting/*', '2', null, null, null, '1495631892', '1495631892');
INSERT INTO `de_auth_item` VALUES ('/setting/index', '2', null, null, null, '1495631884', '1495631884');
INSERT INTO `de_auth_item` VALUES ('/setting/set-cache', '2', null, null, null, '1501071627', '1501071627');
INSERT INTO `de_auth_item` VALUES ('/setting/update', '2', null, null, null, '1495631884', '1495631884');
INSERT INTO `de_auth_item` VALUES ('/setting/update-cache', '2', null, null, null, '1500171122', '1500171122');
INSERT INTO `de_auth_item` VALUES ('/site/*', '2', null, null, null, '1495631878', '1495631878');
INSERT INTO `de_auth_item` VALUES ('/site/captcha', '2', null, null, null, '1495631878', '1495631878');
INSERT INTO `de_auth_item` VALUES ('/site/close', '2', null, null, null, '1495631878', '1495631878');
INSERT INTO `de_auth_item` VALUES ('/site/error', '2', null, null, null, '1495631878', '1495631878');
INSERT INTO `de_auth_item` VALUES ('/site/index', '2', null, null, null, '1495631878', '1495631878');
INSERT INTO `de_auth_item` VALUES ('/site/login', '2', null, null, null, '1495631878', '1495631878');
INSERT INTO `de_auth_item` VALUES ('/site/logout', '2', null, null, null, '1495631878', '1495631878');
INSERT INTO `de_auth_item` VALUES ('/test/*', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/test/index', '2', null, null, null, '1495631907', '1495631907');
INSERT INTO `de_auth_item` VALUES ('/upload/*', '2', null, null, null, '1496132988', '1496132988');
INSERT INTO `de_auth_item` VALUES ('/upload/content', '2', null, null, null, '1497186078', '1497186078');
INSERT INTO `de_auth_item` VALUES ('/upload/del', '2', null, null, null, '1496932532', '1496932532');
INSERT INTO `de_auth_item` VALUES ('/upload/file', '2', null, null, null, '1496932533', '1496932533');
INSERT INTO `de_auth_item` VALUES ('/user/*', '2', null, null, null, '1495806206', '1495806206');
INSERT INTO `de_auth_item` VALUES ('/user/create', '2', null, null, null, '1495806206', '1495806206');
INSERT INTO `de_auth_item` VALUES ('/user/delete', '2', null, null, null, '1497956689', '1497956689');
INSERT INTO `de_auth_item` VALUES ('/user/index', '2', null, null, null, '1495806206', '1495806206');
INSERT INTO `de_auth_item` VALUES ('/user/profile', '2', null, null, null, '1497956689', '1497956689');
INSERT INTO `de_auth_item` VALUES ('/user/update', '2', null, null, null, '1497956689', '1497956689');
INSERT INTO `de_auth_item` VALUES ('/user/view', '2', null, null, null, '1497956689', '1497956689');
INSERT INTO `de_auth_item` VALUES ('admin', '1', null, null, null, '1492681041', '1492681041');
INSERT INTO `de_auth_item` VALUES ('author', '1', null, null, null, '1492681041', '1492681041');
INSERT INTO `de_auth_item` VALUES ('Category Del', '2', null, null, null, '1497957501', '1497957501');
INSERT INTO `de_auth_item` VALUES ('Category Edit', '2', null, null, null, '1497957481', '1497957481');
INSERT INTO `de_auth_item` VALUES ('Category View', '2', null, null, null, '1495634609', '1497957365');
INSERT INTO `de_auth_item` VALUES ('Content Del', '2', null, null, null, '1496133348', '1496133348');
INSERT INTO `de_auth_item` VALUES ('Content Edit', '2', null, null, null, '1496133289', '1497957324');
INSERT INTO `de_auth_item` VALUES ('Content View', '2', null, null, null, '1495975814', '1497957087');
INSERT INTO `de_auth_item` VALUES ('Debug', '2', null, null, null, '1495634509', '1495634509');
INSERT INTO `de_auth_item` VALUES ('Gii', '2', null, null, null, '1495634530', '1495634530');
INSERT INTO `de_auth_item` VALUES ('guest', '1', null, null, null, '1497956991', '1497956991');
INSERT INTO `de_auth_item` VALUES ('Index', '2', null, null, null, '1495634396', '1495634396');
INSERT INTO `de_auth_item` VALUES ('Plugin', '2', null, null, null, '1495975936', '1495975936');
INSERT INTO `de_auth_item` VALUES ('Rbac', '2', null, null, null, '1495634492', '1495634492');
INSERT INTO `de_auth_item` VALUES ('Setting', '2', null, null, null, '1495634626', '1495634626');
INSERT INTO `de_auth_item` VALUES ('Upload Action', '2', null, null, null, '1496478801', '1497957606');
INSERT INTO `de_auth_item` VALUES ('Upload View', '2', null, null, null, '1497957618', '1497957618');
INSERT INTO `de_auth_item` VALUES ('User View', '2', null, null, null, '1495634668', '1497957407');

-- ----------------------------
-- Table structure for de_auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `de_auth_item_child`;
CREATE TABLE `de_auth_item_child` (
  `parent` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `de_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `de_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `de_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `de_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_auth_item_child
-- ----------------------------
INSERT INTO `de_auth_item_child` VALUES ('admin', '/*');
INSERT INTO `de_auth_item_child` VALUES ('Rbac', '/admin/*');
INSERT INTO `de_auth_item_child` VALUES ('Content View', '/article/index');
INSERT INTO `de_auth_item_child` VALUES ('Category Edit', '/category/create');
INSERT INTO `de_auth_item_child` VALUES ('Category Del', '/category/delete');
INSERT INTO `de_auth_item_child` VALUES ('Category Edit', '/category/update');
INSERT INTO `de_auth_item_child` VALUES ('Content Edit', '/content/create');
INSERT INTO `de_auth_item_child` VALUES ('Content Del', '/content/delete');
INSERT INTO `de_auth_item_child` VALUES ('Category View', '/content/index');
INSERT INTO `de_auth_item_child` VALUES ('Content View', '/content/index');
INSERT INTO `de_auth_item_child` VALUES ('Category View', '/content/search');
INSERT INTO `de_auth_item_child` VALUES ('Content Edit', '/content/update');
INSERT INTO `de_auth_item_child` VALUES ('Category View', '/content/view');
INSERT INTO `de_auth_item_child` VALUES ('Content View', '/content/view');
INSERT INTO `de_auth_item_child` VALUES ('Debug', '/debug/*');
INSERT INTO `de_auth_item_child` VALUES ('Gii', '/gii/*');
INSERT INTO `de_auth_item_child` VALUES ('Plugin', '/plugin/index');
INSERT INTO `de_auth_item_child` VALUES ('Setting', '/setting/*');
INSERT INTO `de_auth_item_child` VALUES ('Index', '/site/*');
INSERT INTO `de_auth_item_child` VALUES ('Upload View', '/upload/content');
INSERT INTO `de_auth_item_child` VALUES ('Upload Action', '/upload/del');
INSERT INTO `de_auth_item_child` VALUES ('Upload Action', '/upload/file');
INSERT INTO `de_auth_item_child` VALUES ('User View', '/user/index');
INSERT INTO `de_auth_item_child` VALUES ('author', '/user/profile');
INSERT INTO `de_auth_item_child` VALUES ('guest', '/user/profile');
INSERT INTO `de_auth_item_child` VALUES ('User View', '/user/view');
INSERT INTO `de_auth_item_child` VALUES ('admin', 'author');
INSERT INTO `de_auth_item_child` VALUES ('author', 'Category View');
INSERT INTO `de_auth_item_child` VALUES ('author', 'Content Edit');
INSERT INTO `de_auth_item_child` VALUES ('author', 'Content View');
INSERT INTO `de_auth_item_child` VALUES ('author', 'Index');
INSERT INTO `de_auth_item_child` VALUES ('guest', 'Index');
INSERT INTO `de_auth_item_child` VALUES ('author', 'Upload Action');
INSERT INTO `de_auth_item_child` VALUES ('author', 'Upload View');

-- ----------------------------
-- Table structure for de_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `de_auth_rule`;
CREATE TABLE `de_auth_rule` (
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for de_block
-- ----------------------------
DROP TABLE IF EXISTS `de_block`;
CREATE TABLE `de_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kind_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sorting` tinyint(2) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_block
-- ----------------------------
INSERT INTO `de_block` VALUES ('26', '1', '1', '14', '习近平:请乡亲们同党中央一起 3撸起袖子干2', '', 'http://127.0.0.1/my/Deruv/deruv/app_frontend/web/?r=content%2Fview&id=14', '习近平总书记到山西考察调研。从北京直飞吕梁，随后驱车1个半小时来到兴县，参观晋绥边区革命纪念馆，向革命烈士敬献花篮。习近平说，革命战争年代，吕梁儿女用鲜血和生命铸就了伟大的吕梁精神。我们要把这种精神用在当今时代，继续为老百姓过上幸福生活、为中华民族伟大复兴而奋斗', '0', '1498227177');
INSERT INTO `de_block` VALUES ('27', '1', '2', '0', '总理为何说分享经济与商业养老保险二者挂钩?', '', 'http://news.163.com/17/0624/07/CNM8KTI3000189FH.html', '', '0', '1498268827');
INSERT INTO `de_block` VALUES ('28', '1', '2', '0', '\"烦民\"证明有望终结 ', '', 'http://news.163.com/17/0617/18/CN5FC9H700018AOR.html', '', '0', '1501391585');
INSERT INTO `de_block` VALUES ('29', '1', '2', '0', '安倍亲信曝丑闻:议员殴打秘书退党', '', 'http://news.163.com/17/0624/05/CNM11V0Q0001899N.html', '', '0', '1498268716');
INSERT INTO `de_block` VALUES ('30', '1', '2', '0', '朝鲜回应美大学生死亡:与朝无关', '', 'http://news.163.com/17/0624/00/CNLI9VNO0001899N.html', '', '0', '1498268729');
INSERT INTO `de_block` VALUES ('31', '1', '2', '0', '吴敦义曝与宋楚瑜谈话：我们二人联手天下无敌', '', 'http://news.163.com/17/0623/23/CNLEM7TQ0001899N.html', '', '0', '1498268741');
INSERT INTO `de_block` VALUES ('33', '1', '5', '0', '后厂村码农的套路，是我走过最黑的路2', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_24/977578d9fffb5781777337848883505e.jpg', 'http://caozhi.news.163.com/17/0623/20/CNL4RR0N000181TI.html', '', '0', '1498275279');
INSERT INTO `de_block` VALUES ('34', '1', '5', '0', '“你有出息了，还怕找不到对象？”', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_24/bdbc8c77114568e7225b54f16942b1d3.jpg', 'http://caozhi.news.163.com/17/0623/10/CNK1MIS7000181TI.html', '', '0', '1498269754');
INSERT INTO `de_block` VALUES ('35', '1', '7', '0', 'test', '', 'test', '', '0', '1498303625');

-- ----------------------------
-- Table structure for de_block_kind
-- ----------------------------
DROP TABLE IF EXISTS `de_block_kind`;
CREATE TABLE `de_block_kind` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `sorting` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_block_kind
-- ----------------------------
INSERT INTO `de_block_kind` VALUES ('1', 'Home Headline', 'home_headline', '10');
INSERT INTO `de_block_kind` VALUES ('2', 'Home News', 'home_news', '9');
INSERT INTO `de_block_kind` VALUES ('5', 'Home Slideshow', 'home_slideshow', '8');
INSERT INTO `de_block_kind` VALUES ('6', 'Ranking Recommend', 'ranking_recommend', '0');
INSERT INTO `de_block_kind` VALUES ('7', 'Nav', 'nav', '11');

-- ----------------------------
-- Table structure for de_category
-- ----------------------------
DROP TABLE IF EXISTS `de_category`;
CREATE TABLE `de_category` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL DEFAULT '0',
  `level` tinyint(2) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `gourl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tpl_list` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tpl_show` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sorting` tinyint(2) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_category
-- ----------------------------
INSERT INTO `de_category` VALUES ('1', '0', '0', '测试1', 'test1', '', '', '', '0', '1');
INSERT INTO `de_category` VALUES ('3', '1', '1', '测试2', 'test2', '', '', '', '0', '1');
INSERT INTO `de_category` VALUES ('4', '0', '0', '新闻', 'news', '', '', '', '9', '1');

-- ----------------------------
-- Table structure for de_comment
-- ----------------------------
DROP TABLE IF EXISTS `de_comment`;
CREATE TABLE `de_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_at` (`content_id`,`created_at`),
  KEY `user_id` (`user_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_comment
-- ----------------------------
INSERT INTO `de_comment` VALUES ('1', '16', '1', 'admin', '', 'fdsafdas', '127.0.0.1', '0', '1498916864', '1499002541');
INSERT INTO `de_comment` VALUES ('2', '16', '1', 'admin', '', '分我去附近的撒了', '127.0.0.1', '1', '1498916981', '1498916981');
INSERT INTO `de_comment` VALUES ('6', '18', '1', 'admin', '', 'fdsafdsa', '127.0.0.1', '1', '1498967541', '1498967541');
INSERT INTO `de_comment` VALUES ('7', '18', '1', 'admin', '', 'fdsafdsa32323232', '127.0.0.1', '1', '1498967549', '1498967549');
INSERT INTO `de_comment` VALUES ('8', '16', '1', 'admin', '', 'fdsafdsa', '127.0.0.1', '1', '1498967710', '1498967710');
INSERT INTO `de_comment` VALUES ('11', '16', '1', 'admin', '', 'fdsafdas32324444', '127.0.0.1', '1', '1498969678', '1500206016');
INSERT INTO `de_comment` VALUES ('12', '16', '1', 'admin', '', 'fdasfdas', '127.0.0.1', '2', '1498969946', '1498969946');
INSERT INTO `de_comment` VALUES ('13', '16', '1', 'admin', '', '3323223', '127.0.0.1', '2', '1498969997', '1498969997');
INSERT INTO `de_comment` VALUES ('14', '16', '1', 'admin', '', '3323223', '127.0.0.1', '2', '1498970040', '1498970040');
INSERT INTO `de_comment` VALUES ('15', '16', '1', 'admin', '', '33232233', '127.0.0.1', '2', '1498970103', '1498970103');
INSERT INTO `de_comment` VALUES ('16', '16', '1', 'admin', '', '333333333355555888', '127.0.0.1', '2', '1498970112', '1500192135');
INSERT INTO `de_comment` VALUES ('17', '16', '1', 'admin', '', 's', '127.0.0.1', '2', '1498971131', '1498971131');
INSERT INTO `de_comment` VALUES ('18', '16', '1', 'admin', '', 'dfsa', '127.0.0.1', '2', '1498975897', '1498975897');
INSERT INTO `de_comment` VALUES ('19', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'ss', '127.0.0.1', '2', '1498976143', '1498976143');
INSERT INTO `de_comment` VALUES ('21', '14', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'fdsafdsa', '127.0.0.1', '1', '1498976740', '1498976740');
INSERT INTO `de_comment` VALUES ('25', '16', '2', 'xxx', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '3', '127.0.0.1', '1', '1498984219', '1498984219');
INSERT INTO `de_comment` VALUES ('32', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'zzzzzzzzzzzzzz333', '127.0.0.1', '2', '1498985948', '1499002647');
INSERT INTO `de_comment` VALUES ('36', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '3333333333', '127.0.0.1', '1', '1500191215', '1500191215');
INSERT INTO `de_comment` VALUES ('38', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'f3333333333333xx3打是大大撒<br />\r\n倒萨倒222<br />\r\n萨<br />\r\n大师 大师', '127.0.0.1', '1', '1500192401', '1500192423');
INSERT INTO `de_comment` VALUES ('39', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'dsdsa 1 <br />\r\n2fff<br />\r\n3vvv<br />\r\n111123', '127.0.0.1', '1', '1500192644', '1500193750');
INSERT INTO `de_comment` VALUES ('40', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'fdsafds', '127.0.0.1', '1', '1500206057', '1500206057');
INSERT INTO `de_comment` VALUES ('41', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '333333333333', '127.0.0.1', '1', '1500206067', '1500206067');
INSERT INTO `de_comment` VALUES ('42', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'xxxxxxxxx', '127.0.0.1', '1', '1500206071', '1500206071');
INSERT INTO `de_comment` VALUES ('43', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'vvvvvvvvvvvvvv', '127.0.0.1', '1', '1500206076', '1500206076');
INSERT INTO `de_comment` VALUES ('44', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '222222222222222222222', '127.0.0.1', '1', '1500206080', '1500206080');
INSERT INTO `de_comment` VALUES ('45', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '11111111111111', '127.0.0.1', '1', '1500206085', '1500206085');
INSERT INTO `de_comment` VALUES ('46', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '333333333333', '127.0.0.1', '1', '1500206088', '1500206088');
INSERT INTO `de_comment` VALUES ('47', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'zzzzzzzzzzzzzzzz', '127.0.0.1', '1', '1500206090', '1500206090');
INSERT INTO `de_comment` VALUES ('48', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'aaaaaaaaaaaaaaa', '127.0.0.1', '1', '1500206093', '1500206093');
INSERT INTO `de_comment` VALUES ('49', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '33333333333333', '127.0.0.1', '1', '1500206097', '1500206097');
INSERT INTO `de_comment` VALUES ('50', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '123', '127.0.0.1', '1', '1500206100', '1500206100');
INSERT INTO `de_comment` VALUES ('51', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '我的家乡，哈哈哈', '127.0.0.1', '1', '1500206147', '1500207165');
INSERT INTO `de_comment` VALUES ('53', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'zzzzzzzzzzzz', '127.0.0.1', '1', '1500206491', '1500206491');
INSERT INTO `de_comment` VALUES ('59', '16', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'vvvvvvvvvvvvvvvvvv', '127.0.0.1', '1', '1500717385', '1500717385');
INSERT INTO `de_comment` VALUES ('60', '19', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'fdsa', '127.0.0.1', '1', '1500717476', '1500717476');
INSERT INTO `de_comment` VALUES ('61', '19', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '所得税法发的', '127.0.0.1', '1', '1500797221', '1500797221');
INSERT INTO `de_comment` VALUES ('62', '18', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'fdsa', '127.0.0.1', '1', '1500797378', '1500797378');
INSERT INTO `de_comment` VALUES ('63', '18', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', 'vvvvvvvvvvvvvvvv', '127.0.0.1', '0', '1500821331', '1501391384');

-- ----------------------------
-- Table structure for de_content
-- ----------------------------
DROP TABLE IF EXISTS `de_content`;
CREATE TABLE `de_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `pv` int(11) NOT NULL DEFAULT '0',
  `comment` int(11) NOT NULL DEFAULT '0',
  `iscomment` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_content
-- ----------------------------
INSERT INTO `de_content` VALUES ('14', '4', '1', 'admin', '', '习近平:请乡亲们同党中央一起 撸起袖子干', '习近平总书记到山西考察调研。从北京直飞吕梁，随后驱车1个半小时来到兴县，参观晋绥边区革命纪念馆，向革命烈士敬献花篮。习近平说，革命战争年代，吕梁儿女用鲜血和生命铸就了伟大的吕梁精神。我们要把这种精神用在当今时代，继续为老百姓过上幸福生活、为中华民族伟大复兴而奋斗', '25', '0', '1', '1', '1498130502', '1498130502');
INSERT INTO `de_content` VALUES ('16', '3', '1', 'admin', '', 'test', '', '153', '32', '1', '1', '1498393322', '1498393322');
INSERT INTO `de_content` VALUES ('17', '4', '1', 'admin', '', 'xxx', '', '80', '0', '0', '1', '1498480191', '1498480191');
INSERT INTO `de_content` VALUES ('18', '3', '1', 'admin', '', 'vvvvvvvvvvvvvvvvvvv5', '', '21', '2', '1', '1', '1498480211', '1500794285');
INSERT INTO `de_content` VALUES ('19', '4', '1', 'admin', '', 'testxxxx333', '', '47', '2', '1', '1', '1499437658', '1499437658');

-- ----------------------------
-- Table structure for de_content_article
-- ----------------------------
DROP TABLE IF EXISTS `de_content_article`;
CREATE TABLE `de_content_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `content_id` (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_content_article
-- ----------------------------
INSERT INTO `de_content_article` VALUES ('14', '14', '<p><strong>【习近平参观晋绥边区革命纪念馆：用战争年代的吕梁精神激励人民为民族复兴而奋斗】</strong>6月21日上午，习近平总书记到山西考察调研。从北京直飞吕梁，随后驱车1个半小时来到兴县，参观晋绥边区革命纪念馆，向革命烈士敬献花篮。习近平说，革命战争年代，吕梁儿女用鲜血和生命铸就了伟大的吕梁精神。我们要把这种精神用在当今时代，继续为老百姓过上幸福生活、为中华民族伟大复兴而奋斗。</p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/9e893a680c984f529248fe8bfc0ca6bb20170622141116.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/9985b857d4444a5f92b160674f50eeeb20170622141116.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /><img src=\"http://cms-bucket.nosdn.127.net/9e893a680c984f529248fe8bfc0ca6bb20170622141116.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/a608543a84cf4b328ce7e9214149616d20170622141117.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>\r\n<p><strong>【习近平：一定不能忘记为革命成功抛头颅、洒热血的前辈们】</strong>在晋绥军区司令部旧址，总书记同当年在晋绥边区参加对敌斗争的老战士们亲切交谈。习近平说，吕梁我是第一次来，我心里一直向往着晋绥根据地。今天，全党全国各族人民正在为实现“两个一百年”奋斗目标、实现中华民族伟大复兴而奋斗。我们一定不能忘记为革命成功抛头颅、洒热血的前辈们，不能忘记为抵抗日本军国主义侵略、为建立新中国、为社会主义革命和建设作出贡献的老同志们。</p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/277b7447b53a4d8da1c3e21a8247538220170622141117.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /><img src=\"http://cms-bucket.nosdn.127.net/b84d5e31175a4e0f86ba64927e83730c20170622141118.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>\r\n<p><strong>【习近平深入吕梁山区，调研深度贫困地区脱贫攻坚大计】</strong>深度贫困地区是脱贫攻坚的“重中之重，坚中之坚”。如何确保深度贫困地区同全国一道迈进小康社会，是习近平总书记心中深深的牵挂。6月21日下午，习近平来到山西省忻州市岢岚县赵家洼村看望贫困群众。这里地处吕梁山区，沟壑纵横、土地贫瘠，生存条件十分恶劣，属于典型的“一方水土养不好一方人”的地方。习近平沿着村里崎岖不平的土路一连走进三户村民家中，察看他们的生活环境，了解家庭致贫原因和稳定增收的可行性，同干部群众一起共商脱贫攻坚大计。总书记肯定了当地通过易地搬迁改善村民生活条件的思路，要求配套扶贫措施要跟上，使贫困群众不仅改善居住条件，还能稳定增收。</p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/87b68d0b29394ce0be3adbeb0fb3ef6d20170622141119.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /><img src=\"http://cms-bucket.nosdn.127.net/cfb9183022c7429ea56423be86dadf4120170622141120.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /><img src=\"http://cms-bucket.nosdn.127.net/423959dcd85b491494b612f642d02f2120170622141120.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /><img src=\"http://cms-bucket.nosdn.127.net/64d07f3956ea4f76a7970e1bd81e26a920170622141121.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/0ba4bd13d53643469269af68030c6b0d20170622141122.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/cf3ada1246574527869a413dd4e68e0320170622141123.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/d45711696b0242a3bc032c35824fb4ca20170622141124.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>\r\n<p><strong>【总书记深入田间、登上井台了解村民生产生活情况】</strong>习近平走进赵家洼村的一片农田，察看玉米和芸豆长势。村支书告诉总书记，因为干旱，庄稼植株矮小，产量很低，村民们靠天吃饭。总书记向村民了解了地膜的保墒作用。总书记来到村里唯一的一口饮水井旁，登上用石块垒起的井台，仔细察看井里蓄水的情况。</p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/3defa45ec5b34d74a6ca68c36a0aca9f20170622141125.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /><img src=\"http://cms-bucket.nosdn.127.net/86fd10016dfa41ee8d4606240c564df720170622141126.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>\r\n<p><strong>【习近平：要在农村基层锻炼干部、发现干部、培养干部】</strong>习近平看望了岢岚县人大派驻到赵家洼村的扶贫工作队队员，勉励他们深入农户、扶贫助困。习近平强调，近年来我们向基层派出第一书记、扶贫工作队，还建立了村官制度。这都是做好“三农”工作特别是脱贫攻坚工作的组织举措，也为干部锻炼成长搭建了平台。我们要从他们当中发现好同志、好干部，并着力加以培养。</p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/5cd46f83ea12433e9e18b3620ad9630420170622141126.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /><img src=\"http://cms-bucket.nosdn.127.net/5b3c55ea02584ff08fad6b8da2f94f1220170622141127.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>\r\n<p><strong>【习近平：请乡亲们同党中央一起，撸起袖子加油干！】</strong>从赵家洼村出来，习近平又来到一处已经建设好的易地扶贫搬迁集中安置点——宋家沟新村。这里与山沟沟里的旧村庄形成了鲜明对比。看着干净整洁的村容村貌和村民们家中良好的生活条件，总书记十分高兴。他对村民们说，人民群众对美好生活的向往就是我们的奋斗目标。现在党中央就是要带领大家一心一意脱贫致富，让人民生活越过越好。芝麻开花节节高。请乡亲们同党中央一起，撸起袖子加油干！</p>\r\n<p class=\"f_center\"><img src=\"http://cms-bucket.nosdn.127.net/8da453ea34be4051af55afacf1c9031020170622141128.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /><img src=\"http://cms-bucket.nosdn.127.net/2297e8a38f3c4d7486a3666feea20c4320170622141130.jpeg\" alt=\"习近平：请乡亲们同党中央一起 撸起袖子加油干\" /></p>', '1498130504', '1498130502');
INSERT INTO `de_content_article` VALUES ('16', '16', '<p>test</p>', '1498393323', '1498393323');
INSERT INTO `de_content_article` VALUES ('17', '17', '<p>xxxxxxx</p>', '1498480192', '1498480191');
INSERT INTO `de_content_article` VALUES ('18', '18', '<p>ssssssssssssssss5</p>', '1498480211', '1500794285');
INSERT INTO `de_content_article` VALUES ('19', '19', '<p>testxxxxxxxxxxxxxxxxxxxxxxxxxf</p>\r\n<p>ds</p>\r\n<p>a</p>\r\n<p>fd<img src=\"http://127.0.0.1/my/Deruv/deruv/app_frontend/web/bower/tinymce/plugins/emoji/img/a_11.png\" alt=\"a_11\" /></p>\r\n<p>sa</p>\r\n<p>fds</p>\r\n<p>a3333</p>', '1499437660', '1499437660');

-- ----------------------------
-- Table structure for de_files
-- ----------------------------
DROP TABLE IF EXISTS `de_files`;
CREATE TABLE `de_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'other',
  `size` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` mediumint(8) NOT NULL DEFAULT '0',
  `height` mediumint(8) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `content_id` int(11) NOT NULL DEFAULT '0',
  `plan` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 content 1avatar 2 block',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_files
-- ----------------------------
INSERT INTO `de_files` VALUES ('1', '001 _5_.jpg', 'jpg', 'image', '636620', '17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '1920', '1200', '1', '0', '1', '0', '1498140083');
INSERT INTO `de_files` VALUES ('2', '下载.jpg', 'jpg', 'image', '29582', '17_06_24/977578d9fffb5781777337848883505e.jpg', '600', '250', '1', '0', '2', '0', '1498268913');
INSERT INTO `de_files` VALUES ('3', '8d66d5bfeb7948a7a1425faa14bfe4c420170623103829.jpg', 'jpg', 'image', '14683', '17_06_24/bdbc8c77114568e7225b54f16942b1d3.jpg', '550', '344', '1', '0', '2', '0', '1498269751');

-- ----------------------------
-- Table structure for de_log_action
-- ----------------------------
DROP TABLE IF EXISTS `de_log_action`;
CREATE TABLE `de_log_action` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 warning 2 danger',
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=754 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_log_action
-- ----------------------------
INSERT INTO `de_log_action` VALUES ('170', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=content%2Fupdate&id=18', '更新了内容:vvvvvvvvvvvvvvvvvvv', 'update', '0', '1498908862');
INSERT INTO `de_log_action` VALUES ('171', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=content%2Fupdate&id=18', '更新了内容:vvvvvvvvvvvvvvvvvvv', 'update', '0', '1498908899');
INSERT INTO `de_log_action` VALUES ('172', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=content%2Fupdate&id=18', '更新了内容:vvvvvvvvvvvvvvvvvvv', 'update', '0', '1498908936');
INSERT INTO `de_log_action` VALUES ('173', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=content%2Fupdate&id=18', '更新了内容:vvvvvvvvvvvvvvvvvvv', 'update', '0', '1498908960');
INSERT INTO `de_log_action` VALUES ('174', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=content%2Fupdate&id=18', '更新了内容:vvvvvvvvvvvvvvvvvvv', 'update', '0', '1498909017');
INSERT INTO `de_log_action` VALUES ('175', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1498912212');
INSERT INTO `de_log_action` VALUES ('176', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1498912212');
INSERT INTO `de_log_action` VALUES ('177', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1498969935');
INSERT INTO `de_log_action` VALUES ('178', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1498969935');
INSERT INTO `de_log_action` VALUES ('179', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:pageSize', 'update', '0', '1498975923');
INSERT INTO `de_log_action` VALUES ('180', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webDescription', 'update', '0', '1498975923');
INSERT INTO `de_log_action` VALUES ('181', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webKeywords', 'update', '0', '1498975923');
INSERT INTO `de_log_action` VALUES ('182', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webName', 'update', '0', '1498975923');
INSERT INTO `de_log_action` VALUES ('183', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webUrl', 'update', '0', '1498975923');
INSERT INTO `de_log_action` VALUES ('184', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:pageSize', 'update', '0', '1498975932');
INSERT INTO `de_log_action` VALUES ('185', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webDescription', 'update', '0', '1498975932');
INSERT INTO `de_log_action` VALUES ('186', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webKeywords', 'update', '0', '1498975932');
INSERT INTO `de_log_action` VALUES ('187', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webName', 'update', '0', '1498975932');
INSERT INTO `de_log_action` VALUES ('188', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webUrl', 'update', '0', '1498975932');
INSERT INTO `de_log_action` VALUES ('189', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:pageSize', 'update', '0', '1498975942');
INSERT INTO `de_log_action` VALUES ('190', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webDescription', 'update', '0', '1498975942');
INSERT INTO `de_log_action` VALUES ('191', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webKeywords', 'update', '0', '1498975942');
INSERT INTO `de_log_action` VALUES ('192', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webName', 'update', '0', '1498975942');
INSERT INTO `de_log_action` VALUES ('193', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webUrl', 'update', '0', '1498975942');
INSERT INTO `de_log_action` VALUES ('194', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1498976164');
INSERT INTO `de_log_action` VALUES ('195', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1498976164');
INSERT INTO `de_log_action` VALUES ('196', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1498984345');
INSERT INTO `de_log_action` VALUES ('197', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:closeCommen', 'update', '0', '1498984345');
INSERT INTO `de_log_action` VALUES ('198', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1498984345');
INSERT INTO `de_log_action` VALUES ('199', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1498984359');
INSERT INTO `de_log_action` VALUES ('200', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:closeComment', 'update', '0', '1498984359');
INSERT INTO `de_log_action` VALUES ('201', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1498984359');
INSERT INTO `de_log_action` VALUES ('202', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1498984525');
INSERT INTO `de_log_action` VALUES ('203', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:closeComment', 'update', '0', '1498984526');
INSERT INTO `de_log_action` VALUES ('204', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1498984526');
INSERT INTO `de_log_action` VALUES ('205', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1498985658');
INSERT INTO `de_log_action` VALUES ('206', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:closeComment', 'update', '0', '1498985658');
INSERT INTO `de_log_action` VALUES ('207', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1498985658');
INSERT INTO `de_log_action` VALUES ('208', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1498992692');
INSERT INTO `de_log_action` VALUES ('209', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:closeComment', 'update', '0', '1498992692');
INSERT INTO `de_log_action` VALUES ('210', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1498992692');
INSERT INTO `de_log_action` VALUES ('211', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:userCommentMax', 'update', '0', '1498992692');
INSERT INTO `de_log_action` VALUES ('212', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=content%2Fupdate&id=17', '更新了内容:xxx', 'update', '0', '1498998193');
INSERT INTO `de_log_action` VALUES ('213', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1499437520');
INSERT INTO `de_log_action` VALUES ('214', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:closeComment', 'update', '0', '1499437520');
INSERT INTO `de_log_action` VALUES ('215', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1499437520');
INSERT INTO `de_log_action` VALUES ('216', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:userCommentMax', 'update', '0', '1499437520');
INSERT INTO `de_log_action` VALUES ('217', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:userPublishedStatus', 'update', '0', '1499437520');
INSERT INTO `de_log_action` VALUES ('218', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fcontribute', '创建了内容:testxxxx333', 'create', '0', '1499437658');
INSERT INTO `de_log_action` VALUES ('219', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1499438023');
INSERT INTO `de_log_action` VALUES ('220', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:closeComment', 'update', '0', '1499438023');
INSERT INTO `de_log_action` VALUES ('221', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1499438023');
INSERT INTO `de_log_action` VALUES ('222', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:userCommentMax', 'update', '0', '1499438023');
INSERT INTO `de_log_action` VALUES ('223', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:userPublishedStatus', 'update', '0', '1499438023');
INSERT INTO `de_log_action` VALUES ('224', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fcontribute', '创建了内容:xxxxxxxxxxxxx3', 'create', '0', '1499438036');
INSERT INTO `de_log_action` VALUES ('225', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1499438190');
INSERT INTO `de_log_action` VALUES ('226', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:closeComment', 'update', '0', '1499438190');
INSERT INTO `de_log_action` VALUES ('227', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1499438190');
INSERT INTO `de_log_action` VALUES ('228', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:userCommentMax', 'update', '0', '1499438190');
INSERT INTO `de_log_action` VALUES ('229', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:userPublishedAudit', 'update', '0', '1499438190');
INSERT INTO `de_log_action` VALUES ('230', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fcontribute', '创建了内容:sdafdsa333', 'create', '0', '1499438224');
INSERT INTO `de_log_action` VALUES ('231', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=block-kind%2Fupdate&id=7', '更新了类别:Nav', 'update', '0', '1499954636');
INSERT INTO `de_log_action` VALUES ('232', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=category%2Fupdate&id=1', '更新了分类:测试1', 'update', '0', '1499956636');
INSERT INTO `de_log_action` VALUES ('233', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:auditComment', 'update', '0', '1500128947');
INSERT INTO `de_log_action` VALUES ('234', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:closeComment', 'update', '0', '1500128947');
INSERT INTO `de_log_action` VALUES ('235', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:defaultWidth', 'update', '0', '1500128947');
INSERT INTO `de_log_action` VALUES ('236', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:userCommentMax', 'update', '0', '1500128947');
INSERT INTO `de_log_action` VALUES ('237', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:userPublishedAudit', 'update', '0', '1500128947');
INSERT INTO `de_log_action` VALUES ('238', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:pageSize', 'update', '0', '1500177810');
INSERT INTO `de_log_action` VALUES ('239', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webDescription', 'update', '0', '1500177810');
INSERT INTO `de_log_action` VALUES ('240', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webKeywords', 'update', '0', '1500177810');
INSERT INTO `de_log_action` VALUES ('241', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webName', 'update', '0', '1500177810');
INSERT INTO `de_log_action` VALUES ('242', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webUrl', 'update', '0', '1500177810');
INSERT INTO `de_log_action` VALUES ('243', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:debug', 'update', '0', '1500210909');
INSERT INTO `de_log_action` VALUES ('244', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500210909');
INSERT INTO `de_log_action` VALUES ('245', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500210909');
INSERT INTO `de_log_action` VALUES ('246', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500210909');
INSERT INTO `de_log_action` VALUES ('247', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500210909');
INSERT INTO `de_log_action` VALUES ('248', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500210909');
INSERT INTO `de_log_action` VALUES ('249', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500211149');
INSERT INTO `de_log_action` VALUES ('250', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:pageSize', 'update', '0', '1500211149');
INSERT INTO `de_log_action` VALUES ('251', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webDescription', 'update', '0', '1500211149');
INSERT INTO `de_log_action` VALUES ('252', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webKeywords', 'update', '0', '1500211149');
INSERT INTO `de_log_action` VALUES ('253', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webName', 'update', '0', '1500211149');
INSERT INTO `de_log_action` VALUES ('254', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webUrl', 'update', '0', '1500211149');
INSERT INTO `de_log_action` VALUES ('255', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500211656');
INSERT INTO `de_log_action` VALUES ('256', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:pageSize', 'update', '0', '1500211656');
INSERT INTO `de_log_action` VALUES ('257', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webDescription', 'update', '0', '1500211656');
INSERT INTO `de_log_action` VALUES ('258', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webKeywords', 'update', '0', '1500211656');
INSERT INTO `de_log_action` VALUES ('259', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webName', 'update', '0', '1500211656');
INSERT INTO `de_log_action` VALUES ('260', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webUrl', 'update', '0', '1500211656');
INSERT INTO `de_log_action` VALUES ('261', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:debug', 'update', '0', '1500213053');
INSERT INTO `de_log_action` VALUES ('262', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500213053');
INSERT INTO `de_log_action` VALUES ('263', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500213053');
INSERT INTO `de_log_action` VALUES ('264', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500213053');
INSERT INTO `de_log_action` VALUES ('265', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500213053');
INSERT INTO `de_log_action` VALUES ('266', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500213053');
INSERT INTO `de_log_action` VALUES ('267', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500213053');
INSERT INTO `de_log_action` VALUES ('268', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:debug', 'update', '0', '1500213079');
INSERT INTO `de_log_action` VALUES ('269', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500213079');
INSERT INTO `de_log_action` VALUES ('270', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500213079');
INSERT INTO `de_log_action` VALUES ('271', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500213079');
INSERT INTO `de_log_action` VALUES ('272', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500213079');
INSERT INTO `de_log_action` VALUES ('273', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500213079');
INSERT INTO `de_log_action` VALUES ('274', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500213079');
INSERT INTO `de_log_action` VALUES ('275', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500213202');
INSERT INTO `de_log_action` VALUES ('276', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendDebug', 'update', '0', '1500213202');
INSERT INTO `de_log_action` VALUES ('277', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500213202');
INSERT INTO `de_log_action` VALUES ('278', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500213202');
INSERT INTO `de_log_action` VALUES ('279', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500213202');
INSERT INTO `de_log_action` VALUES ('280', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500213202');
INSERT INTO `de_log_action` VALUES ('281', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500213202');
INSERT INTO `de_log_action` VALUES ('282', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500294494');
INSERT INTO `de_log_action` VALUES ('283', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500294494');
INSERT INTO `de_log_action` VALUES ('284', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500294494');
INSERT INTO `de_log_action` VALUES ('285', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500294494');
INSERT INTO `de_log_action` VALUES ('286', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500294494');
INSERT INTO `de_log_action` VALUES ('287', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500294494');
INSERT INTO `de_log_action` VALUES ('288', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500294515');
INSERT INTO `de_log_action` VALUES ('289', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500294515');
INSERT INTO `de_log_action` VALUES ('290', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500294515');
INSERT INTO `de_log_action` VALUES ('291', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500294515');
INSERT INTO `de_log_action` VALUES ('292', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500294515');
INSERT INTO `de_log_action` VALUES ('293', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500294515');
INSERT INTO `de_log_action` VALUES ('294', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500294825');
INSERT INTO `de_log_action` VALUES ('295', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500294825');
INSERT INTO `de_log_action` VALUES ('296', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500294825');
INSERT INTO `de_log_action` VALUES ('297', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500294825');
INSERT INTO `de_log_action` VALUES ('298', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500294825');
INSERT INTO `de_log_action` VALUES ('299', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500294825');
INSERT INTO `de_log_action` VALUES ('300', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500296111');
INSERT INTO `de_log_action` VALUES ('301', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500296111');
INSERT INTO `de_log_action` VALUES ('302', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500296111');
INSERT INTO `de_log_action` VALUES ('303', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500296111');
INSERT INTO `de_log_action` VALUES ('304', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500296111');
INSERT INTO `de_log_action` VALUES ('305', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500296111');
INSERT INTO `de_log_action` VALUES ('306', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500296111');
INSERT INTO `de_log_action` VALUES ('307', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500298402');
INSERT INTO `de_log_action` VALUES ('308', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500298402');
INSERT INTO `de_log_action` VALUES ('309', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500298402');
INSERT INTO `de_log_action` VALUES ('310', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500298402');
INSERT INTO `de_log_action` VALUES ('311', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500298402');
INSERT INTO `de_log_action` VALUES ('312', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500298402');
INSERT INTO `de_log_action` VALUES ('313', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500298402');
INSERT INTO `de_log_action` VALUES ('314', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=user%2Fupdate&id=1', '更新了用户:admin', 'update', '0', '1500301256');
INSERT INTO `de_log_action` VALUES ('315', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=block-kind%2Fupdate&id=7', '更新了区块类别:Nav', 'update', '0', '1500301264');
INSERT INTO `de_log_action` VALUES ('316', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500384620');
INSERT INTO `de_log_action` VALUES ('317', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500384620');
INSERT INTO `de_log_action` VALUES ('318', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500384620');
INSERT INTO `de_log_action` VALUES ('319', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500384620');
INSERT INTO `de_log_action` VALUES ('320', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500384620');
INSERT INTO `de_log_action` VALUES ('321', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500384620');
INSERT INTO `de_log_action` VALUES ('322', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500384620');
INSERT INTO `de_log_action` VALUES ('323', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500386130');
INSERT INTO `de_log_action` VALUES ('324', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500386130');
INSERT INTO `de_log_action` VALUES ('325', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500386130');
INSERT INTO `de_log_action` VALUES ('326', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500386130');
INSERT INTO `de_log_action` VALUES ('327', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500386130');
INSERT INTO `de_log_action` VALUES ('328', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500386130');
INSERT INTO `de_log_action` VALUES ('329', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500386130');
INSERT INTO `de_log_action` VALUES ('330', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500386158');
INSERT INTO `de_log_action` VALUES ('331', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500386158');
INSERT INTO `de_log_action` VALUES ('332', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500386158');
INSERT INTO `de_log_action` VALUES ('333', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500386158');
INSERT INTO `de_log_action` VALUES ('334', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500386158');
INSERT INTO `de_log_action` VALUES ('335', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500386158');
INSERT INTO `de_log_action` VALUES ('336', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500386158');
INSERT INTO `de_log_action` VALUES ('337', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500387186');
INSERT INTO `de_log_action` VALUES ('338', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500387186');
INSERT INTO `de_log_action` VALUES ('339', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500387186');
INSERT INTO `de_log_action` VALUES ('340', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500387186');
INSERT INTO `de_log_action` VALUES ('341', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500387186');
INSERT INTO `de_log_action` VALUES ('342', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500387186');
INSERT INTO `de_log_action` VALUES ('343', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500387186');
INSERT INTO `de_log_action` VALUES ('344', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500387411');
INSERT INTO `de_log_action` VALUES ('345', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500387411');
INSERT INTO `de_log_action` VALUES ('346', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500387411');
INSERT INTO `de_log_action` VALUES ('347', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500387411');
INSERT INTO `de_log_action` VALUES ('348', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500387411');
INSERT INTO `de_log_action` VALUES ('349', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500387411');
INSERT INTO `de_log_action` VALUES ('350', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500387411');
INSERT INTO `de_log_action` VALUES ('351', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500387415');
INSERT INTO `de_log_action` VALUES ('352', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500387415');
INSERT INTO `de_log_action` VALUES ('353', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500387415');
INSERT INTO `de_log_action` VALUES ('354', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500387415');
INSERT INTO `de_log_action` VALUES ('355', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500387415');
INSERT INTO `de_log_action` VALUES ('356', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500387415');
INSERT INTO `de_log_action` VALUES ('357', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500387415');
INSERT INTO `de_log_action` VALUES ('358', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500474044');
INSERT INTO `de_log_action` VALUES ('359', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500474044');
INSERT INTO `de_log_action` VALUES ('360', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500474044');
INSERT INTO `de_log_action` VALUES ('361', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500474045');
INSERT INTO `de_log_action` VALUES ('362', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500474045');
INSERT INTO `de_log_action` VALUES ('363', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500474045');
INSERT INTO `de_log_action` VALUES ('364', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500474045');
INSERT INTO `de_log_action` VALUES ('365', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500474058');
INSERT INTO `de_log_action` VALUES ('366', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500474058');
INSERT INTO `de_log_action` VALUES ('367', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500474058');
INSERT INTO `de_log_action` VALUES ('368', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500474058');
INSERT INTO `de_log_action` VALUES ('369', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500474058');
INSERT INTO `de_log_action` VALUES ('370', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500474058');
INSERT INTO `de_log_action` VALUES ('371', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500474058');
INSERT INTO `de_log_action` VALUES ('372', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500474087');
INSERT INTO `de_log_action` VALUES ('373', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500474087');
INSERT INTO `de_log_action` VALUES ('374', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500474087');
INSERT INTO `de_log_action` VALUES ('375', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500474087');
INSERT INTO `de_log_action` VALUES ('376', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500474087');
INSERT INTO `de_log_action` VALUES ('377', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500474087');
INSERT INTO `de_log_action` VALUES ('378', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500474087');
INSERT INTO `de_log_action` VALUES ('379', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500474245');
INSERT INTO `de_log_action` VALUES ('380', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500474245');
INSERT INTO `de_log_action` VALUES ('381', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500474245');
INSERT INTO `de_log_action` VALUES ('382', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500474245');
INSERT INTO `de_log_action` VALUES ('383', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500474245');
INSERT INTO `de_log_action` VALUES ('384', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500474245');
INSERT INTO `de_log_action` VALUES ('385', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500474245');
INSERT INTO `de_log_action` VALUES ('386', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500642080');
INSERT INTO `de_log_action` VALUES ('387', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500642080');
INSERT INTO `de_log_action` VALUES ('388', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500642081');
INSERT INTO `de_log_action` VALUES ('389', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500642081');
INSERT INTO `de_log_action` VALUES ('390', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500642081');
INSERT INTO `de_log_action` VALUES ('391', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500642081');
INSERT INTO `de_log_action` VALUES ('392', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500642081');
INSERT INTO `de_log_action` VALUES ('393', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500642119');
INSERT INTO `de_log_action` VALUES ('394', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500642119');
INSERT INTO `de_log_action` VALUES ('395', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500642119');
INSERT INTO `de_log_action` VALUES ('396', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500642119');
INSERT INTO `de_log_action` VALUES ('397', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500642119');
INSERT INTO `de_log_action` VALUES ('398', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500642119');
INSERT INTO `de_log_action` VALUES ('400', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=block%2Fdelete', '删除了区块:王健林投10亿护盘', 'delete', '1', '1500642353');
INSERT INTO `de_log_action` VALUES ('401', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500644569');
INSERT INTO `de_log_action` VALUES ('402', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500644569');
INSERT INTO `de_log_action` VALUES ('403', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500644569');
INSERT INTO `de_log_action` VALUES ('404', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500644569');
INSERT INTO `de_log_action` VALUES ('405', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500644569');
INSERT INTO `de_log_action` VALUES ('406', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500644569');
INSERT INTO `de_log_action` VALUES ('407', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500644569');
INSERT INTO `de_log_action` VALUES ('408', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500644602');
INSERT INTO `de_log_action` VALUES ('409', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500644602');
INSERT INTO `de_log_action` VALUES ('410', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500644602');
INSERT INTO `de_log_action` VALUES ('411', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500644602');
INSERT INTO `de_log_action` VALUES ('412', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500644602');
INSERT INTO `de_log_action` VALUES ('413', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500644602');
INSERT INTO `de_log_action` VALUES ('414', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500644602');
INSERT INTO `de_log_action` VALUES ('415', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=user%2Fprofile', '更新了用户:admin', 'update', '0', '1500646740');
INSERT INTO `de_log_action` VALUES ('416', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500646844');
INSERT INTO `de_log_action` VALUES ('417', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500646844');
INSERT INTO `de_log_action` VALUES ('418', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500646844');
INSERT INTO `de_log_action` VALUES ('419', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500646844');
INSERT INTO `de_log_action` VALUES ('420', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500646844');
INSERT INTO `de_log_action` VALUES ('421', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500646844');
INSERT INTO `de_log_action` VALUES ('422', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500646844');
INSERT INTO `de_log_action` VALUES ('423', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500686400');
INSERT INTO `de_log_action` VALUES ('424', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500686400');
INSERT INTO `de_log_action` VALUES ('425', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500686400');
INSERT INTO `de_log_action` VALUES ('426', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500686400');
INSERT INTO `de_log_action` VALUES ('427', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500686400');
INSERT INTO `de_log_action` VALUES ('428', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500686400');
INSERT INTO `de_log_action` VALUES ('429', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500686400');
INSERT INTO `de_log_action` VALUES ('430', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500733380');
INSERT INTO `de_log_action` VALUES ('431', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500733380');
INSERT INTO `de_log_action` VALUES ('432', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500733380');
INSERT INTO `de_log_action` VALUES ('433', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500733380');
INSERT INTO `de_log_action` VALUES ('434', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500733380');
INSERT INTO `de_log_action` VALUES ('435', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500733380');
INSERT INTO `de_log_action` VALUES ('436', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500733380');
INSERT INTO `de_log_action` VALUES ('437', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500733426');
INSERT INTO `de_log_action` VALUES ('438', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500733426');
INSERT INTO `de_log_action` VALUES ('439', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500733426');
INSERT INTO `de_log_action` VALUES ('440', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500733426');
INSERT INTO `de_log_action` VALUES ('441', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500733426');
INSERT INTO `de_log_action` VALUES ('442', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500733426');
INSERT INTO `de_log_action` VALUES ('443', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500733426');
INSERT INTO `de_log_action` VALUES ('444', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500733869');
INSERT INTO `de_log_action` VALUES ('445', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500733869');
INSERT INTO `de_log_action` VALUES ('446', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500733870');
INSERT INTO `de_log_action` VALUES ('447', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500733870');
INSERT INTO `de_log_action` VALUES ('448', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500733870');
INSERT INTO `de_log_action` VALUES ('449', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500733870');
INSERT INTO `de_log_action` VALUES ('450', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500733870');
INSERT INTO `de_log_action` VALUES ('451', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788290');
INSERT INTO `de_log_action` VALUES ('452', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788305');
INSERT INTO `de_log_action` VALUES ('453', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788310');
INSERT INTO `de_log_action` VALUES ('454', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788313');
INSERT INTO `de_log_action` VALUES ('455', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788335');
INSERT INTO `de_log_action` VALUES ('456', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788346');
INSERT INTO `de_log_action` VALUES ('457', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788377');
INSERT INTO `de_log_action` VALUES ('458', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788385');
INSERT INTO `de_log_action` VALUES ('459', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788411');
INSERT INTO `de_log_action` VALUES ('460', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788413');
INSERT INTO `de_log_action` VALUES ('461', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788422');
INSERT INTO `de_log_action` VALUES ('462', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788434');
INSERT INTO `de_log_action` VALUES ('463', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788438');
INSERT INTO `de_log_action` VALUES ('464', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788444');
INSERT INTO `de_log_action` VALUES ('465', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788450');
INSERT INTO `de_log_action` VALUES ('466', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788871');
INSERT INTO `de_log_action` VALUES ('467', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788874');
INSERT INTO `de_log_action` VALUES ('468', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788877');
INSERT INTO `de_log_action` VALUES ('469', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500788898');
INSERT INTO `de_log_action` VALUES ('470', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500789571');
INSERT INTO `de_log_action` VALUES ('471', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500789936');
INSERT INTO `de_log_action` VALUES ('472', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500789940');
INSERT INTO `de_log_action` VALUES ('473', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500789981');
INSERT INTO `de_log_action` VALUES ('474', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user', '更新了用户:admin', 'update', '0', '1500790278');
INSERT INTO `de_log_action` VALUES ('475', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user', '更新了用户:admin', 'update', '0', '1500790294');
INSERT INTO `de_log_action` VALUES ('476', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user', '更新了用户:admin', 'update', '0', '1500790310');
INSERT INTO `de_log_action` VALUES ('477', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500790561');
INSERT INTO `de_log_action` VALUES ('478', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500790561');
INSERT INTO `de_log_action` VALUES ('479', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500790561');
INSERT INTO `de_log_action` VALUES ('480', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500790561');
INSERT INTO `de_log_action` VALUES ('481', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500790561');
INSERT INTO `de_log_action` VALUES ('482', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500790561');
INSERT INTO `de_log_action` VALUES ('483', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500790561');
INSERT INTO `de_log_action` VALUES ('484', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500790869');
INSERT INTO `de_log_action` VALUES ('485', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500790951');
INSERT INTO `de_log_action` VALUES ('486', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=user%2Fprofile', '更新了用户:admin', 'update', '0', '1500791345');
INSERT INTO `de_log_action` VALUES ('487', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500793948');
INSERT INTO `de_log_action` VALUES ('488', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fcontribute-update&id=21', '更新了内容:sdafdsa333555', 'update', '0', '1500794266');
INSERT INTO `de_log_action` VALUES ('489', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fcontribute-update&id=18', '更新了内容:vvvvvvvvvvvvvvvvvvv5', 'update', '0', '1500794285');
INSERT INTO `de_log_action` VALUES ('490', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fcontribute-delete&id=20', '删除了内容:xxxxxxxxxxxxx3', 'delete', '1', '1500794909');
INSERT INTO `de_log_action` VALUES ('491', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fcontribute-delete&id=21', '删除了内容:sdafdsa333555', 'delete', '1', '1500794950');
INSERT INTO `de_log_action` VALUES ('492', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fcontribute', '创建了内容:test', 'create', '0', '1500795023');
INSERT INTO `de_log_action` VALUES ('493', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fdelete&id=22', '删除了内容:test', 'delete', '1', '1500795028');
INSERT INTO `de_log_action` VALUES ('494', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fcontribute', '创建了内容:z', 'create', '0', '1500795037');
INSERT INTO `de_log_action` VALUES ('495', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Fdelete&id=23', '删除了内容:z', 'delete', '1', '1500795096');
INSERT INTO `de_log_action` VALUES ('496', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500795381');
INSERT INTO `de_log_action` VALUES ('497', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500796951');
INSERT INTO `de_log_action` VALUES ('498', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500796951');
INSERT INTO `de_log_action` VALUES ('499', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500796951');
INSERT INTO `de_log_action` VALUES ('500', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500796951');
INSERT INTO `de_log_action` VALUES ('501', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500796951');
INSERT INTO `de_log_action` VALUES ('502', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500796951');
INSERT INTO `de_log_action` VALUES ('503', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500796951');
INSERT INTO `de_log_action` VALUES ('504', '1', 'admin', '/my/Deruv/deruv/app_frontend/web/index.php?r=user%2Findex', '更新了用户:admin', 'update', '0', '1500796990');
INSERT INTO `de_log_action` VALUES ('505', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500797092');
INSERT INTO `de_log_action` VALUES ('506', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500797092');
INSERT INTO `de_log_action` VALUES ('507', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500797092');
INSERT INTO `de_log_action` VALUES ('508', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500797092');
INSERT INTO `de_log_action` VALUES ('509', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500797092');
INSERT INTO `de_log_action` VALUES ('510', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500797092');
INSERT INTO `de_log_action` VALUES ('511', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500797092');
INSERT INTO `de_log_action` VALUES ('512', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1500797097');
INSERT INTO `de_log_action` VALUES ('513', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1500797097');
INSERT INTO `de_log_action` VALUES ('514', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1500797097');
INSERT INTO `de_log_action` VALUES ('515', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1500797097');
INSERT INTO `de_log_action` VALUES ('516', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1500797097');
INSERT INTO `de_log_action` VALUES ('517', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1500797097');
INSERT INTO `de_log_action` VALUES ('518', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1500797097');
INSERT INTO `de_log_action` VALUES ('519', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501071532');
INSERT INTO `de_log_action` VALUES ('520', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501071532');
INSERT INTO `de_log_action` VALUES ('521', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501071532');
INSERT INTO `de_log_action` VALUES ('522', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501071532');
INSERT INTO `de_log_action` VALUES ('523', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501071532');
INSERT INTO `de_log_action` VALUES ('524', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501071532');
INSERT INTO `de_log_action` VALUES ('525', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501071532');
INSERT INTO `de_log_action` VALUES ('526', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501072157');
INSERT INTO `de_log_action` VALUES ('527', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501072157');
INSERT INTO `de_log_action` VALUES ('528', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501072157');
INSERT INTO `de_log_action` VALUES ('529', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501072157');
INSERT INTO `de_log_action` VALUES ('530', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501072157');
INSERT INTO `de_log_action` VALUES ('531', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501072157');
INSERT INTO `de_log_action` VALUES ('532', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501072157');
INSERT INTO `de_log_action` VALUES ('533', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501077131');
INSERT INTO `de_log_action` VALUES ('534', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501077131');
INSERT INTO `de_log_action` VALUES ('535', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501077131');
INSERT INTO `de_log_action` VALUES ('536', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501077131');
INSERT INTO `de_log_action` VALUES ('537', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501077131');
INSERT INTO `de_log_action` VALUES ('538', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501077131');
INSERT INTO `de_log_action` VALUES ('539', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501077131');
INSERT INTO `de_log_action` VALUES ('540', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501077300');
INSERT INTO `de_log_action` VALUES ('541', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501077300');
INSERT INTO `de_log_action` VALUES ('542', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFrom', 'update', '0', '1501077300');
INSERT INTO `de_log_action` VALUES ('543', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501077300');
INSERT INTO `de_log_action` VALUES ('544', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501077300');
INSERT INTO `de_log_action` VALUES ('545', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501077300');
INSERT INTO `de_log_action` VALUES ('546', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501077300');
INSERT INTO `de_log_action` VALUES ('547', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501077300');
INSERT INTO `de_log_action` VALUES ('548', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501077305');
INSERT INTO `de_log_action` VALUES ('549', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501077305');
INSERT INTO `de_log_action` VALUES ('550', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFrom', 'update', '0', '1501077305');
INSERT INTO `de_log_action` VALUES ('551', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501077305');
INSERT INTO `de_log_action` VALUES ('552', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501077305');
INSERT INTO `de_log_action` VALUES ('553', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501077305');
INSERT INTO `de_log_action` VALUES ('554', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501077305');
INSERT INTO `de_log_action` VALUES ('555', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501077305');
INSERT INTO `de_log_action` VALUES ('556', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501077459');
INSERT INTO `de_log_action` VALUES ('557', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501077459');
INSERT INTO `de_log_action` VALUES ('558', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFrom', 'update', '0', '1501077459');
INSERT INTO `de_log_action` VALUES ('559', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501077459');
INSERT INTO `de_log_action` VALUES ('560', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501077459');
INSERT INTO `de_log_action` VALUES ('561', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501077459');
INSERT INTO `de_log_action` VALUES ('562', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501077459');
INSERT INTO `de_log_action` VALUES ('563', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501077459');
INSERT INTO `de_log_action` VALUES ('564', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501077633');
INSERT INTO `de_log_action` VALUES ('565', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501077633');
INSERT INTO `de_log_action` VALUES ('566', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFrom', 'update', '0', '1501077633');
INSERT INTO `de_log_action` VALUES ('567', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501077633');
INSERT INTO `de_log_action` VALUES ('568', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501077633');
INSERT INTO `de_log_action` VALUES ('569', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501077633');
INSERT INTO `de_log_action` VALUES ('570', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501077633');
INSERT INTO `de_log_action` VALUES ('571', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501077633');
INSERT INTO `de_log_action` VALUES ('572', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501077879');
INSERT INTO `de_log_action` VALUES ('573', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501077879');
INSERT INTO `de_log_action` VALUES ('574', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFrom', 'update', '0', '1501077879');
INSERT INTO `de_log_action` VALUES ('575', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501077879');
INSERT INTO `de_log_action` VALUES ('576', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501077879');
INSERT INTO `de_log_action` VALUES ('577', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501077879');
INSERT INTO `de_log_action` VALUES ('578', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501077879');
INSERT INTO `de_log_action` VALUES ('579', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501077879');
INSERT INTO `de_log_action` VALUES ('580', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501078089');
INSERT INTO `de_log_action` VALUES ('581', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501078089');
INSERT INTO `de_log_action` VALUES ('582', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFrom', 'update', '0', '1501078089');
INSERT INTO `de_log_action` VALUES ('583', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501078089');
INSERT INTO `de_log_action` VALUES ('584', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501078089');
INSERT INTO `de_log_action` VALUES ('585', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501078089');
INSERT INTO `de_log_action` VALUES ('586', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501078089');
INSERT INTO `de_log_action` VALUES ('587', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501078089');
INSERT INTO `de_log_action` VALUES ('588', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501078267');
INSERT INTO `de_log_action` VALUES ('589', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501078267');
INSERT INTO `de_log_action` VALUES ('590', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501078267');
INSERT INTO `de_log_action` VALUES ('591', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501078267');
INSERT INTO `de_log_action` VALUES ('592', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501078267');
INSERT INTO `de_log_action` VALUES ('593', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501078267');
INSERT INTO `de_log_action` VALUES ('594', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501078267');
INSERT INTO `de_log_action` VALUES ('595', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501078434');
INSERT INTO `de_log_action` VALUES ('596', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501078434');
INSERT INTO `de_log_action` VALUES ('597', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501078434');
INSERT INTO `de_log_action` VALUES ('598', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501078434');
INSERT INTO `de_log_action` VALUES ('599', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501078434');
INSERT INTO `de_log_action` VALUES ('600', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501078434');
INSERT INTO `de_log_action` VALUES ('601', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501078434');
INSERT INTO `de_log_action` VALUES ('602', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501078461');
INSERT INTO `de_log_action` VALUES ('603', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501078462');
INSERT INTO `de_log_action` VALUES ('604', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501078462');
INSERT INTO `de_log_action` VALUES ('605', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501078462');
INSERT INTO `de_log_action` VALUES ('606', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501078462');
INSERT INTO `de_log_action` VALUES ('607', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501078462');
INSERT INTO `de_log_action` VALUES ('608', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501078462');
INSERT INTO `de_log_action` VALUES ('609', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=user%2Fdelete&id=2', '删除了用户:test', 'delete', '1', '1501302279');
INSERT INTO `de_log_action` VALUES ('610', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=user%2Fdelete&id=3', '删除了用户:test2', 'delete', '1', '1501302282');
INSERT INTO `de_log_action` VALUES ('611', '5', 'test', '/my/Deruv/deruv/app_frontend/web/index.php?r=user', '更新了用户:test', 'update', '0', '1501305167');
INSERT INTO `de_log_action` VALUES ('612', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501305500');
INSERT INTO `de_log_action` VALUES ('613', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501305500');
INSERT INTO `de_log_action` VALUES ('614', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501305500');
INSERT INTO `de_log_action` VALUES ('615', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501305500');
INSERT INTO `de_log_action` VALUES ('616', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501305500');
INSERT INTO `de_log_action` VALUES ('617', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501305500');
INSERT INTO `de_log_action` VALUES ('618', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501305500');
INSERT INTO `de_log_action` VALUES ('619', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEnabled', 'update', '0', '1501385975');
INSERT INTO `de_log_action` VALUES ('620', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailEncryption', 'update', '0', '1501385975');
INSERT INTO `de_log_action` VALUES ('621', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailFromName', 'update', '0', '1501385976');
INSERT INTO `de_log_action` VALUES ('622', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailHost', 'update', '0', '1501385976');
INSERT INTO `de_log_action` VALUES ('623', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPassword', 'update', '0', '1501385976');
INSERT INTO `de_log_action` VALUES ('624', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailPort', 'update', '0', '1501385976');
INSERT INTO `de_log_action` VALUES ('625', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:emailUserName', 'update', '0', '1501385976');
INSERT INTO `de_log_action` VALUES ('626', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501387576');
INSERT INTO `de_log_action` VALUES ('627', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501387576');
INSERT INTO `de_log_action` VALUES ('628', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501387576');
INSERT INTO `de_log_action` VALUES ('629', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501387576');
INSERT INTO `de_log_action` VALUES ('630', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501387576');
INSERT INTO `de_log_action` VALUES ('631', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501387576');
INSERT INTO `de_log_action` VALUES ('632', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501387576');
INSERT INTO `de_log_action` VALUES ('633', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=category%2Fupdate&id=4', '更新了分类:新闻', 'update', '0', '1501390338');
INSERT INTO `de_log_action` VALUES ('634', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=category%2Fupdate&id=4', '更新了分类:新闻', 'update', '0', '1501390559');
INSERT INTO `de_log_action` VALUES ('635', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=category%2Fupdate&id=4', '更新了分类:新闻', 'update', '0', '1501390597');
INSERT INTO `de_log_action` VALUES ('636', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501390955');
INSERT INTO `de_log_action` VALUES ('637', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501390955');
INSERT INTO `de_log_action` VALUES ('638', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501390955');
INSERT INTO `de_log_action` VALUES ('639', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501390955');
INSERT INTO `de_log_action` VALUES ('640', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501390955');
INSERT INTO `de_log_action` VALUES ('641', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501390955');
INSERT INTO `de_log_action` VALUES ('642', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501390955');
INSERT INTO `de_log_action` VALUES ('643', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=block%2Fupdate&id=28', '更新了区块:\"烦民\"证明有望终结 ', 'update', '0', '1501391585');
INSERT INTO `de_log_action` VALUES ('644', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501391942');
INSERT INTO `de_log_action` VALUES ('645', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501391942');
INSERT INTO `de_log_action` VALUES ('646', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501391942');
INSERT INTO `de_log_action` VALUES ('647', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501391942');
INSERT INTO `de_log_action` VALUES ('648', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501391942');
INSERT INTO `de_log_action` VALUES ('649', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501391942');
INSERT INTO `de_log_action` VALUES ('650', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501391942');
INSERT INTO `de_log_action` VALUES ('651', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501392277');
INSERT INTO `de_log_action` VALUES ('652', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501392277');
INSERT INTO `de_log_action` VALUES ('653', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501392277');
INSERT INTO `de_log_action` VALUES ('654', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501392277');
INSERT INTO `de_log_action` VALUES ('655', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501392277');
INSERT INTO `de_log_action` VALUES ('656', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501392277');
INSERT INTO `de_log_action` VALUES ('657', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501392277');
INSERT INTO `de_log_action` VALUES ('658', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501401616');
INSERT INTO `de_log_action` VALUES ('659', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501401616');
INSERT INTO `de_log_action` VALUES ('660', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501401616');
INSERT INTO `de_log_action` VALUES ('661', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501401616');
INSERT INTO `de_log_action` VALUES ('662', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501401616');
INSERT INTO `de_log_action` VALUES ('663', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501401616');
INSERT INTO `de_log_action` VALUES ('664', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501401616');
INSERT INTO `de_log_action` VALUES ('665', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:pageSize', 'update', '0', '1501401650');
INSERT INTO `de_log_action` VALUES ('666', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:webDescription', 'update', '0', '1501401650');
INSERT INTO `de_log_action` VALUES ('667', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:webKeywords', 'update', '0', '1501401650');
INSERT INTO `de_log_action` VALUES ('668', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:webName', 'update', '0', '1501401650');
INSERT INTO `de_log_action` VALUES ('669', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:webUrl', 'update', '0', '1501401650');
INSERT INTO `de_log_action` VALUES ('670', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:adminLayout', 'update', '0', '1501405278');
INSERT INTO `de_log_action` VALUES ('671', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:enablePrettyUrl', 'update', '0', '1501405278');
INSERT INTO `de_log_action` VALUES ('672', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:frontendTheme', 'update', '0', '1501405278');
INSERT INTO `de_log_action` VALUES ('673', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:language', 'update', '0', '1501405278');
INSERT INTO `de_log_action` VALUES ('674', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:sharedHost', 'update', '0', '1501405279');
INSERT INTO `de_log_action` VALUES ('675', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:timeZone', 'update', '0', '1501405279');
INSERT INTO `de_log_action` VALUES ('676', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:webClose', 'update', '0', '1501405279');
INSERT INTO `de_log_action` VALUES ('677', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501405289');
INSERT INTO `de_log_action` VALUES ('678', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501405289');
INSERT INTO `de_log_action` VALUES ('679', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501405289');
INSERT INTO `de_log_action` VALUES ('680', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501405289');
INSERT INTO `de_log_action` VALUES ('681', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501405289');
INSERT INTO `de_log_action` VALUES ('682', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501405289');
INSERT INTO `de_log_action` VALUES ('683', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501405289');
INSERT INTO `de_log_action` VALUES ('684', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:adminLayout', 'update', '0', '1501405755');
INSERT INTO `de_log_action` VALUES ('685', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:enablePrettyUrl', 'update', '0', '1501405755');
INSERT INTO `de_log_action` VALUES ('686', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:frontendTheme', 'update', '0', '1501405755');
INSERT INTO `de_log_action` VALUES ('687', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:language', 'update', '0', '1501405755');
INSERT INTO `de_log_action` VALUES ('688', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:sharedHost', 'update', '0', '1501405755');
INSERT INTO `de_log_action` VALUES ('689', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:timeZone', 'update', '0', '1501405755');
INSERT INTO `de_log_action` VALUES ('690', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:webClose', 'update', '0', '1501405755');
INSERT INTO `de_log_action` VALUES ('691', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501405775');
INSERT INTO `de_log_action` VALUES ('692', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501405775');
INSERT INTO `de_log_action` VALUES ('693', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501405775');
INSERT INTO `de_log_action` VALUES ('694', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501405775');
INSERT INTO `de_log_action` VALUES ('695', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501405775');
INSERT INTO `de_log_action` VALUES ('696', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501405775');
INSERT INTO `de_log_action` VALUES ('697', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501405775');
INSERT INTO `de_log_action` VALUES ('698', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501405931');
INSERT INTO `de_log_action` VALUES ('699', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501405931');
INSERT INTO `de_log_action` VALUES ('700', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501405931');
INSERT INTO `de_log_action` VALUES ('701', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501405931');
INSERT INTO `de_log_action` VALUES ('702', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501405931');
INSERT INTO `de_log_action` VALUES ('703', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501405931');
INSERT INTO `de_log_action` VALUES ('704', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501405931');
INSERT INTO `de_log_action` VALUES ('705', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:adminLayout', 'update', '0', '1501406215');
INSERT INTO `de_log_action` VALUES ('706', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:enablePrettyUrl', 'update', '0', '1501406215');
INSERT INTO `de_log_action` VALUES ('707', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:frontendTheme', 'update', '0', '1501406215');
INSERT INTO `de_log_action` VALUES ('708', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:language', 'update', '0', '1501406215');
INSERT INTO `de_log_action` VALUES ('709', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:sharedHost', 'update', '0', '1501406215');
INSERT INTO `de_log_action` VALUES ('710', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:timeZone', 'update', '0', '1501406215');
INSERT INTO `de_log_action` VALUES ('711', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:webClose', 'update', '0', '1501406215');
INSERT INTO `de_log_action` VALUES ('712', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501406481');
INSERT INTO `de_log_action` VALUES ('713', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501406481');
INSERT INTO `de_log_action` VALUES ('714', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501406481');
INSERT INTO `de_log_action` VALUES ('715', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501406481');
INSERT INTO `de_log_action` VALUES ('716', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501406481');
INSERT INTO `de_log_action` VALUES ('717', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501406481');
INSERT INTO `de_log_action` VALUES ('718', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501406481');
INSERT INTO `de_log_action` VALUES ('719', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:adminLayout', 'update', '0', '1501406524');
INSERT INTO `de_log_action` VALUES ('720', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:enablePrettyUrl', 'update', '0', '1501406524');
INSERT INTO `de_log_action` VALUES ('721', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:frontendTheme', 'update', '0', '1501406524');
INSERT INTO `de_log_action` VALUES ('722', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:language', 'update', '0', '1501406524');
INSERT INTO `de_log_action` VALUES ('723', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:sharedHost', 'update', '0', '1501406524');
INSERT INTO `de_log_action` VALUES ('724', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:timeZone', 'update', '0', '1501406524');
INSERT INTO `de_log_action` VALUES ('725', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:webClose', 'update', '0', '1501406524');
INSERT INTO `de_log_action` VALUES ('726', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501406542');
INSERT INTO `de_log_action` VALUES ('727', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501406542');
INSERT INTO `de_log_action` VALUES ('728', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501406542');
INSERT INTO `de_log_action` VALUES ('729', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501406542');
INSERT INTO `de_log_action` VALUES ('730', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501406542');
INSERT INTO `de_log_action` VALUES ('731', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501406542');
INSERT INTO `de_log_action` VALUES ('732', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501406542');
INSERT INTO `de_log_action` VALUES ('733', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501406552');
INSERT INTO `de_log_action` VALUES ('734', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501406552');
INSERT INTO `de_log_action` VALUES ('735', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501406552');
INSERT INTO `de_log_action` VALUES ('736', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501406552');
INSERT INTO `de_log_action` VALUES ('737', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501406552');
INSERT INTO `de_log_action` VALUES ('738', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501406552');
INSERT INTO `de_log_action` VALUES ('739', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501406552');
INSERT INTO `de_log_action` VALUES ('740', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:adminLayout', 'update', '0', '1501406596');
INSERT INTO `de_log_action` VALUES ('741', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:enablePrettyUrl', 'update', '0', '1501406596');
INSERT INTO `de_log_action` VALUES ('742', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:frontendTheme', 'update', '0', '1501406596');
INSERT INTO `de_log_action` VALUES ('743', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:language', 'update', '0', '1501406596');
INSERT INTO `de_log_action` VALUES ('744', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:sharedHost', 'update', '0', '1501406596');
INSERT INTO `de_log_action` VALUES ('745', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:timeZone', 'update', '0', '1501406596');
INSERT INTO `de_log_action` VALUES ('746', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', 'Updated Setting:webClose', 'update', '0', '1501406596');
INSERT INTO `de_log_action` VALUES ('747', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:adminLayout', 'update', '0', '1501407579');
INSERT INTO `de_log_action` VALUES ('748', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:enablePrettyUrl', 'update', '0', '1501407579');
INSERT INTO `de_log_action` VALUES ('749', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:frontendTheme', 'update', '0', '1501407579');
INSERT INTO `de_log_action` VALUES ('750', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:language', 'update', '0', '1501407579');
INSERT INTO `de_log_action` VALUES ('751', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:sharedHost', 'update', '0', '1501407579');
INSERT INTO `de_log_action` VALUES ('752', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:timeZone', 'update', '0', '1501407579');
INSERT INTO `de_log_action` VALUES ('753', '1', 'admin', '/my/Deruv/deruv/app_admin/web/index.php?r=setting%2Fupdate', '更新了设置:webClose', 'update', '0', '1501407579');

-- ----------------------------
-- Table structure for de_log_login
-- ----------------------------
DROP TABLE IF EXISTS `de_log_login`;
CREATE TABLE `de_log_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ip` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `login_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_log_login
-- ----------------------------
INSERT INTO `de_log_login` VALUES ('86', 'admin', '', '127.0.0.1', '1', '1500790509');
INSERT INTO `de_log_login` VALUES ('87', 'admin', '', '127.0.0.1', '1', '1500796938');
INSERT INTO `de_log_login` VALUES ('88', 'admin', '', '127.0.0.1', '1', '1500821206');
INSERT INTO `de_log_login` VALUES ('89', 'admin', '', '127.0.0.1', '1', '1500989656');
INSERT INTO `de_log_login` VALUES ('90', 'admin', '', '127.0.0.1', '1', '1501071229');
INSERT INTO `de_log_login` VALUES ('91', 'admin', '', '127.0.0.1', '1', '1501071423');
INSERT INTO `de_log_login` VALUES ('92', 'admin', '', '127.0.0.1', '1', '1501074992');
INSERT INTO `de_log_login` VALUES ('93', 'admin', '', '127.0.0.1', '1', '1501077116');
INSERT INTO `de_log_login` VALUES ('98', 'admin', '', '127.0.0.1', '1', '1501389942');
INSERT INTO `de_log_login` VALUES ('99', 'admin', '', '127.0.0.1', '1', '1501399818');
INSERT INTO `de_log_login` VALUES ('100', 'admin', '', '127.0.0.1', '1', '1501591506');
INSERT INTO `de_log_login` VALUES ('101', 'admin', '', '127.0.0.1', '1', '1501596484');
INSERT INTO `de_log_login` VALUES ('102', 'admin', '', '127.0.0.1', '1', '1501763882');
INSERT INTO `de_log_login` VALUES ('103', 'ds', 'ddd', '127.0.0.1', '0', '1501765811');
INSERT INTO `de_log_login` VALUES ('104', 'ds', 'ddd', '127.0.0.1', '0', '1501768373');
INSERT INTO `de_log_login` VALUES ('105', 'admin', '', '127.0.0.1', '1', '1501768378');
INSERT INTO `de_log_login` VALUES ('106', 'admin', '', '127.0.0.1', '1', '1501770152');

-- ----------------------------
-- Table structure for de_menu
-- ----------------------------
DROP TABLE IF EXISTS `de_menu`;
CREATE TABLE `de_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `de_menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `de_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_menu
-- ----------------------------
INSERT INTO `de_menu` VALUES ('1', 'Home', null, '/site/index', '0', 0x66612066612D74682D6C61726765);
INSERT INTO `de_menu` VALUES ('2', 'Category', '6', '/category/index', '0', null);
INSERT INTO `de_menu` VALUES ('4', 'Add', '6', '/content/create', '1', null);
INSERT INTO `de_menu` VALUES ('6', 'Content', null, '/content/index', '2', 0x66612066612D65646974);
INSERT INTO `de_menu` VALUES ('7', 'List', '6', '/content/index', '0', null);
INSERT INTO `de_menu` VALUES ('9', 'Block', null, '/block/index', '3', 0x66612066612D63756265);
INSERT INTO `de_menu` VALUES ('10', 'BlockKind', '9', '/block-kind/index', '0', null);
INSERT INTO `de_menu` VALUES ('11', 'List', '9', '/block/index', '1', null);
INSERT INTO `de_menu` VALUES ('12', 'Log', null, '/log-login/index', '5', 0x66612066612D626F6F6B);
INSERT INTO `de_menu` VALUES ('13', 'Log Action', '12', '/log-action/index', '0', null);
INSERT INTO `de_menu` VALUES ('14', 'Log Login', '12', '/log-login/index', '1', null);
INSERT INTO `de_menu` VALUES ('15', 'User', null, '/user/index', '4', 0x66612066612D75736572);
INSERT INTO `de_menu` VALUES ('16', 'List', '15', '/user/index', '0', null);
INSERT INTO `de_menu` VALUES ('17', 'Assign User', '15', '/admin/assignment/index', '1', null);
INSERT INTO `de_menu` VALUES ('18', 'Role', '15', '/admin/role/index', '2', null);
INSERT INTO `de_menu` VALUES ('19', 'Permission', '15', '/admin/permission/index', '3', null);
INSERT INTO `de_menu` VALUES ('20', 'Route', '15', '/admin/route/index', '4', null);
INSERT INTO `de_menu` VALUES ('21', 'Rule', '15', '/admin/rule/index', '5', null);
INSERT INTO `de_menu` VALUES ('22', 'Menu', '15', '/admin/menu/index', '6', null);
INSERT INTO `de_menu` VALUES ('23', 'Setting', null, '/setting/index', '6', 0x66612066612D636F6773);
INSERT INTO `de_menu` VALUES ('28', 'System', '23', '/setting/index', null, null);
INSERT INTO `de_menu` VALUES ('29', 'Update Cache', '23', '/setting/update-cache', '1', null);
INSERT INTO `de_menu` VALUES ('30', 'Comment', '6', '/comment/index', '5', null);

-- ----------------------------
-- Table structure for de_migration
-- ----------------------------
DROP TABLE IF EXISTS `de_migration`;
CREATE TABLE `de_migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_migration
-- ----------------------------
INSERT INTO `de_migration` VALUES ('m000000_000000_base', '1492172979');
INSERT INTO `de_migration` VALUES ('m130524_201442_init', '1492172984');
INSERT INTO `de_migration` VALUES ('m140506_102106_rbac_init', '1492681033');
INSERT INTO `de_migration` VALUES ('m140602_111327_create_menu_table', '1495631585');
INSERT INTO `de_migration` VALUES ('m160312_050000_create_user', '1495631585');

-- ----------------------------
-- Table structure for de_plugin
-- ----------------------------
DROP TABLE IF EXISTS `de_plugin`;
CREATE TABLE `de_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_plugin
-- ----------------------------

-- ----------------------------
-- Table structure for de_session
-- ----------------------------
DROP TABLE IF EXISTS `de_session`;
CREATE TABLE `de_session` (
  `id` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_session
-- ----------------------------
INSERT INTO `de_session` VALUES ('cuch80alcc84f0arguok62if74', '1501597926', 0x5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A33303A222F6D792F44657275762F64657275762F6170705F61646D696E2F7765622F223B5F5F69647C693A313B);
INSERT INTO `de_session` VALUES ('u7nfbt9fm9kbfgkvrg30ldspg7', '1501771630', 0x5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A35343A222F6D792F44657275762F64657275762F6170705F61646D696E2F7765622F696E6465782E7068703F723D73697465253246696E646578223B5F5F69647C693A313B);
INSERT INTO `de_session` VALUES ('utv0e5loqmeu1ts80mo50bi5q1', '1501409850', 0x5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A36323A222F6D792F44657275762F64657275762F6170705F61646D696E2F7765622F696E6465782E7068703F723D626C6F636B2532467570646174652669643D3238223B5F5F69647C693A313B);
INSERT INTO `de_session` VALUES ('v5bqt43tkl5ksdeur9svbd6tm3', '1501592950', 0x5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A33303A222F6D792F44657275762F64657275762F6170705F61646D696E2F7765622F223B5F5F69647C693A313B);

-- ----------------------------
-- Table structure for de_setting
-- ----------------------------
DROP TABLE IF EXISTS `de_setting`;
CREATE TABLE `de_setting` (
  `k` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `v` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'sys',
  `out` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sorting` tinyint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`k`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_setting
-- ----------------------------
INSERT INTO `de_setting` VALUES ('adminLayout', 'main', 'sys', 'select', '0');
INSERT INTO `de_setting` VALUES ('auditComment', '0', 'content', 'radio_noyes', '0');
INSERT INTO `de_setting` VALUES ('avatarHeight', '100', 'image', '', '0');
INSERT INTO `de_setting` VALUES ('avatarWidth', '100', 'image', '', '0');
INSERT INTO `de_setting` VALUES ('blockList', '0', 'cache', '', '0');
INSERT INTO `de_setting` VALUES ('closeComment', '0', 'content', 'radio_noyes', '0');
INSERT INTO `de_setting` VALUES ('contentList', '0', 'cache', '', '0');
INSERT INTO `de_setting` VALUES ('defaultWidth', '300', 'content', '', '0');
INSERT INTO `de_setting` VALUES ('emailEnabled', '1', 'email', 'radio_noyes', '99');
INSERT INTO `de_setting` VALUES ('emailEncryption', 'ssl', 'email', '', '0');
INSERT INTO `de_setting` VALUES ('emailFromName', 'Robot', 'email', '', '0');
INSERT INTO `de_setting` VALUES ('emailHost', 'smtp.163.com', 'email', '', '98');
INSERT INTO `de_setting` VALUES ('emailPassword', '999888163', 'email', 'password', '95');
INSERT INTO `de_setting` VALUES ('emailPort', '994', 'email', '', '97');
INSERT INTO `de_setting` VALUES ('emailUserName', 'luckws99@163.com', 'email', '', '96');
INSERT INTO `de_setting` VALUES ('enablePrettyUrl', '0', 'sys', 'radio_noyes', '0');
INSERT INTO `de_setting` VALUES ('frontendTheme', 'blog', 'sys', 'select', '0');
INSERT INTO `de_setting` VALUES ('language', 'zh-CN', 'sys', 'select', '0');
INSERT INTO `de_setting` VALUES ('pageSize', '20', 'param', '', '0');
INSERT INTO `de_setting` VALUES ('quality', '50', 'image', '', '0');
INSERT INTO `de_setting` VALUES ('sharedHost', '0', 'sys', 'radio_noyes', '0');
INSERT INTO `de_setting` VALUES ('timeZone', 'Asia/Shanghai', 'sys', 'select', '0');
INSERT INTO `de_setting` VALUES ('userCommentMax', '300', 'content', '', '0');
INSERT INTO `de_setting` VALUES ('userPublishedAudit', '1', 'content', 'radio_noyes', '0');
INSERT INTO `de_setting` VALUES ('webClose', '0', 'sys', 'radio_noyes', '0');
INSERT INTO `de_setting` VALUES ('webDescription', 'test3', 'param', '', '96');
INSERT INTO `de_setting` VALUES ('webKeywords', 'test2', 'param', '', '97');
INSERT INTO `de_setting` VALUES ('webName', 'test2', 'param', '', '99');
INSERT INTO `de_setting` VALUES ('webUrl', 'http://127.0.0.1/my/Deruv/deruv/app_frontend/web/', 'param', '', '98');

-- ----------------------------
-- Table structure for de_stat_day
-- ----------------------------
DROP TABLE IF EXISTS `de_stat_day`;
CREATE TABLE `de_stat_day` (
  `day` date NOT NULL,
  `pv` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`day`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_stat_day
-- ----------------------------
INSERT INTO `de_stat_day` VALUES ('2017-07-02', '197');
INSERT INTO `de_stat_day` VALUES ('2017-07-04', '43');
INSERT INTO `de_stat_day` VALUES ('2017-07-07', '334');
INSERT INTO `de_stat_day` VALUES ('2017-07-09', '124');
INSERT INTO `de_stat_day` VALUES ('2017-07-12', '12');
INSERT INTO `de_stat_day` VALUES ('2017-07-13', '7');
INSERT INTO `de_stat_day` VALUES ('2017-07-15', '1');
INSERT INTO `de_stat_day` VALUES ('2017-07-16', '410');
INSERT INTO `de_stat_day` VALUES ('2017-07-17', '3');
INSERT INTO `de_stat_day` VALUES ('2017-07-22', '328');
INSERT INTO `de_stat_day` VALUES ('2017-07-23', '662');
INSERT INTO `de_stat_day` VALUES ('2017-07-25', '41');
INSERT INTO `de_stat_day` VALUES ('2017-07-26', '17');
INSERT INTO `de_stat_day` VALUES ('2017-07-27', '6');
INSERT INTO `de_stat_day` VALUES ('2017-07-29', '163');
INSERT INTO `de_stat_day` VALUES ('2017-07-30', '124');
INSERT INTO `de_stat_day` VALUES ('2017-07-31', '10');
INSERT INTO `de_stat_day` VALUES ('2017-08-01', '2');
INSERT INTO `de_stat_day` VALUES ('2017-08-03', '18');

-- ----------------------------
-- Table structure for de_user
-- ----------------------------
DROP TABLE IF EXISTS `de_user`;
CREATE TABLE `de_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_user
-- ----------------------------
INSERT INTO `de_user` VALUES ('1', 'admin', '17YfCOkGjPT8IsZeJ0ZMf4K7y4Hfe4ke', '$2y$13$X0VZ31qKqVNrsQRCk/Bm3uposLh2pmqv3E1zuGcksC0q0cSKn7kWy', '', 'zzzz@test.com', '/my/Deruv/deruv/app_frontend/web/uploads/17_06_22/16cf7dc867e68e40cf702e933322ecc0.jpg', '1', '1492680787', '1500790310');
INSERT INTO `de_user` VALUES ('5', 'test', '_tJbBV1qR0NuJCqwF-TFOiea74J4uDaV', '$2y$13$RzMks6t30fHiZDS9RSlWauAo.2FzFRAXpM9Y4Tawlc8weN10AmCJm', null, 'luckart@sina.com', '', '1', '1501303370', '1501387688');
INSERT INTO `de_user` VALUES ('6', 'test2', 'eUCeXHsmfLpUP2ICs-3wKnHZE8kGKM2P', '$2y$13$mU8rH20RecUYVwnTzg1r..s/ZxJWmKpxF0K/2OU9ep7WGe4ySI52y', null, 'test2@test.com', '', '1', '1501387807', '1501387807');


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_block
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_block_kind
-- ----------------------------

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
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sorting` tinyint(2) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_category
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_comment
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_content
-- ----------------------------

-- ----------------------------
-- Table structure for de_content_article
-- ----------------------------
DROP TABLE IF EXISTS `de_content_article`;
CREATE TABLE `de_content_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `content_id` (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_content_article
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_files
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of de_log_login
-- ----------------------------

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
INSERT INTO `de_setting` VALUES ('emailHost', '', 'email', '', '98');
INSERT INTO `de_setting` VALUES ('emailPassword', '', 'email', 'password', '95');
INSERT INTO `de_setting` VALUES ('emailPort', '994', 'email', '', '97');
INSERT INTO `de_setting` VALUES ('emailUserName', '', 'email', '', '96');
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
INSERT INTO `de_setting` VALUES ('webDescription', '', 'param', '', '96');
INSERT INTO `de_setting` VALUES ('webKeywords', '', 'param', '', '97');
INSERT INTO `de_setting` VALUES ('webName', '', 'param', '', '99');
INSERT INTO `de_setting` VALUES ('webUrl', '/', 'param', '', '98');

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
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
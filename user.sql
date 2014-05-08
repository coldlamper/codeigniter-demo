/*
Source Server         : ubuntumin
Source Server Version : 50161
Source Host           : 192.168.1.143:3306
Source Database       : ci

Target Server Type    : MYSQL
Target Server Version : 50161
File Encoding         : 65001

Date: 2014-05-08 12:44:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('13', 'demodemo', 'demo@demo.net', '$2a$12$c0589c31f2aa4699c95d9eN9.YUa0.jDxRe0/B0/6KjRaSFiBdL92', '2014-05-08 12:41:55', '2014-05-08 12:41:55', '2014-05-08 12:42:30');

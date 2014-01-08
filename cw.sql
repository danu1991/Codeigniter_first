/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : programming

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2014-01-08 01:23:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `answer`
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `answer_id` int(212) NOT NULL auto_increment,
  `answer` text NOT NULL,
  `voted_user_id` int(64) default NULL,
  `answer_user_id` int(64) NOT NULL,
  `answer_edit_user_id` int(64) default NULL,
  `question_id` int(212) NOT NULL,
  `vote_value` int(64) default NULL,
  `date` double NOT NULL,
  `edit_date` double NOT NULL,
  PRIMARY KEY  (`answer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO `answer` VALUES ('56', 'hfgnfg', '0', '35', '35', '107', '0', '1388971565725', '0');
INSERT INTO `answer` VALUES ('57', 'egfewgre', '0', '35', '35', '107', '0', '1388971721488', '0');
INSERT INTO `answer` VALUES ('58', '{\"user_name\":\"user4\",\"asker_user_id\":\"35\",\"loy,\"number_of_answers\":\"0\"},{\"user_naty\":\"0\",\"close_reason\":\"\",\"date\":\"1388', '0', '35', '35', '108', '0', '1388973581935', '0');
INSERT INTO `answer` VALUES ('60', 'would maintain two sets of the code and handle a forced redirect to HTTPS pages with a post_controller_constructor hook. The hook will be called before each page is rendered to check if the visitor should be redirected to HTTPS based on their current location on your site.', '0', '35', '35', '98', '0', '1389011041463', '0');
INSERT INTO `answer` VALUES ('61', 'The session_start() simply continues the session. Then it\'s just a simple text matching which is done by the if statement. If the input text matches the stored text then the success message displayed, otherwise error message. If someone is trying to outwit you, then you should probably use a more secure way besides storing the security code in a session or a cookie that always has the same name. As an example you can store this data in MySQL database.', '0', '35', '35', '120', '0', '1389012867812', '1389047971026');
INSERT INTO `answer` VALUES ('62', 'rhefh', '0', '35', '35', '103', '0', '1389047314690', '0');
INSERT INTO `answer` VALUES ('63', 'kygghhkl', '0', '44', '44', '124', '0', '1389089948756', '0');

-- ----------------------------
-- Table structure for `catagory`
-- ----------------------------
DROP TABLE IF EXISTS `catagory`;
CREATE TABLE `catagory` (
  `catagory_id` int(64) NOT NULL auto_increment,
  `catagory` varchar(256) NOT NULL,
  `question_id` int(255) NOT NULL,
  PRIMARY KEY  (`catagory_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of catagory
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned zerofill NOT NULL default '0000000000',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('aa1b7f87dba78326dc829903a8b8e48a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', '1389120488', '');

-- ----------------------------
-- Table structure for `flag_questions`
-- ----------------------------
DROP TABLE IF EXISTS `flag_questions`;
CREATE TABLE `flag_questions` (
  `id` int(11) NOT NULL auto_increment,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of flag_questions
-- ----------------------------
INSERT INTO `flag_questions` VALUES ('1', '118', '35');
INSERT INTO `flag_questions` VALUES ('2', '108', '35');
INSERT INTO `flag_questions` VALUES ('3', '98', '35');

-- ----------------------------
-- Table structure for `logins`
-- ----------------------------
DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `session_id` varchar(40) NOT NULL,
  `user_name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of logins
-- ----------------------------
INSERT INTO `logins` VALUES ('a6875ad3a004e60bbfdf601f779217a1', 'user11');
INSERT INTO `logins` VALUES ('615aaa61ec8c12436552a68419e1efff', 'user11');
INSERT INTO `logins` VALUES ('dea75bdf60a16427ab5278aa0adf5078', 'user3');
INSERT INTO `logins` VALUES ('c0fb46a66ed2fe337e62adeb7b3b69b0', 'user4');
INSERT INTO `logins` VALUES ('71f796fd54fdb7fdbc7521152c4b1389', 'user11');
INSERT INTO `logins` VALUES ('0f39cb695be160cc76f41a1c68358c22', 'user11');
INSERT INTO `logins` VALUES ('27a79d54c5728faa38668c17d597b1bc', 'user11');
INSERT INTO `logins` VALUES ('a932165797c0e81e8924def23fa1cb6f', 'user11');
INSERT INTO `logins` VALUES ('4d21e2f8de0091d1918a57faafc678c3', 'user11');
INSERT INTO `logins` VALUES ('fbb45ff4acba63f38d9c5ee08f2bffa3', 'user11');
INSERT INTO `logins` VALUES ('10be9aa015f241ccfd62ff34e3837bbe', 'user4');
INSERT INTO `logins` VALUES ('1f89027124971e2f029866160ec998bb', 'user4');
INSERT INTO `logins` VALUES ('b3d74bdb8095932b06ada5bc5d492b06', 'user11');
INSERT INTO `logins` VALUES ('dc68de454a529c558f8974be05d5d112', 'user11');
INSERT INTO `logins` VALUES ('0ee86c3b75379a16af28ce404c61725a', 'user4');
INSERT INTO `logins` VALUES ('3eeb3c7c74b71f52c3f8aa923e17c83f', 'user4');
INSERT INTO `logins` VALUES ('00aa54c76f19a90c4cc3b436f1887970', 'user11');
INSERT INTO `logins` VALUES ('00aa54c76f19a90c4cc3b436f1887970', 'user4');
INSERT INTO `logins` VALUES ('00aa54c76f19a90c4cc3b436f1887970', 'user11');
INSERT INTO `logins` VALUES ('00aa54c76f19a90c4cc3b436f1887970', 'user4');
INSERT INTO `logins` VALUES ('00aa54c76f19a90c4cc3b436f1887970', 'user11');
INSERT INTO `logins` VALUES ('00aa54c76f19a90c4cc3b436f1887970', 'user11');
INSERT INTO `logins` VALUES ('123ef9d4c64b7d8393ab58d591dd031b', 'user11');
INSERT INTO `logins` VALUES ('25217d79190d7e7835e36151cf1fdc13', 'user12');
INSERT INTO `logins` VALUES ('c5c3c63e62a9ed034fa1ee806bcad76b', 'user11');
INSERT INTO `logins` VALUES ('71658e04f78762798d468d5958597db3', 'user4');
INSERT INTO `logins` VALUES ('cb3d7c8daf295f71d576544bbf977e31', 'user12');
INSERT INTO `logins` VALUES ('0a769c90de2a77895eb96572cc3a2b8c', 'user2');
INSERT INTO `logins` VALUES ('ea458d11fb67876de466f5dc7fef71b2', 'user11');
INSERT INTO `logins` VALUES ('481d2126ed7f1ce977020b9cd4119450', 'user4');
INSERT INTO `logins` VALUES ('dfc696fc13c6375536e66f5eb69964f6', 'user4');
INSERT INTO `logins` VALUES ('9c28725ee67d00fe7c5aaf1d6d011014', 'user4');
INSERT INTO `logins` VALUES ('58e4dbec7637205fa9ee29b8a7bc925d', 'user11');
INSERT INTO `logins` VALUES ('57437a66ca1c42734452756262982ab3', 'user4');
INSERT INTO `logins` VALUES ('6025d6213251bb2a2f444523b01b1e68', 'user4');
INSERT INTO `logins` VALUES ('e0be1764b1cec9bd45af3e71611f9d5d', 'user11');
INSERT INTO `logins` VALUES ('5f338a8b15882cd4ea698fab3b914af0', 'user12');
INSERT INTO `logins` VALUES ('1a4231d7df82b6f5f4f19717cfec3722', 'user11');
INSERT INTO `logins` VALUES ('970197dba5864e720a047e25927bfe5a', 'user11');
INSERT INTO `logins` VALUES ('1533b34019d825135c327fdc51f49d9c', 'user11');
INSERT INTO `logins` VALUES ('26566344621d59c95d268d00d9acd5bd', 'user11');
INSERT INTO `logins` VALUES ('6bae369ff49e51bc1ee130cc4390bd5a', 'user11');
INSERT INTO `logins` VALUES ('219ee14daf7eec24159a973b3c604f95', 'user11');
INSERT INTO `logins` VALUES ('3a7daf2fe241b16bcc5622f489fc7eed', 'user11');
INSERT INTO `logins` VALUES ('1e9448471a239c736411f8c1f54d4f20', 'user11');
INSERT INTO `logins` VALUES ('ac7a234c73ee79df5e52229c76ea24fe', 'user11');
INSERT INTO `logins` VALUES ('870674884d5e38a4bd1d0d6263873b07', 'user11');
INSERT INTO `logins` VALUES ('1adb88af2b5cedc2e06f9c609d515336', 'user11');
INSERT INTO `logins` VALUES ('467d9b2e490cc6039fe7a24cf8464772', 'user11');
INSERT INTO `logins` VALUES ('0a6fa51e96ef6c9beeb489bc841fcd79', 'user11');
INSERT INTO `logins` VALUES ('97db0909699edc202b28358bdef45e37', 'user11');
INSERT INTO `logins` VALUES ('9b0a6690a61a5ce01b0e72fabbd51c6b', 'user11');
INSERT INTO `logins` VALUES ('1268d063ad54ea1eff5dcc7da665304c', 'user11');
INSERT INTO `logins` VALUES ('0a4f68afea4301fd6ea8b01fc36e9265', 'user4');
INSERT INTO `logins` VALUES ('d11d7a501c096490a6ecc0ad0bb4f936', 'user4');
INSERT INTO `logins` VALUES ('6e050fecad6bb126c72cef8201d75bca', 'user4');
INSERT INTO `logins` VALUES ('076b6169d962a1ca9b872615ebdb57ec', 'user4');
INSERT INTO `logins` VALUES ('3148a7d323f483b09c5ba223bfd74ebc', 'user4');
INSERT INTO `logins` VALUES ('e30f3453a38eeff867a2c3c1ee8d43e2', 'user4');
INSERT INTO `logins` VALUES ('c7b57f1308b303a44798f260373a658f', 'user4');
INSERT INTO `logins` VALUES ('fa3db24b013be9635049c18224c36995', 'user11');
INSERT INTO `logins` VALUES ('8a04efd0348ac40b21c23dd13fe9b150', 'user4');
INSERT INTO `logins` VALUES ('23166aecadcf1b4aeffd62899f65dbe1', 'user4');
INSERT INTO `logins` VALUES ('e639b2bab09d4fac0159bf67171823a6', 'user4');
INSERT INTO `logins` VALUES ('24bc4905a6a55634680a5189e63ada36', 'user11');
INSERT INTO `logins` VALUES ('04e5a0cc73701841abf0cf8b54b6f1c5', 'user12');
INSERT INTO `logins` VALUES ('a38d6b5851a8e81c7b145711cd8f8bd8', 'user121');
INSERT INTO `logins` VALUES ('d7f7bd5a1a1cb51c762947c1441e9998', 'user121');
INSERT INTO `logins` VALUES ('43dbee74404f2b7c9557ad90c762df69', 'user11');
INSERT INTO `logins` VALUES ('23a1765230e82a0dbd591a286aa3d4d2', 'user4');
INSERT INTO `logins` VALUES ('23a1765230e82a0dbd591a286aa3d4d2', 'user4');
INSERT INTO `logins` VALUES ('23a1765230e82a0dbd591a286aa3d4d2', 'user4');
INSERT INTO `logins` VALUES ('23a1765230e82a0dbd591a286aa3d4d2', 'user4');
INSERT INTO `logins` VALUES ('23a1765230e82a0dbd591a286aa3d4d2', 'user4');
INSERT INTO `logins` VALUES ('23a1765230e82a0dbd591a286aa3d4d2', 'user4');
INSERT INTO `logins` VALUES ('23a1765230e82a0dbd591a286aa3d4d2', 'user4');
INSERT INTO `logins` VALUES ('23a1765230e82a0dbd591a286aa3d4d2', 'user4');
INSERT INTO `logins` VALUES ('d6c3ff3bb5848b7151f10a5dbdab71b6', 'admin1');
INSERT INTO `logins` VALUES ('d6c3ff3bb5848b7151f10a5dbdab71b6', 'admin1');
INSERT INTO `logins` VALUES ('da2b19385337392d34c23474fe40bc70', 'user4');
INSERT INTO `logins` VALUES ('da2b19385337392d34c23474fe40bc70', 'user4');
INSERT INTO `logins` VALUES ('da2b19385337392d34c23474fe40bc70', 'user4');
INSERT INTO `logins` VALUES ('da2b19385337392d34c23474fe40bc70', 'user4');
INSERT INTO `logins` VALUES ('da2b19385337392d34c23474fe40bc70', 'user11');
INSERT INTO `logins` VALUES ('4eaaed08fb793f86b073ba1f896f9d8a', 'admin1');
INSERT INTO `logins` VALUES ('4eaaed08fb793f86b073ba1f896f9d8a', 'admin1');
INSERT INTO `logins` VALUES ('4eaaed08fb793f86b073ba1f896f9d8a', 'admin1');
INSERT INTO `logins` VALUES ('4eaaed08fb793f86b073ba1f896f9d8a', 'admin1');
INSERT INTO `logins` VALUES ('4eaaed08fb793f86b073ba1f896f9d8a', 'admin1');
INSERT INTO `logins` VALUES ('4eaaed08fb793f86b073ba1f896f9d8a', 'user4');
INSERT INTO `logins` VALUES ('4eaaed08fb793f86b073ba1f896f9d8a', 'admin1');
INSERT INTO `logins` VALUES ('4eaaed08fb793f86b073ba1f896f9d8a', 'admin1');
INSERT INTO `logins` VALUES ('4eaaed08fb793f86b073ba1f896f9d8a', 'user4');
INSERT INTO `logins` VALUES ('da2b19385337392d34c23474fe40bc70', 'user4');
INSERT INTO `logins` VALUES ('da2b19385337392d34c23474fe40bc70', 'user4');
INSERT INTO `logins` VALUES ('da2b19385337392d34c23474fe40bc70', 'user4');
INSERT INTO `logins` VALUES ('da2b19385337392d34c23474fe40bc70', 'user4');
INSERT INTO `logins` VALUES ('da2b19385337392d34c23474fe40bc70', 'user4');
INSERT INTO `logins` VALUES ('3f89176ecfdeda0603e0429b388a27b8', 'user4');
INSERT INTO `logins` VALUES ('c87166502a6d36c5952361c44e517cae', 'user4');
INSERT INTO `logins` VALUES ('b67a64e43f642c810b8ef6b920aa3b22', 'user4');
INSERT INTO `logins` VALUES ('c42fd93bad017a7fa7d637afe48ca3ed', 'admin1');
INSERT INTO `logins` VALUES ('bd2be56af8de9a74b5632ae9af836ba2', 'tutor');
INSERT INTO `logins` VALUES ('16ff24838a73a3240f094ba7ed25fa41', 'tutor');
INSERT INTO `logins` VALUES ('7a72cded8b7ed60a39624a696542fc79', 'user4');
INSERT INTO `logins` VALUES ('aa3701a75cd447945cc4c4edb94c5741', 'admin1');
INSERT INTO `logins` VALUES ('f3f54b56ceb791151baa5433461fc5d5', 'user4');
INSERT INTO `logins` VALUES ('f2506b0474a25907dc58f6b205a9e660', 'admin1');
INSERT INTO `logins` VALUES ('0c95855925cd9e0d20551682f362fb2f', 'user4');
INSERT INTO `logins` VALUES ('7ccbc4ff97a9e231e139257c1de431a5', 'user4');
INSERT INTO `logins` VALUES ('7f2136d0b89d6b7200845f8b35a95663', 'admin1');
INSERT INTO `logins` VALUES ('3a0f04384673d2223d176a4531199abf', 'admin1');
INSERT INTO `logins` VALUES ('c03668fee39f62896c88ca9e7aa9658c', 'admin1');
INSERT INTO `logins` VALUES ('57cc58b21361ec49d02c3fdb50ac3f32', 'admin1');
INSERT INTO `logins` VALUES ('3d692c4d84da2c3a14c391533f7f9137', 'admin1');
INSERT INTO `logins` VALUES ('97eeec932e73c165246d7f2c87a6abbc', 'admin1');
INSERT INTO `logins` VALUES ('6546707fb5f5135fa9446007b93d1e2d', 'admin1');
INSERT INTO `logins` VALUES ('34fc12f784769045c034a3e1b90d815b', 'admin1');
INSERT INTO `logins` VALUES ('19cd2e05753f6fcfc03ac77cc0e57cb2', 'admin1');
INSERT INTO `logins` VALUES ('ec887a0081c25efc77910c294e391e31', 'user4');
INSERT INTO `logins` VALUES ('b423da27af1ba5966bb3c72423c50a24', 'admin1');
INSERT INTO `logins` VALUES ('598a094a276b3ef549bbd37405f7afee', 'tutor');
INSERT INTO `logins` VALUES ('fb1c32c057550045e3af644e647cbe1f', 'admin1');
INSERT INTO `logins` VALUES ('fb1c32c057550045e3af644e647cbe1f', 'admin1');
INSERT INTO `logins` VALUES ('fb1c32c057550045e3af644e647cbe1f', 'admin1');
INSERT INTO `logins` VALUES ('a5ae22f5255abcfd985d9622da10f61f', 'user11');
INSERT INTO `logins` VALUES ('a5ae22f5255abcfd985d9622da10f61f', 'user4');
INSERT INTO `logins` VALUES ('ef1100ac8d4b5be94a14da28ef7548f1', 'user11');
INSERT INTO `logins` VALUES ('411b2a42ba8ecb4876e2ef68b7be5568', 'user11');
INSERT INTO `logins` VALUES ('6ca75f18562c599b3f836e6d76dc8700', 'user4');
INSERT INTO `logins` VALUES ('59c1c3c2c1e33ad9423588d328f2ffad', 'user12');
INSERT INTO `logins` VALUES ('f102d3ce69dcafe78089328988ea4010', 'user4');
INSERT INTO `logins` VALUES ('e1e5fcc4b28c72448850d6ddd07a5a9c', 'user4');
INSERT INTO `logins` VALUES ('30568d559b068ad23f206022891ba0d3', 'user4');
INSERT INTO `logins` VALUES ('4c5faccc0e4f5908d5c321fdf202be25', 'user4');
INSERT INTO `logins` VALUES ('15c81a64b55da19447a20c838a86c7eb', 'admin1');
INSERT INTO `logins` VALUES ('af70ab729aa745518a349e4515d6ccef', 'admin1');
INSERT INTO `logins` VALUES ('af70ab729aa745518a349e4515d6ccef', 'admin1');
INSERT INTO `logins` VALUES ('af70ab729aa745518a349e4515d6ccef', 'admin1');
INSERT INTO `logins` VALUES ('af70ab729aa745518a349e4515d6ccef', 'admin1');
INSERT INTO `logins` VALUES ('af70ab729aa745518a349e4515d6ccef', 'admin1');
INSERT INTO `logins` VALUES ('af70ab729aa745518a349e4515d6ccef', 'admin1');
INSERT INTO `logins` VALUES ('af70ab729aa745518a349e4515d6ccef', 'admin1');
INSERT INTO `logins` VALUES ('af70ab729aa745518a349e4515d6ccef', 'user4');
INSERT INTO `logins` VALUES ('af70ab729aa745518a349e4515d6ccef', 'user4');
INSERT INTO `logins` VALUES ('c74070517caebf090268365e0cc920f0', 'user4');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'admin1');
INSERT INTO `logins` VALUES ('7cd4ddb62d8d7ffcba42092e1f0c15b3', 'user4');
INSERT INTO `logins` VALUES ('41261b373811bf3e711452f69dd1e058', 'user4');
INSERT INTO `logins` VALUES ('1038db6ea064470bd15fe62e8f291757', 'admin1');
INSERT INTO `logins` VALUES ('179a2a7d66861627ed09b7b3d07bced1', 'admin1');
INSERT INTO `logins` VALUES ('30032143a22fbd4ed09b9320e6dee983', 'admin1');
INSERT INTO `logins` VALUES ('30032143a22fbd4ed09b9320e6dee983', 'admin1');
INSERT INTO `logins` VALUES ('30032143a22fbd4ed09b9320e6dee983', 'admin1');
INSERT INTO `logins` VALUES ('30032143a22fbd4ed09b9320e6dee983', 'admin1');
INSERT INTO `logins` VALUES ('30032143a22fbd4ed09b9320e6dee983', 'admin1');
INSERT INTO `logins` VALUES ('30032143a22fbd4ed09b9320e6dee983', 'user4');
INSERT INTO `logins` VALUES ('897dc5b3738c35dba26a30db8f889ee1', 'admin1');
INSERT INTO `logins` VALUES ('e4997d076f188ace6c2a444de5140ef7', 'admin1');
INSERT INTO `logins` VALUES ('2094728b16a103d4d1a04c4a3ffcb3dc', 'user4');
INSERT INTO `logins` VALUES ('cc717d997aaa231b53d3f428e6c6c8ea', 'admin1');
INSERT INTO `logins` VALUES ('4e90b395634a05a3f883fdb72a97812e', 'user4');
INSERT INTO `logins` VALUES ('4e90b395634a05a3f883fdb72a97812e', 'admin1');
INSERT INTO `logins` VALUES ('4e90b395634a05a3f883fdb72a97812e', 'admin1');
INSERT INTO `logins` VALUES ('4e90b395634a05a3f883fdb72a97812e', 'admin1');
INSERT INTO `logins` VALUES ('4e90b395634a05a3f883fdb72a97812e', 'admin1');
INSERT INTO `logins` VALUES ('4e90b395634a05a3f883fdb72a97812e', 'user4');
INSERT INTO `logins` VALUES ('4e90b395634a05a3f883fdb72a97812e', 'admin1');
INSERT INTO `logins` VALUES ('4e90b395634a05a3f883fdb72a97812e', 'user4');
INSERT INTO `logins` VALUES ('f52d4e394da6d29a6a0372565dea283b', 'admin1');
INSERT INTO `logins` VALUES ('d7b1fb46ef3bdf063a6958484d4cafed', 'user4');
INSERT INTO `logins` VALUES ('6126033be0b090770505dacce37f2ada', 'user4');
INSERT INTO `logins` VALUES ('9769213fab4e1989a48c27d5395bd323', 'user4');
INSERT INTO `logins` VALUES ('9fbcb56c446868e31b3f441a280043dd', 'user4');
INSERT INTO `logins` VALUES ('2eef905e448c9bbfc9ae043ab654f44c', 'user4');
INSERT INTO `logins` VALUES ('4fa520382169e345b91f21f51bae1c89', 'admin1');
INSERT INTO `logins` VALUES ('367ed1f31d3f7fe42b7ed9a6bc5574b2', 'user4');
INSERT INTO `logins` VALUES ('6076b64ce0676d9fb2cafc2e6b258a86', 'user4');
INSERT INTO `logins` VALUES ('f9ddf4924918e57464964435cc98c2ef', 'admin1');
INSERT INTO `logins` VALUES ('1a3ff369c649dbf0a2c996dc10eebe61', 'admin1');
INSERT INTO `logins` VALUES ('801ceeb8edb6bfcac76f65a0083d15af', 'user4');
INSERT INTO `logins` VALUES ('9cd8e8ca9c337c1c94ad178b34e2ac3c', 'admin1');
INSERT INTO `logins` VALUES ('e9f4a672981c685e53aa1ccb1e848bdc', 'user4');
INSERT INTO `logins` VALUES ('62f04ad9a21e68ca287c5be99a31cd2e', 'user4');
INSERT INTO `logins` VALUES ('9b0df39b740f15c4a6532f82d2b3247a', 'admin1');
INSERT INTO `logins` VALUES ('815d768cd769e89e775f22755f7373ae', 'admin1');
INSERT INTO `logins` VALUES ('803fa3be023c2f2dba775e3f33c1526f', 'user5');
INSERT INTO `logins` VALUES ('3751494995324f0577c93a6944468388', 'user4');
INSERT INTO `logins` VALUES ('3f4c0a07a0a8e71519359b5ede6670c0', 'user5');
INSERT INTO `logins` VALUES ('574cc104f7a46612698e943b46fd01d4', 'admin1');
INSERT INTO `logins` VALUES ('7954ef037903082f518f821aa438c993', 'user4');
INSERT INTO `logins` VALUES ('5b6f2d865bcae949c38aeb51bcdcb8d9', 'user12');
INSERT INTO `logins` VALUES ('10994418b07a4a84fcf0a6b2807791d1', 'admin1');
INSERT INTO `logins` VALUES ('f40898a17b971b000dc5a81d9424a4a3', 'user5');
INSERT INTO `logins` VALUES ('701015d8dd6014d5ef540b055966f0b3', 'user4');
INSERT INTO `logins` VALUES ('cb836cc38ae30a59a5bbca20dde2415a', 'admin1');
INSERT INTO `logins` VALUES ('34e299ba6ea4ae73b6eb4b45b8a905f0', 'user4');
INSERT INTO `logins` VALUES ('e727cc437c9b84613f710d94970b6865', 'user12');
INSERT INTO `logins` VALUES ('d047b2693965f75835ab8e8d2e6bf076', 'admin1');
INSERT INTO `logins` VALUES ('a29669f0aa029683bc4baf967c783cd2', 'user4');
INSERT INTO `logins` VALUES ('fa69f8efc759cdd0fd816afe5d198149', 'admin1');
INSERT INTO `logins` VALUES ('5c4505da475040294c6b3b263e024f8b', 'user4');
INSERT INTO `logins` VALUES ('979d5fc6cdc7152270a2ee9c7822a5d9', 'user4');
INSERT INTO `logins` VALUES ('a8ff6627c4f2abb6dadab86b00241a28', 'user4');
INSERT INTO `logins` VALUES ('52dd506e8b11884a96ea2f793eac7902', 'user4');
INSERT INTO `logins` VALUES ('da6510c8c416e8e9456033f16f180be5', 'admin1');
INSERT INTO `logins` VALUES ('927ebf2f557aa9b9813379da231b19e0', 'user_6');
INSERT INTO `logins` VALUES ('02a0a2754e050aa4d153631de166ca28', 'user4');
INSERT INTO `logins` VALUES ('a161c46b3d33d73601611711efa62b15', 'user4');
INSERT INTO `logins` VALUES ('8ccbb19672cae8f67cef7074e2a6effd', 'user_6');
INSERT INTO `logins` VALUES ('150634b8c54d5637f5d28966d7da2994', 'admin1');
INSERT INTO `logins` VALUES ('5140796624351ada55f218e48548dd31', 'user_6');
INSERT INTO `logins` VALUES ('836214b9e8cb18797f44e3dc1dddd708', 'user4');
INSERT INTO `logins` VALUES ('6cf42231324a0584fa0b5a8aebd35bb9', 'user4');
INSERT INTO `logins` VALUES ('1ddad8a5a5334a732fc6199f5eda1ff4', 'user4');
INSERT INTO `logins` VALUES ('bd5e11fe067ee531635314bdbec783f3', 'user4');
INSERT INTO `logins` VALUES ('3f21572c7628015f0183a45509142708', 'user4');
INSERT INTO `logins` VALUES ('6183df1a84ff120b556dc905f375bdf8', 'admin1');
INSERT INTO `logins` VALUES ('758617f8ce4b70311bc1e94fb5e9f10f', 'user4');
INSERT INTO `logins` VALUES ('0', 'admin1');
INSERT INTO `logins` VALUES ('0', 'admin1');
INSERT INTO `logins` VALUES ('f98ae28b6c6e604f1b2dc4b3624c5ff1', 'admin1');
INSERT INTO `logins` VALUES ('ea8b220ccbf5d1412d04696d21b877b8', 'user4');
INSERT INTO `logins` VALUES ('6c827325acfad4bc99d2d11733f67fe5', 'user4');
INSERT INTO `logins` VALUES ('5a47c69437ee900e5111ec58ec90058a', 'user4');
INSERT INTO `logins` VALUES ('53afaa66aa97c410c15a2b8d2f5ff5e1', 'admin1');
INSERT INTO `logins` VALUES ('ca2f5bdf1b512cb51785b8aa44efce40', 'user4');
INSERT INTO `logins` VALUES ('21a488727514eea750d9bdcb3de4a451', 'user_6');
INSERT INTO `logins` VALUES ('ca8e1d75e76441f4f7043d57230a81a2', 'user_6');
INSERT INTO `logins` VALUES ('874d4dc113e5cd207e0e241e6094f6ae', 'user_6');
INSERT INTO `logins` VALUES ('25c38d5287456dca83995af4c54eacb6', 'user4');
INSERT INTO `logins` VALUES ('59fa7213259f413d56787ae94a266a14', 'user_6');
INSERT INTO `logins` VALUES ('cd0e2d3b8d46a9799ff4f7a8affd35ec', 'user4');
INSERT INTO `logins` VALUES ('9b9b56d01d8a840a8dc92ea51c593c21', 'admin1');
INSERT INTO `logins` VALUES ('33d14073e76646599fd5bbfb1f3aa93f', 'user4');
INSERT INTO `logins` VALUES ('909c24a06e5769e36452a32e95b9dc5d', 'admin1');
INSERT INTO `logins` VALUES ('e565554eb2baad5264f1da31a761f3be', 'user4');
INSERT INTO `logins` VALUES ('981a8cb8dd20cf9da38f21dadee41dbf', 'admin1');
INSERT INTO `logins` VALUES ('1d6641572e71fadd153d5582b0e16366', 'user4');
INSERT INTO `logins` VALUES ('5da0ae75c4bfcc917997d09caa4f6b49', 'user4');
INSERT INTO `logins` VALUES ('20f613335ab7e0cc924a107b623b0049', 'user4');
INSERT INTO `logins` VALUES ('be4a7c9e4412cff81ea0f75c2d671ef3', 'admin1');
INSERT INTO `logins` VALUES ('265b1b9e4ff0b14dea67f1c064e1023e', 'user4');
INSERT INTO `logins` VALUES ('76c2f1fec92c482e0308d38da60b0625', 'admin1');
INSERT INTO `logins` VALUES ('bbbab4b8cc1e33b47cbb972b28556361', 'user4');
INSERT INTO `logins` VALUES ('bd6efc05f38dd2d6b62be69a2d72d507', 'admin1');
INSERT INTO `logins` VALUES ('9213ced04767b9c0173f27192d539616', 'user4');
INSERT INTO `logins` VALUES ('bcad2455a64d29a93f5ff1112d135844', 'user4');
INSERT INTO `logins` VALUES ('4e74348502bdb6ce18b0c3508db9ce89', 'user4');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'user11');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'user11');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'user11');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'user11');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'user11');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'user11');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'user11');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'user11');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'test');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'test');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'test');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'test');
INSERT INTO `logins` VALUES ('1b587377e9dfcace4929d83675c54b3f', 'test');
INSERT INTO `logins` VALUES ('c3c5d2968614b70f6c2c37456b010833', 'test');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'test');
INSERT INTO `logins` VALUES ('e97db25f5e4bfeef965a0fd41902681f', 'test');
INSERT INTO `logins` VALUES ('c06ba79f4f20c64fdcf69657f8695b54', 'test');
INSERT INTO `logins` VALUES ('ecc87a99dec84d6fd8f0619915892bc7', 'test');
INSERT INTO `logins` VALUES ('55e9e4aac266dc66c765c054754425aa', 'test');
INSERT INTO `logins` VALUES ('75fe86667e19fa34bd45e05c1d7fe6d4', 'admin1');
INSERT INTO `logins` VALUES ('33f200e0652ec7516006b9acaf6847e1', 'test');
INSERT INTO `logins` VALUES ('33f200e0652ec7516006b9acaf6847e1', 'test');
INSERT INTO `logins` VALUES ('33f200e0652ec7516006b9acaf6847e1', 'test');
INSERT INTO `logins` VALUES ('33f200e0652ec7516006b9acaf6847e1', 'test');
INSERT INTO `logins` VALUES ('33f200e0652ec7516006b9acaf6847e1', 'test');
INSERT INTO `logins` VALUES ('6a130107e67f20ccddf3518bb4ddf564', 'test');
INSERT INTO `logins` VALUES ('913d7859508685d9524e0a6a7ed768bc', 'test');
INSERT INTO `logins` VALUES ('8bc6c38a1e7a52d021f288f8daec40d5', 'test');
INSERT INTO `logins` VALUES ('db296209cd0a9f57eb11518fa3b5a487', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7c91d8203fb415148e5ce2b3c6b244e', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d7ab8dbf724b403816df54a586ea3498', 'test');
INSERT INTO `logins` VALUES ('d9d16323fa49c2d50a5c705fa7271bc7', 'test');
INSERT INTO `logins` VALUES ('f5b0c68ddfdb29533fc9fbc697e5c799', 'test');
INSERT INTO `logins` VALUES ('ac03517cdde000d3a5655e9bfb13813a', 'tut01');
INSERT INTO `logins` VALUES ('3f5a99ee6a2f3f26d547e7b76e321f62', 'tut01');
INSERT INTO `logins` VALUES ('aa1b7f87dba78326dc829903a8b8e48a', 'tut01');

-- ----------------------------
-- Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `question_id` int(64) NOT NULL auto_increment,
  `question_title` varchar(265) NOT NULL,
  `question_description` text NOT NULL,
  `asker_user_id` int(64) NOT NULL,
  `edit_question_user_id` int(64) default NULL,
  `voted_user_id` int(64) default NULL,
  `date` double NOT NULL,
  `edit_date` double NOT NULL,
  `question_catagory` int(64) NOT NULL,
  `tag` varchar(256) NOT NULL,
  `vote` int(64) default NULL,
  `number_of_answers` int(11) default NULL,
  `question_avalability` int(11) NOT NULL,
  `close_user_id` int(11) NOT NULL,
  `close_reason` text NOT NULL,
  `number_of_views` int(11) NOT NULL,
  `flag_count` int(11) NOT NULL,
  PRIMARY KEY  (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('98', 'test01', 'I\'m very new to Javascript(just started a few hours ago and trying to get a script working). I went through a few tutorials on w3 and the \'hello world\' code works when I paste it directly into my html but I\'m having a problem with a script(I\'ve had problems with other scripts as well but I am not sure what I\'m doing wrong).\n\nI have this code that I want to test in my html, I copied the html in and it looks the same then I made a file in my static folder called edit.js and copied the javascript into it(exactly as shown). It didn\'t work no errors on the page but when I click it nothing happens. I tried to paste a w3 hello world code in and that worked but this script does not.\n\nI tried to inspect the code in chrome and that\'s where I see the above error(under the resources tab). I can open the js file using chrome which makes me think the js file is accessible and pointing correctly but I\'m not sure how to get it working. I\'m using jinja2 as my template engine to render the html and in my header I have: [removed][removed] and in my main template(the one that gets rendered on all pages) I have: [removed][removed]\n\nedit.js(even putting it within the script tag directly on the page I want to use it on doesn\'t work):           ', '35', '0', '0', '1388846199313', '0', '1', 'asp, java', '0', '1', '0', '0', '', '4', '1');
INSERT INTO `question` VALUES ('102', 'new topic', 'dvsdgfbf', '35', '0', '0', '1388908274805', '0', '1', 'java', '0', '0', '1', '35', 'fgngdndf', '7', '0');
INSERT INTO `question` VALUES ('103', 'gfdshbfdsnbsdbsd', '           ddffbfdhfdsdbnf  ', '35', '0', '0', '1388908295102', '1389047020918', '0', '.net', '0', '1', '0', '0', '', '5', '0');
INSERT INTO `question` VALUES ('104', 'gwegeahrhefh', 'wegrwegreheh             ', '35', '0', '0', '1388908315008', '0', '1', 'java', '0', '0', '0', '0', '', '4', '0');
INSERT INTO `question` VALUES ('105', 'egehgreher', ' ewgrhgreherh            ', '35', '0', '0', '1388908347244', '0', '1', 'android', '0', '0', '0', '0', '', '5', '0');
INSERT INTO `question` VALUES ('106', 'erjtkhlk.hbxcvxv', '  fsdfsdgsdhdfg           ', '35', '0', '0', '1388908393369', '0', '1', 'java', '0', '0', '0', '0', '', '4', '0');
INSERT INTO `question` VALUES ('107', 'Test Question', 'This is a test question', '35', '0', '0', '1388908863658', '0', '1', 'java', '1', '2', '0', '0', '', '14', '0');
INSERT INTO `question` VALUES ('108', 'texting', 'gege', '35', '0', '0', '1388973505595', '0', '1', 'matlab', '-1', '1', '0', '0', '', '5', '1');
INSERT INTO `question` VALUES ('109', '[{\"user_name\":\"user4\",\"asker_user_id\":\"35\"', 'ef', '35', '0', '0', '1388973708987', '0', '1', 'java', '1', '0', '0', '0', '', '5', '0');
INSERT INTO `question` VALUES ('119', 'dsdsdsdbsdbsfdbsdfbsdfbsfbsfb  g gedgedgdg  gedg', 'eagfedgdgd', '35', '0', '0', '1389012468988', '0', '1', 'java', '0', '0', '0', '0', '', '1', '0');
INSERT INTO `question` VALUES ('120', 'request', 'ege', '35', '0', '0', '1389012805074', '0', '1', 'java', '0', '1', '0', '0', '', '2', '0');
INSERT INTO `question` VALUES ('121', 'fefefe', 'Background\n\nIn most of the cases some times it happens that we need to have some additional resources / dlls to be registered on the hosting server in order to implement the captcha basically this happens in case of server side scripting.Here I have implemented the Captcha functionality purely on the client side using javascript.\nUsing the code\n\nGenerating Captcha using client side scripting is quite a simple but make sure that the javascript is enabled. Ya now a days almost all of the browsers supports the javascript. Anyways lets move towards the code details. the source code is quite simple and straight forwad. Just copy and paste the below mentioned code in blank html page and save it as whatever you like. download / copy an image and put in under same folder or at same location where the HTML file is created.', '35', '0', '0', '1389018193413', '0', '1', 'asp', '1', '0', '0', '0', '', '5', '0');
INSERT INTO `question` VALUES ('124', 'dvdv', 'vbfxdgb', '43', '0', '0', '1389079769199', '0', '1', 'gdf', '0', '1', '0', '0', '', '3', '0');

-- ----------------------------
-- Table structure for `question_views`
-- ----------------------------
DROP TABLE IF EXISTS `question_views`;
CREATE TABLE `question_views` (
  `id` int(11) NOT NULL auto_increment,
  `session` varchar(40) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of question_views
-- ----------------------------
INSERT INTO `question_views` VALUES ('1', '1ddad8a5a5334a732fc6199f5eda1ff4', '107');
INSERT INTO `question_views` VALUES ('2', 'bd5e11fe067ee531635314bdbec783f3', '107');
INSERT INTO `question_views` VALUES ('3', '3f21572c7628015f0183a45509142708', '106');
INSERT INTO `question_views` VALUES ('4', '6183df1a84ff120b556dc905f375bdf8', '106');
INSERT INTO `question_views` VALUES ('5', '758617f8ce4b70311bc1e94fb5e9f10f', '107');
INSERT INTO `question_views` VALUES ('6', 'ea8b220ccbf5d1412d04696d21b877b8', '107');
INSERT INTO `question_views` VALUES ('7', '6c827325acfad4bc99d2d11733f67fe5', '107');
INSERT INTO `question_views` VALUES ('8', '9e8c9c2d49ce021747b158f9ae3e0723', '107');
INSERT INTO `question_views` VALUES ('9', '5a47c69437ee900e5111ec58ec90058a', '107');
INSERT INTO `question_views` VALUES ('10', '53afaa66aa97c410c15a2b8d2f5ff5e1', '107');
INSERT INTO `question_views` VALUES ('11', '218af849f444a598090b4d6f78f232fc', '107');
INSERT INTO `question_views` VALUES ('12', 'ca2f5bdf1b512cb51785b8aa44efce40', '102');
INSERT INTO `question_views` VALUES ('13', '822e3c8371db41efe77e8fbc2a12f673', '109');
INSERT INTO `question_views` VALUES ('14', '21a488727514eea750d9bdcb3de4a451', '107');
INSERT INTO `question_views` VALUES ('15', '0410ae32b2f55c55f00944184f38d427', '115');
INSERT INTO `question_views` VALUES ('16', 'f4cc70ac705f6b589c7eb256dd3d6bb5', '114');
INSERT INTO `question_views` VALUES ('17', '92b12d4b05573145d62a0e49510e0666', '112');
INSERT INTO `question_views` VALUES ('18', '92b12d4b05573145d62a0e49510e0666', '116');
INSERT INTO `question_views` VALUES ('19', '92b12d4b05573145d62a0e49510e0666', '113');
INSERT INTO `question_views` VALUES ('20', '92b12d4b05573145d62a0e49510e0666', '111');
INSERT INTO `question_views` VALUES ('21', '92b12d4b05573145d62a0e49510e0666', '110');
INSERT INTO `question_views` VALUES ('22', '92b12d4b05573145d62a0e49510e0666', '107');
INSERT INTO `question_views` VALUES ('23', 'e84147370ca179421d41bbb28a980fe0', '116');
INSERT INTO `question_views` VALUES ('24', '35321f41add58a006609b09bc1d55661', '116');
INSERT INTO `question_views` VALUES ('25', 'ca8e1d75e76441f4f7043d57230a81a2', '116');
INSERT INTO `question_views` VALUES ('26', '39beca67fc7a32eb77196f1cdbd185db', '116');
INSERT INTO `question_views` VALUES ('27', '874d4dc113e5cd207e0e241e6094f6ae', '113');
INSERT INTO `question_views` VALUES ('28', '874d4dc113e5cd207e0e241e6094f6ae', '108');
INSERT INTO `question_views` VALUES ('29', '874d4dc113e5cd207e0e241e6094f6ae', '109');
INSERT INTO `question_views` VALUES ('30', '874d4dc113e5cd207e0e241e6094f6ae', '95');
INSERT INTO `question_views` VALUES ('31', '874d4dc113e5cd207e0e241e6094f6ae', '102');
INSERT INTO `question_views` VALUES ('32', '874d4dc113e5cd207e0e241e6094f6ae', '103');
INSERT INTO `question_views` VALUES ('33', '25c38d5287456dca83995af4c54eacb6', '117');
INSERT INTO `question_views` VALUES ('34', '25c38d5287456dca83995af4c54eacb6', '116');
INSERT INTO `question_views` VALUES ('35', '25c38d5287456dca83995af4c54eacb6', '115');
INSERT INTO `question_views` VALUES ('36', '59fa7213259f413d56787ae94a266a14', '118');
INSERT INTO `question_views` VALUES ('37', '3384b15a341d9609254fcd4533887850', '118');
INSERT INTO `question_views` VALUES ('38', '3384b15a341d9609254fcd4533887850', '113');
INSERT INTO `question_views` VALUES ('39', 'cd0e2d3b8d46a9799ff4f7a8affd35ec', '118');
INSERT INTO `question_views` VALUES ('40', 'cd0e2d3b8d46a9799ff4f7a8affd35ec', '109');
INSERT INTO `question_views` VALUES ('41', '33d14073e76646599fd5bbfb1f3aa93f', '118');
INSERT INTO `question_views` VALUES ('42', '33d14073e76646599fd5bbfb1f3aa93f', '108');
INSERT INTO `question_views` VALUES ('43', '33d14073e76646599fd5bbfb1f3aa93f', '98');
INSERT INTO `question_views` VALUES ('44', '33d14073e76646599fd5bbfb1f3aa93f', '104');
INSERT INTO `question_views` VALUES ('45', '33d14073e76646599fd5bbfb1f3aa93f', '110');
INSERT INTO `question_views` VALUES ('46', '33d14073e76646599fd5bbfb1f3aa93f', '105');
INSERT INTO `question_views` VALUES ('47', '33d14073e76646599fd5bbfb1f3aa93f', '109');
INSERT INTO `question_views` VALUES ('48', '33d14073e76646599fd5bbfb1f3aa93f', '117');
INSERT INTO `question_views` VALUES ('49', '33d14073e76646599fd5bbfb1f3aa93f', '99');
INSERT INTO `question_views` VALUES ('50', '33d14073e76646599fd5bbfb1f3aa93f', '107');
INSERT INTO `question_views` VALUES ('51', '909c24a06e5769e36452a32e95b9dc5d', '95');
INSERT INTO `question_views` VALUES ('52', '909c24a06e5769e36452a32e95b9dc5d', '107');
INSERT INTO `question_views` VALUES ('53', '909c24a06e5769e36452a32e95b9dc5d', '117');
INSERT INTO `question_views` VALUES ('54', 'e565554eb2baad5264f1da31a761f3be', '116');
INSERT INTO `question_views` VALUES ('55', 'e565554eb2baad5264f1da31a761f3be', '115');
INSERT INTO `question_views` VALUES ('56', 'e565554eb2baad5264f1da31a761f3be', '113');
INSERT INTO `question_views` VALUES ('57', 'e565554eb2baad5264f1da31a761f3be', '99');
INSERT INTO `question_views` VALUES ('58', 'e565554eb2baad5264f1da31a761f3be', '102');
INSERT INTO `question_views` VALUES ('59', '981a8cb8dd20cf9da38f21dadee41dbf', '109');
INSERT INTO `question_views` VALUES ('60', '1d6641572e71fadd153d5582b0e16366', '119');
INSERT INTO `question_views` VALUES ('61', '1d6641572e71fadd153d5582b0e16366', '120');
INSERT INTO `question_views` VALUES ('62', '1d6641572e71fadd153d5582b0e16366', '95');
INSERT INTO `question_views` VALUES ('63', '1d6641572e71fadd153d5582b0e16366', '107');
INSERT INTO `question_views` VALUES ('64', '1d6641572e71fadd153d5582b0e16366', '103');
INSERT INTO `question_views` VALUES ('65', '1d6641572e71fadd153d5582b0e16366', '111');
INSERT INTO `question_views` VALUES ('66', '1d6641572e71fadd153d5582b0e16366', '102');
INSERT INTO `question_views` VALUES ('67', '1d6641572e71fadd153d5582b0e16366', '116');
INSERT INTO `question_views` VALUES ('68', '1d6641572e71fadd153d5582b0e16366', '110');
INSERT INTO `question_views` VALUES ('69', '1d6641572e71fadd153d5582b0e16366', '109');
INSERT INTO `question_views` VALUES ('70', '1d6641572e71fadd153d5582b0e16366', '99');
INSERT INTO `question_views` VALUES ('71', '1d6641572e71fadd153d5582b0e16366', '108');
INSERT INTO `question_views` VALUES ('72', '1d6641572e71fadd153d5582b0e16366', '105');
INSERT INTO `question_views` VALUES ('73', '981a8cb8dd20cf9da38f21dadee41dbf', '118');
INSERT INTO `question_views` VALUES ('74', '5da0ae75c4bfcc917997d09caa4f6b49', '95');
INSERT INTO `question_views` VALUES ('75', '5da0ae75c4bfcc917997d09caa4f6b49', '121');
INSERT INTO `question_views` VALUES ('76', '5da0ae75c4bfcc917997d09caa4f6b49', '108');
INSERT INTO `question_views` VALUES ('77', '981a8cb8dd20cf9da38f21dadee41dbf', '121');
INSERT INTO `question_views` VALUES ('78', '20f613335ab7e0cc924a107b623b0049', '103');
INSERT INTO `question_views` VALUES ('79', '20f613335ab7e0cc924a107b623b0049', '121');
INSERT INTO `question_views` VALUES ('80', '20f613335ab7e0cc924a107b623b0049', '102');
INSERT INTO `question_views` VALUES ('81', '20f613335ab7e0cc924a107b623b0049', '107');
INSERT INTO `question_views` VALUES ('82', '20f613335ab7e0cc924a107b623b0049', '95');
INSERT INTO `question_views` VALUES ('83', '20f613335ab7e0cc924a107b623b0049', '104');
INSERT INTO `question_views` VALUES ('84', '20f613335ab7e0cc924a107b623b0049', '120');
INSERT INTO `question_views` VALUES ('85', '20f613335ab7e0cc924a107b623b0049', '108');
INSERT INTO `question_views` VALUES ('86', '20f613335ab7e0cc924a107b623b0049', '105');
INSERT INTO `question_views` VALUES ('87', '265b1b9e4ff0b14dea67f1c064e1023e', '122');
INSERT INTO `question_views` VALUES ('88', '6a130107e67f20ccddf3518bb4ddf564', '121');
INSERT INTO `question_views` VALUES ('89', '913d7859508685d9524e0a6a7ed768bc', '121');
INSERT INTO `question_views` VALUES ('90', 'db296209cd0a9f57eb11518fa3b5a487', '121');
INSERT INTO `question_views` VALUES ('91', 'd7c91d8203fb415148e5ce2b3c6b244e', '98');
INSERT INTO `question_views` VALUES ('92', 'd7c91d8203fb415148e5ce2b3c6b244e', '107');
INSERT INTO `question_views` VALUES ('93', 'd7c91d8203fb415148e5ce2b3c6b244e', '124');
INSERT INTO `question_views` VALUES ('94', 'f5b0c68ddfdb29533fc9fbc697e5c799', '124');
INSERT INTO `question_views` VALUES ('95', 'ac03517cdde000d3a5655e9bfb13813a', '124');

-- ----------------------------
-- Table structure for `tag`
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `tag_id` int(64) NOT NULL auto_increment,
  `tag` varchar(256) NOT NULL,
  `question_id` int(255) NOT NULL,
  PRIMARY KEY  (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tag
-- ----------------------------
INSERT INTO `tag` VALUES ('62', 'asp', '98');
INSERT INTO `tag` VALUES ('63', ' java', '98');
INSERT INTO `tag` VALUES ('67', 'java', '102');
INSERT INTO `tag` VALUES ('69', 'java', '104');
INSERT INTO `tag` VALUES ('70', 'android', '105');
INSERT INTO `tag` VALUES ('71', 'java', '106');
INSERT INTO `tag` VALUES ('72', 'java', '107');
INSERT INTO `tag` VALUES ('73', 'matlab', '108');
INSERT INTO `tag` VALUES ('74', 'java', '109');
INSERT INTO `tag` VALUES ('86', 'java', '119');
INSERT INTO `tag` VALUES ('87', 'java', '120');
INSERT INTO `tag` VALUES ('88', 'asp', '121');
INSERT INTO `tag` VALUES ('89', '.net', '103');
INSERT INTO `tag` VALUES ('92', 'gdf', '124');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email_id` varchar(1024) NOT NULL,
  `sex` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `loyality` int(11) NOT NULL,
  `reputation` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('32', 'user11', 'cb45c671cbc500627ea424eea5f91996221b5935', 'user@gmail.com', '1', '1', '1', '0');
INSERT INTO `users` VALUES ('33', 'user2', '372ea08cab33e71c02c651dbc83a474d32c676ea', 'eges@egs.sgs', '1', '1', '0', '1');
INSERT INTO `users` VALUES ('34', 'user3', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'sfds@fas.dh', '2', '2', '0', '0');
INSERT INTO `users` VALUES ('35', 'user4', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'efgsd@egs.rd', '1', '2', '8', '-1');
INSERT INTO `users` VALUES ('44', 'tut01', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'tut@gmail,com', '1', '2', '0', '0');
INSERT INTO `users` VALUES ('37', 'user121', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'user@GMA.COM', '1', '2', '0', '0');
INSERT INTO `users` VALUES ('38', 'admin1', 'c6922b6ba9e0939583f973bc1682493351ad4fe8', 'admin@gmail.com', '1', '3', '-2', '0');
INSERT INTO `users` VALUES ('39', 'tutor', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'tutor@gmail.com', '1', '2', '0', '0');
INSERT INTO `users` VALUES ('41', 'user7', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'vsfav@efs.dfb', '1', '0', '0', '0');
INSERT INTO `users` VALUES ('42', 'user21', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'sgagr@rg.gsd', '2', '0', '0', '0');
INSERT INTO `users` VALUES ('43', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'danushkaj911@gmail.com', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for `voteduser`
-- ----------------------------
DROP TABLE IF EXISTS `voteduser`;
CREATE TABLE `voteduser` (
  `voted_user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  `question_answer_id` varchar(64) NOT NULL,
  `vote_type` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of voteduser
-- ----------------------------
INSERT INTO `voteduser` VALUES ('35', '1', 'q91', 'yes');
INSERT INTO `voteduser` VALUES ('35', '2', 'a46', 'yes');
INSERT INTO `voteduser` VALUES ('41', '3', 'q88', 'yes');
INSERT INTO `voteduser` VALUES ('41', '4', 'a48', 'yes');
INSERT INTO `voteduser` VALUES ('35', '7', 'a49', 'yes');
INSERT INTO `voteduser` VALUES ('35', '13', 'q101', 'yes');
INSERT INTO `voteduser` VALUES ('35', '51', 'q117', 'yes');
INSERT INTO `voteduser` VALUES ('35', '53', 'q116', 'yes');
INSERT INTO `voteduser` VALUES ('43', '55', 'q121', 'yes');
INSERT INTO `voteduser` VALUES ('43', '56', 'q107', 'yes');

DROP TABLE IF EXISTS `Test2`;
CREATE TABLE `Test2` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uniqueKey` varchar(255) NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Test2` (`id`, `uniqueKey`)
VALUES
  (1, 'existing-key'),
  (2, 'existing-key2'),
  (3, 'existing-key3');

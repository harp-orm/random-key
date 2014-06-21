DROP TABLE IF EXISTS `Test`;
CREATE TABLE `Test` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uniqueKey` varchar(255) NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Test` (`id`, `uniqueKey`)
VALUES
  (1, 'existing-key'),
  (2, 'existing-key2'),
  (3, 'existing-key3');

DROP TABLE IF EXISTS `feature_table`;
CREATE TABLE `feature_table` (
  `itemid` bigint(20) unsigned NOT NULL default '0',
  `attr` varchar(64) NOT NULL default '',
  `value` decimal(30,6) NOT NULL default '0',
  INDEX (  `itemid` ,  `attr` )
) TYPE=MyISAM COMMENT='分类特征类表';
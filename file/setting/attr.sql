DROP TABLE IF EXISTS `attr_table`;
CREATE TABLE `attr_table` (
  `itemid` bigint(20) unsigned NOT NULL default '0',
  PRIMARY KEY  (`itemid`)
) TYPE=MyISAM COMMENT='分类属性表';
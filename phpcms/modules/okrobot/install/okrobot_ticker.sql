DROP TABLE IF EXISTS `phpcms_okrobot_ticker`;
CREATE TABLE `phpcms_okrobot_ticker` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `buy` float(10,2) COMMENT '买一价',
    `high` float(10,2) COMMENT '最高价',
    `last_price` float(10,2) COMMENT '最新成交价',
    `low` float(10,2) COMMENT '最低价',
    `sell` float(10,2) COMMENT '卖一价',
    `base_rate` float(10,2) COMMENT '基准偏移率',
    `vol` float(10,2) COMMENT '最近24小时成交量' ,
    `tickerdate` varchar(256) COMMENT '服务器返回时间',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

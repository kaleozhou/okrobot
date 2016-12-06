DROP TABLE IF EXISTS `phpcms_okrobot_ticker`;
CREATE TABLE `phpcms_okrobot_ticker` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `buy` varchar(256) COMMENT '买一价',
    `high` varchar(256) COMMENT '最高价',
    `lastprice` varchar(256) COMMENT '最新成交价',
    `low` varchar(256) COMMENT '最低价',
    `sell` varchar(256) COMMENT '卖一价',
    `vol` varchar(256) COMMENT '最近24小时成交量' ,
    `tickerdate` varchar(256) COMMENT '服务器返回时间',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

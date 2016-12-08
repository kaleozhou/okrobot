DROP TABLE IF EXISTS `phpcms_okrobot_kline`;
CREATE TABLE `phpcms_okrobot_kline` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `create_date` varchar(256) COMMENT '时间',
    `start_price` varchar(256) COMMENT '开始价',
    `high_price` varchar(256)  COMMENT '最高价',
    `low_price` varchar(256) COMMENT '最低价',
    `over_price` varchar(256) COMMENT '收价',
    `dif_price` varchar(256) COMMENT '差价',
    `vol` varchar(256) COMMENT '成交量',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

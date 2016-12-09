DROP TABLE IF EXISTS `phpcms_okrobot_kline`;
CREATE TABLE `phpcms_okrobot_kline` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `create_date` varchar(256) COMMENT '时间',
    `start_price` float(10,2) COMMENT '开始价',
    `high_price` float(10,2)  COMMENT '最高价',
    `low_price` float(10,2) COMMENT '最低价',
    `over_price` float(10,2) COMMENT '收价',
    `dif_price` float(10,2) COMMENT '差价',
    `vol` float(10,2) COMMENT '成交量',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

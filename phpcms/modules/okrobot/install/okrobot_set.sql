DROP TABLE IF EXISTS `phpcms_okrobot_set`;
CREATE TABLE `phpcms_okrobot_set` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `base_price` varchar(256) COMMENT '基准价格',
    `uprate` varchar(256)  COMMENT '上浮率',
    `downrate` varchar(256) COMMENT '下浮率',
    `upline` varchar(256) COMMENT '上限制线',
    `downline` varchar(256) COMMENT '下限制线',
    `create_date`varchar(256) comment '时间',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `phpcms_okrobot_set`;
CREATE TABLE `phpcms_okrobot_set` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `baseprice` varchar(256) COMMENT '基准价格',
    `uprate` varchar(256) not null default 0.05 COMMENT '上浮率',
    `downrate` varchar(256) not null default 0.05 COMMENT '下浮率',
    `upline` varchar(256) COMMENT '上限制线',
    `downline` varchar(256) COMMENT '下限制线',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

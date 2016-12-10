DROP TABLE IF EXISTS `phpcms_okrobot_trend`;
CREATE TABLE `phpcms_okrobot_trend` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `last_trade_type` varchar(256) COMMENT '上次成交类型buy_1:普通上升，buy_2,上升到顶，sell_1:普通下降，sell_2：下降到底',
    `last_trade_hits` int(4) COMMENT '上次成交类型连击数',
    `create_date`varchar(256) comment '时间',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

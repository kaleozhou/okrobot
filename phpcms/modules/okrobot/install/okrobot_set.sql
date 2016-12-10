DROP TABLE IF EXISTS `phpcms_okrobot_set`;
CREATE TABLE `phpcms_okrobot_set` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `base_price` float(10,2) COMMENT '基准价格',
    `my_last_price` float(10,2) COMMENT '上次成交价价格',
    `unit` float(10,2) COMMENT '最小成交单位',
    `n_price` float(10,2) COMMENT '最小成交单位',
    `last_trade_type` varchar(256) COMMENT '上次成交类型buy_1:普通上升，buy_2,上升到顶，sell_1:普通下降，sell_2：下降到底',
    `last_trade_hits` int(4) COMMENT '上次成交类型连击数',
    `uprate` float(10,2)  COMMENT '上浮率',
    `downrate` float(10,2) COMMENT '下浮率',
    `upline` float(10,2) COMMENT '上限制线',
    `downline` float(10,2) COMMENT '下限制线',
    `create_date`varchar(256) comment '时间',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `phpcms_okrobot_orderinfo`;
CREATE TABLE `phpcms_okrobot_orderinfo` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `amount` varchar(256) COMMENT '委托数量',
    `create_date` varchar(256) COMMENT '委托时间',
    `avg_price` varchar(256) COMMENT '平均成交价',
    `deal_amount` varchar(256) COMMENT '成交数量',
    `order_id` varchar(256) COMMENT '订单id',
    `price` varchar(256) COMMENT '委托价格',
    `status` varchar(256) COMMENT '-1:已撤销  0:未成交  1:部分成交  2:完全成交 4:撤单处理中',
    `ordertype` varchar(256)COMMENT 'buy_market:市价买入 / sell_market:市价卖出',

    PRIMARY KEY (`id`)
) TYPE=MyISAM;

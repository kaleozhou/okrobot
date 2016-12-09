DROP TABLE IF EXISTS `phpcms_okrobot_trade`;
CREATE TABLE `phpcms_okrobot_trade` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `symbol` varchar(256) COMMENT 'btc_cny: 比特币 ltc_cny: 莱特币',
    `tradetype` varchar(256) COMMENT '买卖类型： 限价单（buy/sell） 市价单（buy_market/sell_market）',
    `price` float(10,2) COMMENT '下单价格 [限价买单(必填)： 大于等于0，小于等于1000000 | 市价买单(必填)： BTC :最少买入0.01个BTC 的金额(金额>0.01*卖一价) / LTC :最少买入0.1个LTC 的金额(金额>0.1*卖一价)]（市价卖单不传price,price无需加密sign）',
    `amount` float(10,4) COMMENT '交易数量 [限价卖单（必填）：BTC 数量大于等于0.01 / LTC 数量大于等于0.1 | 市价卖单（必填）： BTC :最少卖出数量大于等于0.01 / LTC :最少卖出数量大于等于0.1]（市价买单不传amount,amount无需加密sign）',
    `result` varchar(256) COMMENT 'true代表成功返回',
    `order_id` int(4) COMMENT '订单ID',

    PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `phpcms_okrobot_borrow`;
CREATE TABLE `phpcms_okrobot_borrow` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `borrow_btc` float(10,2) COMMENT '已借btc',
    `borrow_ltc` float(10,2) COMMENT '已借ltc',
    `borrow_cny` float(10,2) COMMENT '已借cny',
    `can_borrow` float(10,2) COMMENT '可借金额',
    `interest_btc` float(10,2) COMMENT '可借金额btc',
    `interest_ltc` float(10,2) COMMENT '可借金额ltc',
    `interest_cny` float(10,2) COMMENT '可借金额cny',
    `today_interest_btc` float(10,2) COMMENT '即日利息btc',
    `today_interest_ltc` float(10,2) COMMENT '今日利息ltc',
    `today_interest_cny` float(10,2) COMMENT '今日利息cny',
    `result` bool COMMENT '结果',
    `create_date` varchar(256) COMMENT '日期',

    PRIMARY KEY (`id`)
) TYPE=MyISAM;

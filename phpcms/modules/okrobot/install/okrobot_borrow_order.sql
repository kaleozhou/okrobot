DROP TABLE IF EXISTS `phpcms_okrobot_borrow_order`;
CREATE TABLE `phpcms_okrobot_borrow_order` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `amount` float(10,2) COMMENT '借款数量',
    `borrow_date` date COMMENT '借款日期',
    `borrow_id` int(4) COMMENT '借款单id',
    `days` int(4) COMMENT '借款天数',
    `rate` float(10,2) COMMENT '借款利率',
    `status` int(4) COMMENT '借款天数:0等待成交1部分成交2完全成交-1撤单',
    `symbol` varchar(256) COMMENT '借款类型',
    `create_date` varchar(256) COMMENT '日期',

    PRIMARY KEY (`id`)
) TYPE=MyISAM;

DROP TABLE IF EXISTS `phpcms_okrobot_userinfo`;
CREATE TABLE `phpcms_okrobot_userinfo` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `asset_net` float(10,2) COMMENT '净资产',
    `asset_total` float(10,2) COMMENT '账户资产',
    `borrow_btc` float(10,2) COMMENT 'btc借款',
    `borrow_cny` float(10,2) COMMENT '人民币借款',
    `borrow_ltc` float(10,2) COMMENT 'ltc借款',
    `free_btc` float(10,2) COMMENT 'btc可用余额',
    `free_cny` float(10,2) COMMENT '人民币可用余额',
    `free_ltc` float(10,2) COMMENT 'ltc可用余额',
    `freezed_btc` float(10,2) COMMENT 'btc冻结',
    `freezed_cny` float(10,2) COMMENT '人民币冻结',
    `freezed_ltc` float(10,2) COMMENT 'ltc冻结',
    `union_fund` varchar(256) COMMENT '账户理财信息',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

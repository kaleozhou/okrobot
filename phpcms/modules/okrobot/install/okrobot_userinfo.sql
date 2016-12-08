DROP TABLE IF EXISTS `phpcms_okrobot_userinfo`;
CREATE TABLE `phpcms_okrobot_userinfo` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `asset_net` varchar(256) COMMENT '净资产',
    `asset_total` varchar(256) COMMENT '账户资产',
    `borrow_btc` varchar(256) COMMENT 'btc借款',
    `borrow_cny` varchar(256) COMMENT '人民币借款',
    `borrow_ltc` varchar(256) COMMENT 'ltc借款',
    `free_btc` varchar(256) COMMENT 'btc可用余额',
    `free_cny` varchar(256) COMMENT '人民币可用余额',
    `free_ltc` varchar(256) COMMENT 'ltc可用余额',
    `freezed_btc` varchar(256) COMMENT 'btc冻结',
    `freezed_cny` varchar(256) COMMENT '人民币冻结',
    `freezed_ltc` varchar(256) COMMENT 'ltc冻结',
    `union_fund` varchar(256) COMMENT '账户理财信息',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

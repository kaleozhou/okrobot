DROP TABLE IF EXISTS `phpcms_okrobot_userinfo`;
CREATE TABLE `phpcms_okrobot_userinfo` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `asset_net` varchar(256) COMMENT '净资产',
    `asset_total` varchar(256) COMMENT '账户资产',
    `borrow_btc` varchar(256) COMMENT '账户借款信息',
    `borrow_cny` varchar(256) COMMENT '账户余额',
    `borrow_ltc` varchar(256) COMMENT '账户余额',
    `free_btc` varchar(256) COMMENT '账户余额冻结',
    `free_cny` varchar(256) COMMENT '账户余额冻结',
    `free_ltc` varchar(256) COMMENT '账户余额冻结',
    `freezed_btc` varchar(256) COMMENT '账户余额冻结',
    `freezed_cny` varchar(256) COMMENT '账户余额冻结',
    `freezed_ltc` varchar(256) COMMENT '账户余额冻结',
    `union_fund` varchar(256) COMMENT '账户理财信息',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

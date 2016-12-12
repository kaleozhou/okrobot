DROP TABLE IF EXISTS `phpcms_okrobot_sms`;
CREATE TABLE `phpcms_okrobot_sms` (
    `id` bigint(11) NOT NULL AUTO_INCREMENT,
    `create_date` varchar(256) COMMENT '时间',
    `username` varchar(256) COMMENT '用户名',
    `password` varchar(256)  COMMENT '密码',
    `phone` varchar(256) COMMENT '接受手机号',
    `content` varchar(256) COMMENT '内容',
    `result` bool COMMENT '结果',
    `sms_type` varchar(256) COMMENT '短信接口名称',
    PRIMARY KEY (`id`)
) TYPE=MyISAM;

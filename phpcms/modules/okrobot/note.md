#Okrobot的开发笔记
##功能
1. 如果订单号存在单条记录，不存在更新所有数据为status=1
- 设置系统运行参数，基数如浮动率，和上下限制，超过这个限制策略改变
- 订单公式：下降区间买，订单金额=可用余额****下降率-btc
- 添加k线数据，前一个小时的平均值。
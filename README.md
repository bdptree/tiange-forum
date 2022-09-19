# 天鸽社区论坛类开发模板
**体验地址:**
www.pgyer.com/tiange

**前端源码:**
https://ext.dcloud.net.cn/plugin?id=9532

**安装教程:**
1. 宝塔面板先添加站点
2. 创建数据库，导入给的数据库  
https://fudan.lanzoub.com/iF2Zc0bzea4f
密码:hma3
3. 上传源码  
https://fudan.lanzoub.com/i5xCb0bzeb3a
密码:c7bt
4. 在/public/config/database.php下配置数据库
5. 设置伪静态为thinkphp,运行目录为/public
6. 在/public/config/gate_worker.php下配置数据库,查看接口，在防火墙放行这个端口
7. 在SSH窗口输入：php-v (这步保证你的PHP版本在7.2+)
8. 在SSH窗口输入：cd /www/wwwroot/你的网站名
9. 在SSH窗口输入：php think worker:gateway (这步是开启websocket)
10. 在/www/wwwroot/你的网址/application/common/controller/FileController的网址改成你自己的

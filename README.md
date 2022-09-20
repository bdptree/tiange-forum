# 天鸽社区论坛类开发模板搭建指南
**项目名称:**
天鸽社区论坛类开发模板

**项目结构:**  
前端：uniapp+vue2  
后端：php

**项目预览及前端源码:**
https://ext.dcloud.net.cn/plugin?id=9532

**后端教程:**
1. 宝塔面板先添加站点
2. 创建数据库，导入给的数据库  
https://fudan.lanzoub.com/iF2Zc0bzea4f
3. 上传后台源码  
https://fudan.lanzoub.com/ihh2z0c17ykf
4. 在/public/config/database.php下配置数据库
5. 设置伪静态为thinkphp,运行目录为/public
6. 在/public/config/gate_worker.php下查看接口，在防火墙放行这个端口
7. 在SSH窗口输入：php-v (这步检查，建议使用的PHP版本不超过7.2)
8. 在SSH窗口输入：cd /www/wwwroot/你的网站名
9. 在SSH窗口输入：php think worker:gateway (这步是开启websocket)，成功时显示如下：
 ![2022-09-20_18-31-15.png](https://img1.imgtp.com/2022/09/20/7y4LawIJ.png)
10. 在/www/wwwroot/你的网址/application/common/controller/FileController的网址改成你自己的
11. 测试 https://你的网址/api/v1/post/1 如显示 {"msg":"获取成功","data":{"detail":null}} 即为后台配置成功
![2022-09-20_18-40-09.png](https://img1.imgtp.com/2022/09/20/U0Kb2aXm.png)
12. 这样你就可以搭建你的论坛了！

**Lisence:**  
MIT开源协议

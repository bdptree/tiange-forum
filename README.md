# **天鸽社区客户端论坛模板搭建指南**
# **项目名称:**
天鸽社区论坛类开发模板

# **项目结构:**  
前端：uniapp+vue2  
后端：php

# **更新记录 :** 
2.41（2022-09-23)  
1、修复2.4版本话题页出现的一些错误  
2、本版本后台仍然使用2.4版本的后台  

2.4（2022-09-23）  
1、编辑器可以自拟标题，标题和内容分离，而且正文字数提升到1万字  
2、增加了修改密码功能  
3、可以绑定微信，QQ及邮箱，以及在登录时可以使用邮箱号登录  
4、增加了搜索话题功能  
5、新的图文排布方式，浏览页面更加整齐  
  
2.3（2022-09-19）  
1、增加了二级回复功能，修复了评论区头像显示问题  
2、优化了界面显示，更加符合主流社交媒体平台的使用习惯  

# **平台兼容性 :**  
![image](https://user-images.githubusercontent.com/91184963/191243024-ef0ad224-e8a4-43f9-9feb-b02779041340.png)

# **项目预览及前端源码:**
https://ext.dcloud.net.cn/plugin?id=9532

# **后端教程:**
1. 宝塔面板先添加站点
2. 创建数据库，导入给的数据库  
https://fudan.lanzoub.com/iorbM0c16zqb
3. 上传后台源码  
2.4版本：https://fudan.lanzoub.com/iaMRo0c8m3gh  
2.3版本：https://fudan.lanzoub.com/iYgbW0c8mchc
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

# **开源协议:**   
MIT License

# **赞助我:** 
https://ext.dcloud.net.cn/plugin?id=9532  
![image](https://user-images.githubusercontent.com/91184963/191244575-7f696072-5a9c-48ee-97f2-65ec4fda15de.png)

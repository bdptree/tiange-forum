<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 不需要验证token
Route::group('api/:version/',function(){
    // 发送验证码
    Route::post('user/sendcode','api/:version.User/sendCode');
    // 手机登录
    Route::post('user/phonelogin','api/:version.User/phoneLogin');
    // 账号密码登录
    Route::post('user/login','api/:version.User/login');
    // 注册
    Route::post('user/reg','api/:version.User/reg');
    // 第三方登录
    Route::post('user/otherlogin','api/:version.User/otherLogin');
    // 获取文章分类
    Route::get('postclass', 'api/:version.PostClass/index');
    // 获取话题分类
    Route::get('topicclass','api/v1.TopicClass/index');
    // 获取热门话题
    Route::get('hottopic','api/v1.Topic/index');
    // 获取指定话题分类下的话题列表
    Route::get('topicclass/:id/topic/:page', 'api/v1.TopicClass/topic');
    // 获取文章详情
    Route::get('post/:id', 'api/v1.Post/index');
    // 获取指定话题下的文章列表
    Route::get('topic/:id/post/:page', 'api/v1.Topic/post')->middleware(['ApiGetUserid']);
    // 获取指定文章分类下的文章
    Route::get('postclass/:id/post/:page', 'api/v1.PostClass/post')->middleware(['ApiGetUserid']);
    // 获取指定用户下的文章
    Route::get('user/:id/post/:page', 'api/v1.User/post')->middleware(['ApiGetUserid']);
    // 搜索话题
    Route::post('search/topic', 'api/v1.Search/topic');
    // 搜索文章
    Route::post('search/post', 'api/v1.Search/post')->middleware(['ApiGetUserid']);
    // 搜索用户
    Route::post('search/user', 'api/v1.Search/user');
    // 广告列表
    Route::get('adsense/:type', 'api/v1.Adsense/index');
    // 获取当前文章的所有评论
    Route::get('post/:id/comment','api/v1.Post/comment');
    // 检测更新
    Route::post('update','api/v1.Update/update');
  // 获取关注的人的公开文章列表
     Route::get('followpost/:page','api/v1.Post/followPost')->middleware(['ApiGetUserid']);
  //  获取用户信息
    Route::post('getuserinfo','api/v1.User/getuserinfo')->middleware(['ApiGetUserid']);
  // 统计用户数据
    Route::get('user/getcounts/:user_id','api/v1.User/getCounts');
  // 微信小程序登录
    Route::post('wxlogin','api/v1.User/wxLogin');
  // 支付宝小程序登录
    Route::post('alilogin','api/v1.User/alilogin');
});

// 需要验证token
Route::group('api/:version/',function(){
    // 退出登录
    Route::post('user/logout','api/:version.User/logout');
    // 绑定手机
    Route::post('user/bindphone','api/v1.User/bindphone');
  // 判断当前用户第三方登录绑定情况
    Route::get('user/getuserbind','api/v1.User/getUserBind');
})->middleware(['ApiUserAuth']);

// 用户操作（绑定手机）
Route::group('api/:v1/',function(){
    // 上传多图
    Route::post('image/uploadmore','api/:v1.Image/uploadMore');
    // 发布文章
    Route::post('post/create','api/v1.Post/create');
    // 获取指定用户下的所有文章（含隐私）
    Route::get('user/post/:page', 'api/v1.User/Allpost');
    // 绑定邮箱
    Route::post('user/bindemail','api/v1.User/bindemail');
    // 绑定第三方
    Route::post('user/bindother','api/v1.User/bindother');
    // 用户顶踩
    Route::post('support', 'api/v1.Support/index');
    // 用户评论
    Route::post('post/comment','api/v1.Comment/comment');
    // 编辑头像
    Route::post('edituserpic','api/v1.User/editUserpic');
    // 编辑资料
    Route::post('edituserinfo','api/v1.User/editinfo');
    // 修改密码
    Route::post('repassword','api/v1.User/rePassword');
     // 加入黑名单
    Route::post('addblack','api/:v1.Blacklist/addBlack');
     // 移出黑名单
    Route::post('removeblack','api/:v1.Blacklist/removeBlack');
    // 关注
    Route::post('follow','api/v1.User/follow');
    // 取消关注
    Route::post('unfollow','api/v1.User/unfollow');
    // 互关列表
    Route::get('friends/:page','api/v1.User/friends');
    // 粉丝列表
    Route::get('fens/:page','api/v1.User/fens');
    // 关注列表
    Route::get('follows/:page','api/v1.User/follows');
    // 用户反馈
    Route::post('feedback','api/:v1.Feedback/feedback');
    // 获取用户反馈列表
    Route::get('feedbacklist/:page','api/:v1.Feedback/feedbacklist');
})->middleware(['ApiUserAuth','ApiUserBindPhone','ApiUserStatus']);


// socket 部分
Route::group('api/:v1/',function(){
    // 发送信息
    Route::post('chat/send','api/:v1.Chat/send');
    // 接收未接受信息
    Route::post('chat/get','api/:v1.Chat/get');
  // 绑定上线
    Route::post('chat/bind','api/:v1.Chat/bind');
})->middleware(['ApiUserAuth','ApiUserBindPhone','ApiUserStatus']);
<?php

namespace app\common\validate;

use think\Validate;

class UserValidate extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'phone'=>'require|mobile',
        'code'=>'require|number|length:4|isPefectCode',
        'username'=>'require',
        'password'=>'require|alphaDash',
        'repassword'=>'require|alphaDash',
        'provider'=>'require',
        'openid'=>'require',
        'nickName'=>'require',
        'avatarUrl'=>'require',
        'expires_in'=>'require',
        'id'=>'require|integer|>:0',
        'page'=>'require|integer|>:0',
        'email'=>'require|email',
        'userpic'=>'image',
        'name'=>'require|chsDash',
        'sex'=>'require|in:0,1,2',
        'qg'=>'require|in:0,1,2',
        'job'=>'require|chsAlpha',
        'birthday'=>'require|dateFormat:Y-m-d',
        'path'=>'require|chsDash',
        'oldpassword'=>'require',
        'newpassword'=>'require|alphaDash',
        'renewpassword'=>'require|confirm:newpassword',
        'follow_id'=>'require|integer|>:0|isUserExist',
        'user_id'=>'require|integer|>:0'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'phone.require'=>'请填写手机号码',
        'phone.mobile'=>'手机号码不合法'
    ];

    // 配置场景
    protected $scene = [
        // 发送验证码
        'sendCode'=>['phone'],
        // 手机号登录
        'phonelogin'=>['phone','code'],
        // 账号密码登录
        'login'=>['username','password'],
        'reg'=>['username','password','repassword'],
        // 第三方登录
        'otherlogin'=>['provider','openid','nickName','avatarUrl','expires_in'],
        'post'=>['id','page'],
        'allpost'=>['page'],
        'bindphone'=>['phone','code'],
        'bindemail'=>['email'],
        'bindother'=>['provider','openid','nickName','avatarUrl'],
        'edituserpic'=>['userpic'],
        'edituserinfo'=>['name','sex','qg','job','birthday','path'],
        'repassword'=>['oldpassword','newpassword','renewpassword'],
        'follow'=>['follow_id'],
        'unfollow'=>['follow_id'],
        'getfriends'=>['page'],
        'getfens'=>['page'],
        'getfollows'=>['page'],
    	'getuserinfo'=>['user_id']
    ];


}

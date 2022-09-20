<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use app\common\controller\BaseController;
use app\common\validate\UserValidate;
use app\common\model\User as UserModel;

class User extends BaseController
{
    // 发送验证码
    public function sendCode(){
        // 验证参数
        (new UserValidate())->goCheck('sendCode');
        // 发送验证码逻辑
        (new UserModel())->sendCode();
        return self::showResCodeWithOutData('发送成功');
    }

    // 手机号码登录
    public function phoneLogin(){
        // 验证登录信息
        (new UserValidate())->goCheck('phonelogin');
        // 手机登录
        $user = (new UserModel())->phoneLogin();
        return self::showResCode('登录成功',$user);
    }

    // 账号密码登录
    public function login(){
        // 验证登录信息
        (new UserValidate())->goCheck('login');
        // 登录
        $user = (new UserModel())->login();
        return self::showResCode('登录成功',$user);
    }
    
    // 注册
    public function reg(){
        // 验证登录信息
        (new UserValidate())->goCheck('reg');
        // 登录
        $user = (new UserModel())->reg();
        return self::showResCode('注册成功',$user);
    }

    // 第三方登录
    public function otherLogin(){
        // 验证登录信息
        (new UserValidate())->goCheck('otherlogin');
        $user =(new UserModel())->otherlogin();
        return self::showResCode('登录成功',$user);
    }

    // 退出登录
    public function logout(){
        (new UserModel())->logout();
        return self::showResCodeWithOutData('退出成功');
    }

    // 用户发布文章列表
    public function post(){
        (new UserValidate())->goCheck('post'); 
        $list = (new UserModel())->getPostList();
        return self::showResCode('获取成功',['list'=>$list]);
    }

    // 用户发布文章列表
    public function Allpost(){
        (new UserValidate())->goCheck('allpost'); 
        $list = (new UserModel())->getAllPostList();
        return self::showResCode('获取成功',['list'=>$list]);
    }

    // 绑定手机
    public function bindphone(){
        (new UserValidate())->goCheck('bindphone');
        $user = (new UserModel())->bindphone();
        return self::showResCode('获取成功',$user);
    }

    // 绑定邮箱
    public function bindemail(){
        (new UserValidate())->goCheck('bindemail');
        (new UserModel())->bindemail();
        return self::showResCodeWithOutData('绑定成功');
    }

    // 绑定第三方
    public function bindother(){
        (new UserValidate())->goCheck('bindother');
        (new UserModel())->bindother();
        return self::showResCodeWithOutData('绑定成功');
    }

    // 修改头像
    public function editUserpic(){
        (new UserValidate())->goCheck('edituserpic');      
        $src = (new UserModel())->editUserpic();
        return self::showResCode('修改头像成功',$src);
    }

    // 修改资料
    public function editinfo(){
        (new UserValidate())->goCheck('edituserinfo');
        (new UserModel())->editUserinfo();
        return self::showResCodeWithOutData('修改成功');
    }

    // 修改密码
    public function rePassword(){
        (new UserValidate())->goCheck('repassword'); 
        (new UserModel())->repassword();
        return self::showResCodeWithOutData('修改密码成功');
    }
    
    // 关注
    public function follow(){
        (new UserValidate())->goCheck('follow'); 
        (new UserModel())->ToFollow();
        return self::showResCodeWithOutData('关注成功');
    }

    // 取消关注
    public function unfollow(){
        (new UserValidate())->goCheck('unfollow'); 
        (new UserModel())->ToUnFollow();
        return self::showResCodeWithOutData('取消关注成功');
    }

    // 互关列表
    public function friends(){
        (new UserValidate())->goCheck('getfriends'); 
        $list = (new UserModel())->getFriendsList();
        return self::showResCode('获取成功',['list'=>$list]);
    }

    // 粉丝列表
    public function fens(){
        (new UserValidate())->goCheck('getfens'); 
        $list = (new UserModel())->getFensList();
        return self::showResCode('获取成功',['list'=>$list]);
    }

    // 关注列表
    public function follows(){
        (new UserValidate())->goCheck('getfollows'); 
        $list = (new UserModel())->getFollowsList();
        return self::showResCode('获取成功',['list'=>$list]);
    }

   // 统计获取用户相关数据（总文章数，今日文章数，评论数 ，关注数，粉丝数，文章总点赞数）
    public function getCounts(){
      (new UserValidate())->goCheck('getuserinfo'); 
        $user = (new UserModel())->getCounts();
        return self::showResCode('获取成功',$user);
    }
  
  
  // 判断当前用户userid的第三方登录绑定情况
    public function getUserBind(){
        $user = (new UserModel())->getUserBind();
        return self::showResCode('获取成功',$user);
    }
  
  // 获取用户详细信息
    public function getuserinfo(){
        (new UserValidate())->goCheck('getuserinfo'); 
        $data = (new UserModel())->getUserInfo();
        return self::showResCode('获取成功',$data);
    }
  
  	// 微信小程序登录
  	public function wxLogin(Request $request){
        $url = "https://api.weixin.qq.com/sns/jscode2session";
        // 参数
        $params['appid']= config('api.wx.appid');
        $params['secret']=  config('api.wx.secret');
        $params['js_code']= $request -> param('code');
        $params['grant_type']= 'authorization_code';
        // 微信API返回的session_key 和 openid
        $arr = httpWurl($url, $params, 'POST');
        $arr = json_decode($arr,true);
        // 判断是否成功
        if(isset($arr['errcode']) && !empty($arr['errcode'])){
            return self::showResCodeWithOutData($arr['errmsg']);
        }
        // 拿到数据
        $request->provider = 'weixin';
        $request->openid = $arr['openid'];
      	$request->expires_in = 1000000;
        $user =(new UserModel())->otherlogin();
        return self::showResCode('登录成功',$user);
    }

  
  	//支付宝小程序登录
    public function alilogin(){
        $code = request()->code;
        include_once(__DIR__.'/../../../../extend/alipaySdk/AopSdk.php');
        //初始化
        $aop = new \AopClient();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = config('api.alipay.appid');
        //私钥
        $aop->rsaPrivateKey = config('api.alipay.PrivateKey');
        //公钥
        $aop->alipayrsaPublicKey = config('api.alipay.PublicKey');
        $aop->format = 'json';
        $aop->charset = 'UTF-8';
        $aop->signType = 'RSA2';
        //$aop->apiVersion = '1.0';
        $request = new \AlipaySystemOauthTokenRequest();
        $request->setGrantType("authorization_code");
        $request->setCode($code);
        $result = $aop->execute($request);
        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $resultData = (array) $result->$responseNode;
        //获取用户信息
        //$request = new \AlipayUserInfoShareRequest ();
        //$result = $aop->execute ($request, $resultData['access_token']);
        //$responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        //$userData = (array) $result->$responseNode;
        //halt($userData);//用户公开信息

        // 拿到数据
        $req = request();
        $req->provider = 'alipay';
        $req->openid = $resultData['alipay_user_id'];
      	$req->expires_in = 1000000;

        $user =(new UserModel())->otherlogin();
        return self::showResCode('登录成功',$user);
    }
  
}

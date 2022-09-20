<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use app\common\controller\BaseController;
use app\common\validate\ChatValidate;
use GatewayWorker\Lib\Gateway;
use think\facade\Cache;

class Chat extends BaseController
{

    // 初始化registerAddress
    public function __construct(){
        Gateway::$registerAddress = config('gateway_worker.registerAddress');
    }


    // 接收未接收信息
    public function get(Request $request){
        // 判断当前用户是否在线
        if (!Gateway::isUidOnline($request->userId)) return self::showResCode('ok',[]);
        // 获取并清除所有未接收信息
        $Cache = Cache::pull('userchat_'.$request->userId);
        if (!$Cache || !is_array($Cache)) return self::showResCode('ok',[]);
        // 开始推送
        return self::showResCode('ok',$Cache);
    }

    // 发送信息
    public function send(Request $request){
        // 1. 验证数据是否合法
        (new ChatValidate)->goCheck('send');
        // 2. 组织数据
        $data = $this->resdata($request);
        $to_id = $request->to_id;
        // 3. 验证对方用户是否在线
        if (Gateway::isUidOnline($to_id)) {
            // 直接发送
            Gateway::sendToUid($to_id,json_encode($data));
            // 写入数据库
            // 返回发送成功
            return self::showResCodeWithOutData('ok');
        }
        // 不在线，写入消息队列
        // 获取之前消息
        $Cache = Cache::get('userchat_'.$to_id);
        if (!$Cache || !is_array($Cache)) $Cache = [];
        $Cache[] = $data;
        // 写入数据库
        // 写入消息队列（含id）
        Cache::set('userchat_'.$to_id,$Cache);
        return self::showResCodeWithOutData('ok',200);
    }


    // 组织数据
    public function resdata($request){
        return [
            'to_id'=>$request->to_id,
            'from_id'=>$request->userId,
           'from_username'=>$request->from_username,
            'from_userpic'=>$request->from_userpic,
            'type'=>$request->type,
            'data'=>$request->data,
            'time'=>time()
        ];
    }
  
  	// 绑定上线
  	public function bind(Request $request){
        //{ token:"5fe5a0d48aea3c07846eaa5cca984f09336d65e8",type:"bind",client_id:"7f0000010b5700000001"}';
        // 验证当前用户是否绑定手机号，状态等信息，验证数据合法性
        (new ChatValidate)->goCheck('bind');
        $userId = $request->userId;
        $client_id = $request->client_id;
        // 验证client_id合法性
        if (!Gateway::isOnline($client_id)) return TApiException('clientId不合法');
        // 验证当前客户端是否已经绑定
        if (Gateway::getUidByClientId($client_id)) return TApiException('已被绑定');
        // 直接绑定
        Gateway::bindUid($request->client_id,$userId);
        // 返回成功
        return self::showResCode('绑定成功',['type'=>'bind','status'=>true]);
    }

}

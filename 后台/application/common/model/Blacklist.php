<?php

namespace app\common\model;

use think\Model;

class Blacklist extends Model
{
    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    // 加入黑名单
    public function addBlack(){
        $param = request()->param();
        $user_id = request()->userId;
        $black_id = $param['id'];
        // 不能拉黑自己
        if ($user_id == $black_id) TApiException('非法操作',50000,200);
        $arr = [ 'user_id'=>$user_id, 'black_id'=>$black_id ];
        // 已经存在该记录
        if ($this->where($arr)->find()) TApiException('对方已被你拉黑过',40001,200);
        // 直接创建
        if (!$this->create($arr)) TApiException();
        return true;
    }

    // 移出黑名单
    public function removeBlack(){
        $param = request()->param();
        $user_id = request()->userId;
        $black_id = $param['id'];
        // 不能操作自己
        if ($user_id == $black_id) TApiException('非法操作',50000,200); 
        $black = $this->where([ 
            'user_id'=>$user_id, 
            'black_id'=>$black_id 
        ])->find();
        // 记录不存在
        if (!$black) TApiException('对方已不在你的黑名单内',40002,200);
        // 直接删除
        if (!$black->delete()) TApiException();
        return true;
    }

}

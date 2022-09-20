<?php

namespace app\common\model;

use think\Model;

class Support extends Model
{
    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    // 用户顶踩文章
    public function UserSupportPost(){
        $param = request()->param();
        // 获得用户id
        $userid = request()->userId;
        // 判断是否已经顶踩过
        $support = $this->where(['user_id'=>$userid,'post_id'=>$param['post_id']])->find();
        // 已经顶踩过，判断当前操作是否相同
        if ($support) {
            if ($support['type'] == $param['type']) TApiException('请勿重复操作',40000,200);
            // 修改本条信息
            return self::update(['id'=>$support['id'],'type'=>$param['type']]);
        }
        // 直接创建
        return $this->create([
            'user_id'=>$userid,
            'post_id'=>$param['post_id'],
            'type'=>$param['type']
        ]);
    }
}

<?php

namespace app\common\model;

use think\Model;

class Update extends Model
{
    // 检测更新
    public function appUpdate(){
        $version = request()->param('ver');
        $res = $this->where('status',1)->order('create_time','desc')->find();
        // 无记录
        if (!$res) TApiException('暂无更新版本');
        // 当前就是最新版本
        if ( $res['version'] == $version ) TApiException('暂无更新版本');
        return $res;
    }
}

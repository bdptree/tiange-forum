<?php

namespace app\common\model;

use think\Model;

class Adsense extends Model
{
    // 获取广告列表
    public function getList(){
        $param = request()->param();
        return $this->where('type',$param['type'])->select();
    }
}

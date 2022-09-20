<?php

namespace app\common\model;

use think\Model;

class TopicClass extends Model
{
    // 获取所有话题分类
    public function getTopicClassList(){
        return $this->field('id,classname')->where('status',1)->select();
    }

    // 关联话题
    public function topic(){
        return $this->hasMany('Topic');
    }

    // 获取指定话题分类下的话题（分页）
    public function getTopic(){
        // 获取所有参数
        $param = request()->param();
        return self::get($param['id'])->topic()->withCount(['post','todaypost'])->page($param['page'],10)->select();
    }
}

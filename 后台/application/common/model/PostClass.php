<?php

namespace app\common\model;

use think\Model;

class PostClass extends Model
{
    // 获取所有文章分类
    public function getPostClassList(){
        return $this->field('id,classname')->where('status',1)->select();
    }

    // 关联文章模型
    public function post(){
        return $this->hasMany('Post');
    }

    // 获取指定分类下的文章（分页）
    public function getPost(){
        // 获取所有参数
        $param = request()->param();
        // 当前用户id
        $userId = request()->userId ? request()->userId : 0;
       return self::get($param['id'])->post()->with([
            'user'=>function($query) use($userId){
                return $query->field('id,username,userpic')->with([
                    'fens'=>function($query) use($userId){
                        return $query->where('user_id',$userId)->hidden(['password']);
                    },
                  	'userinfo'
                ]);
            },'images'=>function($query){
                return $query->field('url');
            },'share'
            ,'support'=>function($query) use($userId){
                return $query->where('user_id',$userId);
            }])->withCount(['Ding','Cai','comment'])->page($param['page'],10)->order('create_time','desc')->select();
    }
}

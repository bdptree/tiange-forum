<?php

namespace app\common\model;

use think\Model;

class Topic extends Model
{
    // 获取热门话题列表
    public function gethotlist(){
        return $this->where('type',1)->withCount(['post','todaypost'])->limit(10)->select()->toArray();
    }

    // 关联文章
    public function post(){
        return $this->belongsToMany('Post','topic_post');
    }

  	// 关联今日文章
    public function todaypost()
    {
        return $this->belongsToMany('Post','topic_post')->whereTime('post.create_time', 'today');
    }
  
    // 获取指定话题下的文章（分页）
    public function getPost(){
        // 获取所有参数
        $param = request()->param();
        // 当前用户id
        $userId = request()->userId ? request()->userId : 0;
        $posts = self::get($param['id'])->post()->page($param['page'],10)->select();
        $arr = [];
        for ($i=0; $i < count($posts); $i++) { 
            $arr[] = \app\common\model\Post::with([
            'user'=>function($query) use($userId){
                return $query->field('id,username,userpic')->with([
                    'fens'=>function($query) use($userId){
                        return $query->where('user_id',$userId)->hidden(['password']);
                    },'userinfo'
                ]);
            },'images'=>function($query){
                return $query->field('url');
            },'share',
            'support'=>function($query) use($userId){
                return $query->where('user_id',$userId);
            }])->withCount(['Ding','Cai','comment'])->get($posts[$i]->id)->toArray();
        }
        return $arr;
    }

    // 根据标题搜索话题
    public function Search(){
        // 获取所有参数
        $param = request()->param();
        return $this->where('title','like','%'.$param['keyword'].'%')->withCount(['post','todaypost'])->page($param['page'],10)->select();
    }

}

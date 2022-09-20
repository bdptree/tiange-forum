<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use app\common\controller\BaseController;
use app\common\validate\SearchValidate;

use app\common\model\Topic as TopicModel;
use app\common\model\Post as PostModel;
use app\common\model\User as UserModel;

class Search extends BaseController
{
    // 搜索话题
    public function topic(){
        (new SearchValidate())->goCheck();
        $list = (new TopicModel())->Search();
        return self::showResCode('获取成功',['list'=>$list]);
    }

    // 搜索文章
    public function post(){
        (new SearchValidate())->goCheck();
        $list = (new PostModel())->Search();
        return self::showResCode('获取成功',['list'=>$list]);
    }

    // 搜索用户
    public function user(){
        (new SearchValidate())->goCheck();
        $list = (new UserModel())->Search();
        return self::showResCode('获取成功',['list'=>$list]);
    }
}

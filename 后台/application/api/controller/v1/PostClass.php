<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use app\common\model\PostClass as PostClassModel;
use app\common\controller\BaseController;
use app\common\validate\TopicClassValidate;
class PostClass extends BaseController
{

    public function index()
    {
        // 获取文章分类列表
        $list=(new PostClassModel)->getPostClassList();
        return self::showResCode('获取成功',['list'=>$list]);
    }

    // 获取指定分类下的文章
    public function post()
    {
        // 验证分类id和分页数
        (new TopicClassValidate())->goCheck();
        $list=(new PostClassModel)->getPost();
        return self::showResCode('获取成功',['list'=>$list]);
    }
    
}

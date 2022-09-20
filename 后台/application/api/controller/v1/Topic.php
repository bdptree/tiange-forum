<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use app\common\controller\BaseController;
use app\common\model\Topic as TopicModel;
use app\common\validate\TopicClassValidate;
class Topic extends BaseController
{
    // 获取10个话题
    public function index()
    {
        $list = (new TopicModel())->gethotlist();
        return self::showResCode('获取成功',['list'=>$list]);
    }

    // 获取指定话题下的文章列表
    public function post()
    {
        // 验证分类id和分页数
        (new TopicClassValidate())->goCheck();
        $list=(new TopicModel)->getPost();
        return self::showResCode('获取成功',['list'=>$list]);
    }
}

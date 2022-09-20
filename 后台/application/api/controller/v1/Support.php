<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use app\common\controller\BaseController;
use app\common\model\Support as SupportModel;
use app\common\validate\SupportValidate;

class Support extends BaseController
{
    // 用户顶踩
    public function index(){
        (new SupportValidate())->goCheck();
        (new SupportModel())->UserSupportPost();
        return self::showResCodeWithOutData('ok');
    }
}

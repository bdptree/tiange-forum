<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use app\common\controller\BaseController;
use app\common\validate\FeedbackValidate;
use app\common\model\Feedback as FeedbackModel;

class Feedback extends BaseController
{
    // 反馈信息
    public function feedback(){
        (new FeedbackValidate())->goCheck('feedback');
        (new FeedbackModel())->feedback();
        return self::showResCodeWithOutData('反馈成功');
    }

    // 获取用户反馈列表
    public function feedbacklist(){
        (new FeedbackValidate())->goCheck('feedbacklist');
        $list = (new FeedbackModel())->feedbacklist();
        return self::showResCode('获取成功',[ 'list' => $list ]);
    }
}

<?php

namespace app\common\validate;

use think\Validate;

class FeedbackValidate extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'data'=>'require|NotEmpty',
        'page'=>'require|integer|>:0'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];

    protected $scene = [
        'feedback'=>['data'],
        'feedbacklist'=>['page']
    ];
}

<?php

namespace app\common\validate;

use think\Validate;

class CommentValidate extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'fid'=>'require|integer|>:-1|isCommentExist',
        'data'=>'require',
        'post_id'=>'require|integer|>:0|isPostExist',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];
}

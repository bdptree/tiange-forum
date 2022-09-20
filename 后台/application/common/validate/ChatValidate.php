<?php

namespace app\common\validate;

use think\Validate;

class ChatValidate extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
    protected $rule = [
        'to_id'=>'require|isUserExist',
        'from_userpic'=>'require',
        'type'=>'require',
        'data'=>'require',
     	 'client_id'=>'require'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];

    protected $scene = [
        'send'=>['to_id','from_userpic','type','data'],
      	'bind'=>['type','client_id']
    ];
}

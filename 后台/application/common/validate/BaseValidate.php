<?php
namespace app\common\validate;
use think\Validate;
use app\lib\exception\BaseException;

class BaseValidate extends Validate
{
    public function goCheck($scene = false){
         // 获取请求传递过来的所有参数
         $params = request()->param();
         // 开始验证
         $check = $scene ?
                $this->scene($scene)->check($params):
                $this->check($params);
         if (!$check) {
            throw new BaseException(['msg'=>$this->getError(),'errorCode'=>10000,'code'=>400]);
         }
         return true;
    }

    // 验证码验证
    protected function isPefectCode($value, $rule='', $data='', $field='')
    {
        // 验证码不存在
        $beforeCode = cache($data['phone']);
        if(!$beforeCode) return "请重新获取验证码";
        // 验证验证码
        if($value != $beforeCode) return "验证码错误";
        return true;
    }

    // 话题是否存在
    protected function isTopicExist($value, $rule='', $data='', $field='')
    {
        if ($value==0) return true;
        if (\app\common\model\Topic::field('id')->find($value)) {
            return true;
        }
        return "该话题已不存在";
    }

    // 文章分类是否存在
    protected function isPostClassExist($value, $rule='', $data='', $field='')
    {
        if (\app\common\model\PostClass::field('id')->find($value)) {
            return true;
        }
        return "该文章分类已不存在";
    }

    // 文章是否存在
    protected function isPostExist($value, $rule='', $data='', $field='')
    {
        if (\app\common\model\Post::field('id')->find($value)) {
            return true;
        }
        return "该文章已不存在";
    }

    // 用户是否存在
    protected function isUserExist($value, $rule='', $data='', $field='')
    {
        if (\app\common\model\User::field('id')->find($value)) {
            return true;
        }
        return "该用户已不存在";
    }

    // 评论是否存在
    protected function isCommentExist($value,$rule='',$data='',$field='')
    {
        if ($value==0) return true;
        if (\app\common\model\Comment::field('id')->find($value)) return true;
        return "回复的评论已不存在";
    }

    // 不能为空
    protected function NotEmpty($value, $rule='', $data='', $field='')
    {
        if (empty($value)) return $field."不能为空";
        return true;
    }

}

<?php

namespace app\common\model;

use think\Model;

class Userinfo extends Model
{
    public function getAgeAttr($value,$data)
    {
        // 计算年龄
        if (!$data['birthday']) {
            return 0; 
        }
        $age = strtotime($data['birthday']); 
        list($y1,$m1,$d1) = explode("-",date("Y-m-d",$age)); 
        $now = strtotime("now"); 
        list($y2,$m2,$d2) = explode("-",date("Y-m-d",$now)); 
        $age = $y2 - $y1; 
        if((int)($m2.$d2) < (int)($m1.$d1)) 
        $age -= 1; 
        return $age; 
    }
}

<?php

namespace app\common\controller;
use think\Request;

class FileController
{
    // 上传单文件
    static public function UploadEvent($files,$size = '20678000',$ext = 'jpg,png,gif,jpeg',$path = 'uploads')
    {
        $info = $files->validate(['size'=>$size,'ext'=>$ext])->move($path);
        return [
            'data'=> $info ? 'https://cloud.ourcolu.com/'.$info->getPathname() : $files->getError(),
            'status'=> $info ? true :false
        ];
    }

}
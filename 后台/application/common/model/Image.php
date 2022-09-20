<?php

namespace app\common\model;

use think\Model;

class Image extends Model
{
    // 自动写入时间
    protected $autoWriteTimestamp = true;

    // 上传多图
    public function uploadMore(){
        $image = $this->upload(request()->userId,'imglist');
        for ($i=0; $i < count($image); $i++) { 
            $image[$i]['url'] = getFileUrl($image[$i]['url']);
        }
        return $image;
    }

  
  public function getUrlAttr($value){
        if (strpos($value,'https') === false) {
            // 不包含
            $value = getFileUrl($value);
        }
        return $value;
    }
  
  
    // 上传图片
    public function upload($userid = '',$field = ''){
        // 获取图片
        $files = request()->file($field);
        if (is_array($files)) {
            // 多图上传
            $arr = [];
            foreach($files as $file){
                $res = \app\common\controller\FileController::UploadEvent($file);
                if ($res['status']) {
                    $arr[] = [
                        'url'=>$res['data'],
                        'user_id'=>$userid
                    ];
                }
            }
            return $this->saveAll($arr);
        }
        // 单图上传
        if(!$files) TApiException('请选择要上传的图片',10000,200);
        // 单文件上传
        $file = \app\common\controller\FileController::UploadEvent($files);
        // 上传失败
        if(!$file['status']) TApiException($file['data'],10000,200);
        // 上传成功，写入数据库
        return self::create([
            'url'=>$file['data'],
            'user_id'=>$userid
        ]);
    }

    // 图片是否存在
    public function isImageExist($id,$userid){
        return $this->where('user_id',$userid)->find($id);
    }
    
    // 获取文件完整url
    function getFileUrl($url='')
    {
        if (!$url) return;
        return url($url,'',false,true);
    }

}

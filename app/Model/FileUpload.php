<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
   public $savePath; //文件存储路径
   public $maxSize=0;//允许上传文件最大值（默认0表示不限）
   public $exts = array(); //允许上传文件类型默认空数组表示不限
   public $upfile=array(); //被上传文件基本信息
   public $savename; //上传成功后的文件名
   public $error; //上文件的错误信息
   
   //构造方法
   public function __construct($upfiles)
   {    
       //获取上传文件信息
       $this->upfile = array_shift($upfiles);
   }
   
   //判断上传错误号
   private function checkError()
   {
       if($this->upfile['error']>0){
            switch($this->upfile['error']){
                case 1: $error = "上传的文件超过了php.ini的配置"; break;
                case 2: $error = "上传文件的大小超过了HTML表单配置"; break;
                case 3: $error = "文件只有部分被上传"; break;
                case 4: $error = "没有文件被上传"; break;
                case 6: $error = "找不到临时文件夹"; break;
                case 7: $error = "文件写入失败"; break;
                default: $error = "未知错误！"; break;
            }
            $this->error = $error;
            return false;
        }
        return true;
   }
   
    //判断过滤上传文件类型
    private function checkType()
    {
        if(count($this->exts)>0){
            //判断类型是否不在typelist中
            if(!in_array($this->upfile['type'],$this->exts)){
               $this->error = '文件类型不符！';
               return false;
            }
        }
        return true;
    }
    
    //判断过滤上传文件大小
    private function checkSize()
    {
        if($this->maxSize>0 && $this->upfile['size']>$this->maxSize){
            $this->error = '文件大小超出范围！';
            return false; 
        }
        return true;
    }
    
    //获取错误信息
    public function getError()
    {
        return $this->error;
    }
    
    //随机上传文件名
    private function getName()
    {
        $ext = pathinfo($this->upfile['name'],PATHINFO_EXTENSION);//获取上传文件的后缀名
        do{
            $this->savename = date("YmdHis").rand(1000,9999).".".$ext; //随机文件名
        }while(file_exists($this->savePath.$this->savename)); //判断是否存在
        
        return true;
    }
    
   //执行上传的方法
   public function upload()
   {
       //处理上传路径
       $this->savePath = rtrim($this->savePath,"/")."/";
       //执行上传处理
       if($this->checkError() && $this->checkType() && $this->checkSize() && $this->getName()){
           if(is_uploaded_file($this->upfile['tmp_name'])){
                //执行上传文件移动
                if(move_uploaded_file($this->upfile['tmp_name'],$this->savePath.$this->savename)){
                    return true;
                }else{
                    $this->error = "移动上传文件失败！";
                }
            }else{
                $this->error = "不是有效的上传文件";
            }
       }
       return false;
   }   
}

/*
//使用
//实例化
$upfile = new FileUpload();

//初始化上传信息
$upfile->savePath = "./uploads/";
$upfile->maxSize = 0;
$upfile->exts = array("image/jpeg","image/gif","image/png");

//执行上传
$b = $upfile->upload();

//处理结果
if(!$b){
   echo "上传失败！原因：".$upfile->getError(); 
}else{
   echo "上传成功！文件名：".$upfile->savename;
}
*/

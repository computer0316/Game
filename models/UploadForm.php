<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;


/*
 * 文件上传类
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [
            	['imageFiles'], 
            	'file', 
            	'skipOnEmpty' => true, 
            	'extensions' => 'png, jpg', 
            	'maxFiles' => 10,
            ],
        ];
    }
    
    public function upload()
    {
    	$filepaths = [];
        if ($this->validate()) { 
        	$path = $this->createPath();
            foreach ($this->imageFiles as $file) {
            	$filepath = $path . $this->createFilename($path, $file->extension);
            	$filepaths[] = $filepath;
                $file->saveAs($filepath);
            }
            return $filepaths;
        } else {
            return false;
        }
    }
    
    // 生成一个路径
    // 路径以 uploads/ 开头
    // 后面依次是：用户ID/年/月/
    private function createPath(){
    	$baseDir= "uploads" ;
    	$year	= date("Y");
    	$month	= date("m");    	
    	$day	= date("d");
    	if(!file_exists($baseDir)){
    		mkdir($baseDir, 0777, true);    		
    	}
    	
    	$baseDir = $baseDir . "/" . $year;    	
    	if(!file_exists($baseDir)){
    		mkdir($baseDir, 0777, true);    		
    	}
    	
    	$baseDir = $baseDir . "/" . $month;
    	if(!file_exists($baseDir)){
    		mkdir($baseDir, 0777, true);
    	}

    	$baseDir = $baseDir . "/" . $day;
    	if(!file_exists($baseDir)){
    		mkdir($baseDir, 0777, true);
    	}
    	return $baseDir . '/';
    }
    
    // 生成一个有效的文件名
    // 构成：时-分-秒-5位数字序号.扩展名
    // 如：10-21-33-00002.jpg
    private function createFilename($path, $ext){
    	$time	= date("His");
    	$i = 0;
    	$filepath = $path . $time . str_pad($i, 2, "0", STR_PAD_LEFT) . '.' . $ext;
    	while(file_exists($filepath)){
    		$i++;
    		$filepath =  $path . $time . str_pad($i, 2, "0", STR_PAD_LEFT) . '.' . $ext;    		
    	}
    	return $time . str_pad($i, 2, "0", STR_PAD_LEFT) . '.' . $ext;
    }
}
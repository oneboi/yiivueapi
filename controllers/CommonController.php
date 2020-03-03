<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\common\utils\FileUpload;
// 首页控制器
class CommonController extends BaseController
{
    
    public function actionIndex()
    {
    
        $this->fileUpload();

    }

    
    //本地上传
	private function fileUpload()
	{
		$basePath = Yii::$app->basePath;
		$basePath=Yii::getAlias('@webroot');
		$filePath = $this->getFilePath($this->request('uptype'));
		$filePath = '/data/'.$filePath; 	
		$upload = new FileUpload();
		$res = $upload->upload('file',$basePath.$filePath);
		if($res){
			$fileName = $upload->getFileName();
			$data = array('url'=>'http://'.$_SERVER['HTTP_HOST'].$filePath.'/'.$fileName);
			$this->out('上传成功',$data);
		}
		$this->error('上传失败'.$upload->getErrorMsg());		
	}

		//图片存放路径
	private function getFilePath($upType)
	{
		switch ($upType) {
			case '1':
				$filePath = 'upload/avatar';	
				break;
			
			default:
				$filePath = 'upload/avatar';	
				break;
		}
		return $filePath;
			
	}



}

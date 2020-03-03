<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
// 首页控制器
class IndexController extends Controller
{
    
    public function actionIndex()
    {
        return Yii::$app->getVersion();
    }

    
}

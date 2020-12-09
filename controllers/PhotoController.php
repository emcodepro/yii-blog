<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Uploader;
use yii\web\UploadedFile;
use Yii;

class PhotoController extends Controller
{

  public function actionIndex()
  {
    $model = new Uploader();
    if(Yii::$app->request->isPost)
    {
      $file = UploadedFile::getInstance($model,'image');

      $model->fileSave($file);
      //$file->saveAs(Yii::getAlias('@web') . 'uploads/' . $file->name);
      //die(debug());
    }
    return $this->render('index', ['model' => $model]);
  }
}

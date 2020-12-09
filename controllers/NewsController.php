<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\News;

class NewsController extends Controller
{

  public function actionIndex()
  {

    $news = News::find()
        ->asArray()
        ->all();

    $category = News::findOne(1);

    return $this->render('index',[
      'news' => $news,
      'category' => $category,
    ]);
  }
}

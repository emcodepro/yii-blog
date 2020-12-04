<?php

namespace app\controllers;

use Yii;
use app\models\TestForm;
use app\models\News;

class MyController extends  AppController{

  public $layout = "basic";
  public function actionIndex(){

    //$new = News::find()->all();
    // $new = News::find()->asArray()
    // ->select(['id', 'title'])
    // ->from('news')
    // //->where(['last_name' => 'Smith'])
    // ->orderBy(['id' => SORT_DESC])
    // ->limit(10)
    // ->all();
    // $myQuery = "SELECT id,title FROM news WHERE title LIKE :idd ORDER BY id DESC LIMIT 10";
    // $new = News::findBySql($myQuery,[':idd'=>"%a%"])->asArray()->all();
    // $emcode = News::find()->asArray()
    // ->select(['id', 'Clicks', 'Count'])
    // ->from('emcode')
    // //->where(['last_name' => 'Smith'])
    // ->orderBy(['id' => SORT_DESC])
    // ->limit(10)
    // ->all();
    return $this->render("index"); // compact('new','emcode')
  }

  public function actionShow(){
    if (Yii::$app->request->isAjax) {
       return Yii::$app->request->post('mydata');
    }

    $model = new TestForm();
    // $model->name = 'Elmar';
    // $model->email = 'oydaatofik@gmail.com';
    // $model->text = 'any text';

    // $contacts = TestForm::findOne(2);
    // $contacts->email = 'ok@bok.ru';
    // $contacts->save();
    // $contacts->delete();
    //TestForm::deleteAll(['>','id',3]);

    if($model->load(Yii::$app->request->post())){
      if($model->save()){ // or validate
        Yii::$app->session->setFlash("success","All correnct!");
        return $this->refresh();
      }else {
        Yii::$app->session->setFlash("error","Any errors!");
      }
    }
    $this->view->title = "Show post";
    return $this->render("show", compact('model'));
  }

  // [
  //   'Username' => $Username,
  //   'Password' => $Password,
  //   'Information' => $Information
  // ]
}
?>

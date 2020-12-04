<?php

namespace app\components;

use yii\base\Widget;

class MyWidget extends Widget
{
  public $name;
  public function init(){
    parent::init();
    ob_start();
    //if($this->name === null) $this->name = 'Guest';
  }

  public function run(){
    $content = ob_get_clean();
    $content = mb_strtoupper($content);
    return $this->render('main', compact('content'));
  }
}

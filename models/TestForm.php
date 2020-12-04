<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class TestForm extends ActiveRecord{

  // public $name;
  // public $email;
  // public $text;

  public static function tableName(){
    return 'contacts';
  }
  public function attributeLabels(){
    return [
      'email' => 'E-mail',
      'date_add' => 'Date'
    ];
  }

  public function rules(){
    return [
      [['name','text'],'required'],
      ['email','email', 'message' => 'Wrong email type!'],
      ['date_add','required']
      // ['dateadd','required']
      // ['name','string','min' => 3, 'tooShort' => 'Minimum 3 character!'],
      // ['name','string','max' => 10, 'tooLong' => 'Maximum 10 character!']
      // ['name','string','length' => [2,10]],
      // ['text','myRule']
    ];
  }

  public function myRule($attr){
    if(in_array($this->$attr, ['.'])){
      $this->addError($attr,"Wrong textarea rule!");
    }
  }
}
?>

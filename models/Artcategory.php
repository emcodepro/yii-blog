<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\News;

class Artcategory extends ActiveRecord
{
  public static function tableName()
  {
    return 'category'
  }

  public function getNews()
  {
    return $this->hasMany(News::className(), ['category_id' => 'id']);
  }

}

<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Artcategory;


class News extends ActiveRecord
{
  public static function tableName()
  {
    return 'article';
  }

  public function getCategoryname()
  {
    return $this->hasOne(Artcategory::className(), ['id' => 'category_id']);
  }
}

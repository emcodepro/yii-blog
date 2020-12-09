<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class Uploader extends Model
{
  public $image;

  public function fileSave(UploadedFile $file)
  {
    //$this->image = $file;

    $filename = mb_strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);

    $file->saveAs(Yii::getAlias('@web') . 'uploads/' . $filename);
    return $filename;
  }
}

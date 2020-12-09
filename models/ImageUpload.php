<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
class ImageUpload extends Model
{
  public $image;

  public function rules()
  {
    return [
      [['image'],'required'],
      [['image'],'file', 'extensions' => 'jpg,png'],
    ];
  }


  public function uploadFile(UploadedFile $file, $currentImage)
  {
    $this->image = $file;
      // if(file_exists(Yii::getAlias('@web') . 'uploads/'. $currentImage))
      // {
      //   unlink(Yii::getAlias('@web') . 'uploads/'. $currentImage);
      // }
      $filename = mb_strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
      $file->saveAs(Yii::getAlias('@web') . 'uploads/' . $filename);

      return $filename;
  }


  public  function getImage()
  {
    return ($this->image) ? '/uploads/' . $this->image : 'no-image.png';
  }

}


?>

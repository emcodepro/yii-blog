<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'news') ?>

    <?= $form->field($model, 'img') ?>

    <?= $form->field($model, 'img2') ?>

    <?php // echo $form->field($model, 'img3') ?>

    <?php // echo $form->field($model, 'img4') ?>

    <?php // echo $form->field($model, 'img5') ?>

    <?php // echo $form->field($model, 'img6') ?>

    <?php // echo $form->field($model, 'img7') ?>

    <?php // echo $form->field($model, 'img8') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'lang') ?>

    <?php // echo $form->field($model, 'likee') ?>

    <?php // echo $form->field($model, 'dislike') ?>

    <?php // echo $form->field($model, 'ay') ?>

    <?php // echo $form->field($model, 'gun') ?>

    <?php // echo $form->field($model, 'il') ?>

    <?php // echo $form->field($model, 'saat') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'youtube') ?>

    <?php // echo $form->field($model, 'slider') ?>

    <?php // echo $form->field($model, 'img9') ?>

    <?php // echo $form->field($model, 'img10') ?>

    <?php // echo $form->field($model, 'img11') ?>

    <?php // echo $form->field($model, 'img12') ?>

    <?php // echo $form->field($model, 'img13') ?>

    <?php // echo $form->field($model, 'img14') ?>

    <?php // echo $form->field($model, 'img15') ?>

    <?php // echo $form->field($model, 'img16') ?>

    <?php // echo $form->field($model, 'img17') ?>

    <?php // echo $form->field($model, 'img18') ?>

    <?php // echo $form->field($model, 'img19') ?>

    <?php // echo $form->field($model, 'img20') ?>

    <?php // echo $form->field($model, 'AuthorID') ?>

    <?php // echo $form->field($model, 'facebook') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

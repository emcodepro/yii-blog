<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'news')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img4')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img5')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img6')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img7')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img8')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'lang')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'likee')->textInput() ?>

    <?= $form->field($model, 'dislike')->textInput() ?>

    <?= $form->field($model, 'ay')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gun')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'il')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'saat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'category')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'youtube')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'slider')->textInput() ?>

    <?= $form->field($model, 'img9')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img10')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img11')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img12')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img13')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img14')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img15')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img16')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img17')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img18')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img19')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img20')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'AuthorID')->textInput() ?>

    <?= $form->field($model, 'facebook')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

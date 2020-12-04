<?
use yii\widgets\ActiveForm;
use yii\helpers\HTML;
use yii\jui\DatePicker;

// print_r($model);
?>
<h1>Show page</h1>
<?php if (Yii::$app->session->hasFlash("success")): ?>
<div class="alert alert-success" role="alert">
  <?php echo Yii::$app->session->getFlash("success") ?>
</div>
<?php elseif(Yii::$app->session->hasFlash("error")): ?>
<div class="alert alert-danger" role="alert">
  <?php echo Yii::$app->session->getFlash("error") ?>
</div>
<?php endif;?>
<?php $form = ActiveForm::begin() ?>
<?=$form->field($model, 'name')->label('Your name') ?>
<?=$form->field($model, 'email')//->input('email') ?>
<?= $form->field($model,'date_add')->widget(DatePicker::className(),['options' => ['class' => 'form-control'], 'clientOptions' => ['defaultDate' => '2014-01-01']]) ?>
<?=$form->field($model, 'text')->textarea(['rows' => 5]) ?>
<?=HTML::submitButton("Send", ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>

<? //$this->registerJsFile("@web/js/main.js", ['depends' => 'yii\web\YiiAsset']);?>

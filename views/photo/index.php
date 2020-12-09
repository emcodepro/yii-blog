<?php

use yii\widgets\ActiveForm;
use yii\helpers\HTML;
?>
<h1>File upload</h1>

<?php $form = ActiveForm::begin()?>
<?= $form->field($model, 'image')->fileInput(); ?>
<?= HTML::submitButton('Upload', ['class' => 'btn btn-success'])  ?>
<?php ActiveForm::end()?>

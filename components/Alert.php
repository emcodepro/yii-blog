<?php
namespace app\components;

echo \yii2mod\alert\Alert::widget([
    'useSessionFlash' => false,
    'options' => [
        'timer' => null,
        // 'type' => \yii2mod\alert\Alert::TYPE_INPUT,
        'title' => 'An input!',
        // 'text' => "Write something interesting",
        // 'confirmButtonText' => "Yes, delete it!",
        // 'closeOnConfirm' => false,
        // 'showCancelButton' => true,
        // 'animation' => "slide-from-top",
        // 'inputPlaceholder' => "Write something"
    ],
    'callback' => new \yii\web\JsExpression('
                swal("{$dd}", "You wrote: ", "success")
    ')
]);

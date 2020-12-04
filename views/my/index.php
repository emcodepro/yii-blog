<?php
$this->title = "Main";
//
// echo "<pre>";
// print_r($new);
// print_r($emcode);
// echo "</pre>";

use app\components\MyWidget;
?>
<?
// echo MyWidget::widget(['name' => 'Elmar']);

MyWidget::begin()
?>
<h1>hello, world!</h1>
<?
MyWidget::end()
?>

<? //$this->registerJs("alert('good')");
//$this->registerCss(".container{background:#000}");
?>


<button class="btn btn-success">Click me...</button>

<?php

$js = <<<JS
$(".btn").on('click',function(){
  $.ajax({
    url: 'index.php?r=my/show',
    type: 'POST',
    data: {mydata: 123456},
    success: function(e){
      console.log(e);
    },
    error: function(e)
    {
      alert("Error!")
    }
  });
});
JS;


$this->registerJs($js);
?>

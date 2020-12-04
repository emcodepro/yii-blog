<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\HTML;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>APP | <?=HTML::encode($this->title)?></title>
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
  </head>
  <body>
  <?php $this->beginBody() ?>

    <div class="wrap">
      <div class="container">
        <ul class="nav nav-pills">
          <li role="presentation" class="active">
            <?=HTML::a("Main","/web/");?>
          </li>
          <li role="presentation">
            <?=HTML::a("Posts",['/my/']);?>
          </li>
          <li role="presentation">
            <?=HTML::a("Show Posts",['/my/show']);?>
          </li>
        </ul>
        <?=$content;?>
      </div>
    </div>

  <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>

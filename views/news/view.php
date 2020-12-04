<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title:ntext',
            'news:ntext',
            'img:ntext',
            'img2:ntext',
            'img3:ntext',
            'img4:ntext',
            'img5:ntext',
            'img6:ntext',
            'img7:ntext',
            'img8:ntext',
            'views',
            'lang:ntext',
            'likee',
            'dislike',
            'ay:ntext',
            'gun:ntext',
            'il:ntext',
            'saat:ntext',
            'category:ntext',
            'youtube:ntext',
            'slider',
            'img9:ntext',
            'img10:ntext',
            'img11:ntext',
            'img12:ntext',
            'img13:ntext',
            'img14:ntext',
            'img15:ntext',
            'img16:ntext',
            'img17:ntext',
            'img18:ntext',
            'img19:ntext',
            'img20:ntext',
            'AuthorID',
            'facebook:ntext',
        ],
    ]) ?>

</div>

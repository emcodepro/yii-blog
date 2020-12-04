<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title:ntext',
            'news:ntext',
            'img:ntext',
            'img2:ntext',
            //'img3:ntext',
            //'img4:ntext',
            //'img5:ntext',
            //'img6:ntext',
            //'img7:ntext',
            //'img8:ntext',
            //'views',
            //'lang:ntext',
            //'likee',
            //'dislike',
            //'ay:ntext',
            //'gun:ntext',
            //'il:ntext',
            //'saat:ntext',
            //'category:ntext',
            //'youtube:ntext',
            //'slider',
            //'img9:ntext',
            //'img10:ntext',
            //'img11:ntext',
            //'img12:ntext',
            //'img13:ntext',
            //'img14:ntext',
            //'img15:ntext',
            //'img16:ntext',
            //'img17:ntext',
            //'img18:ntext',
            //'img19:ntext',
            //'img20:ntext',
            //'AuthorID',
            //'facebook:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

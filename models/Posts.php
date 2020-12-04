<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $news
 * @property string $img
 * @property string $img2
 * @property string $img3
 * @property string $img4
 * @property string $img5
 * @property string $img6
 * @property string $img7
 * @property string $img8
 * @property int $views
 * @property string $lang
 * @property int $likee
 * @property int $dislike
 * @property string $ay
 * @property string $gun
 * @property string $il
 * @property string $saat
 * @property string $category
 * @property string $youtube
 * @property int $slider
 * @property string $img9
 * @property string $img10
 * @property string $img11
 * @property string $img12
 * @property string $img13
 * @property string $img14
 * @property string $img15
 * @property string $img16
 * @property string $img17
 * @property string $img18
 * @property string $img19
 * @property string $img20
 * @property int $AuthorID
 * @property string $facebook
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'news', 'img', 'img2', 'img3', 'img4', 'img5', 'img6', 'img7', 'img8', 'views', 'lang', 'likee', 'dislike', 'ay', 'gun', 'il', 'saat', 'category', 'youtube', 'img9', 'img10', 'img11', 'img12', 'img13', 'img14', 'img15', 'img16', 'img17', 'img18', 'img19', 'img20', 'AuthorID', 'facebook'], 'required'],
            [['title', 'news', 'img', 'img2', 'img3', 'img4', 'img5', 'img6', 'img7', 'img8', 'lang', 'ay', 'gun', 'il', 'saat', 'category', 'youtube', 'img9', 'img10', 'img11', 'img12', 'img13', 'img14', 'img15', 'img16', 'img17', 'img18', 'img19', 'img20', 'facebook'], 'string'],
            [['views', 'likee', 'dislike', 'slider', 'AuthorID'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'news' => 'News',
            'img' => 'Img',
            'img2' => 'Img2',
            'img3' => 'Img3',
            'img4' => 'Img4',
            'img5' => 'Img5',
            'img6' => 'Img6',
            'img7' => 'Img7',
            'img8' => 'Img8',
            'views' => 'Views',
            'lang' => 'Lang',
            'likee' => 'Likee',
            'dislike' => 'Dislike',
            'ay' => 'Ay',
            'gun' => 'Gun',
            'il' => 'Il',
            'saat' => 'Saat',
            'category' => 'Category',
            'youtube' => 'Youtube',
            'slider' => 'Slider',
            'img9' => 'Img9',
            'img10' => 'Img10',
            'img11' => 'Img11',
            'img12' => 'Img12',
            'img13' => 'Img13',
            'img14' => 'Img14',
            'img15' => 'Img15',
            'img16' => 'Img16',
            'img17' => 'Img17',
            'img18' => 'Img18',
            'img19' => 'Img19',
            'img20' => 'Img20',
            'AuthorID' => 'Author ID',
            'facebook' => 'Facebook',
        ];
    }
}

<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\ArticleTag;
use yii\data\Pagination;
/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $content
 * @property string|null $date
 * @property string|null $image
 * @property int|null $viewed
 * @property int|null $user_id
 * @property int|null $status
 * @property int|null $category_id
 *
 * @property ArticleTag[] $articleTags
 * @property Comment[] $comments
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          [['title','content','category_id'], 'required'],
          [['title', 'description', 'content'], 'string'],
          [['date'], 'date', 'format' => 'php:Y-m-d'],
          [['date'], 'default', 'value' => date('Y-m-d')],
        ];
    }

    public function getCategory()
    {
      return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'date' => 'Date',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'status' => 'Status',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[ArticleTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTag::className(), ['article_id' => 'id']);
    }

    public function getComments()
    {
      return $this->hasMany(Comment::className(), ['article_id' => 'id']);
    }
    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getTags()
    {
      return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
         ->viaTable('article_tag', ['article_id' => 'id']);
    }

    public function getSelectedTags()
    {
      $selectedIds = $this->getTags()->select('id')->asArray()->all();
      return ArrayHelper::getColumn($selectedIds,'id');
    }

    public function getImage()
    {
      return ($this->image) ? '/uploads/' . $this->image : '/no-image.png';
    }

    public function saveTags($tags)
    {
      if (is_array($tags)) {
        $this->deleteCurrentTags();
        foreach ($tags as $tag_id) {
          $tag = Tag::findOne($tag_id);
          $this->link('tags', $tag);
        }
      }
    }

    public function deleteCurrentTags()
    {
      ArticleTag::deleteAll(['article_id' => $this->id]);
    }

    public function saveImage($filename)
    {
      $this->image = $filename;
      return $this->save(false);
    }

    public function saveCategory($category_id)
    {
      // $category = Category::findOne($category_id);
      //
      // if($category != null)
      // {
      //   $this->link('category', $category);
      //   return true;
      // }
      $this->category_id = $category_id;

      return $this->save(false);
    }

    public function getDate()
    {
      return Yii::$app->formatter->asDate($this->date);
    }

    public static function getAll($pageSize = 3)
    {
      $query = Article::find();
      $countQuery = clone $query;
      $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=> $pageSize]);

      $articles = $query->offset($pages->offset)
          ->limit($pages->limit)
          ->all();

      $data['articles'] = $articles;
      $data['pages'] = $pages;

      return $data;
    }

    public static function getByCategory($id, $pageSize = 4)
    {
      $query = Article::find()->where(['category_id' => $id]);
      $countQuery = clone $query;
      $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize'=> $pageSize]);

      $articles = $query->offset($pages->offset)
          ->limit($pages->limit)
          ->all();

      $data['articles'] = $articles;
      $data['pages'] = $pages;

      return $data;
    }
    public static function getPopular()
    {
      return Article::find()->orderBy('viewed desc')->limit(3)->all();
    }

    public static function getRecent()
    {
      return Article::find()->orderBy('viewed asc')->limit(4)->all();
    }

    public function updateViews()
    {
      $this->viewed += 1;

      return $this->save(false);
    }

    public function saveArticle()
    {
      $this->user_id = Yii::$app->user->id;
      return $this->save();
    }
}

<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Article;
use app\models\Category;
use app\models\Tag;
use app\models\ArticleSearch;
use app\models\ImageUpload;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModell($id)
    {
      if(($model = Article::findOne($id)) !== null){
        return $model;
      }else {
        throw new NotFoundHttpException("The requested page does not exist.");

      }
    }

    public function actionSetImage($id)
    {
      $model = new ImageUpload();

      if(Yii::$app->request->isPost)
      {
        $article = $this->findModell($id);
        //var_dump($article->title);die;
        $file = UploadedFile::getInstance($model,'image');

        //$model->uploadFile($file);
        //var_dump(md5(uniqid($file->baseName)) . '.' . $file->extension);
        $article->saveImage($model->uploadFile($file, $article->image));

        Yii::$app->session->setFlash("success", "Image uploaded!");
      }
      return $this->render('image', ['model' => $model]);
    }

    public function actionSetCategory($id)
    {
      // $category = Category::findOne(2);
      // debug($category->article);die;
      $article = $this->findModel($id);
      $selectedCategory = $article->category->id;
      $categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');
      // $categories = [
      //   1 => 'Cat 1',
      //   2 => 'Cat 2',
      // ];

      //debug($categories);die();
      // debug($article->category);
      //debug();
      if (Yii::$app->request->isPost) {
        $category = Yii::$app->request->post('category');

        if($article->saveCategory($category))
        {
          return $this->redirect(['view', 'id' => $article->id]);
        }
        //debug(Yii::$app->request->post('category'));
      }
      return $this->render('category', [
        'article' => $article,
        'selectedCategory' => $selectedCategory,
        'categories' => $categories,
      ]);
    }

    public function actionSetTags($id)
    {
      $article = $this->findModel($id);
      $tag = Tag::findOne(2);
      $selectedTags = $article->getSelectedTags();

      //debug($selectedTags);die;

      $tags = ArrayHelper::map(Tag::find()->all(), 'id', 'title');

      if (Yii::$app->request->isPost) {
        //debug(Yii::$app->request->post('tags'));die;

        $article->saveTags(Yii::$app->request->post('tags'));

        return $this->redirect(['view', 'id' => $article->id]);
      }
      return $this->render('tag',[
        'tags' => $tags,
        'selectedTags' => $selectedTags,
      ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        $selectedCategory = 1;
        $category = ArrayHelper::map(Category::find()->all(), 'id', 'title');
        $model->category_id = Yii::$app->request->post('category_id');
        //debug($category); die;
        if ($model->load(Yii::$app->request->post()) && $model->saveArticle()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'selectedCategory' => $selectedCategory,
            'categories' => $category,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $selectedCategory = 1;
        $category = ArrayHelper::map(Category::find()->all(), 'id', 'title');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'selectedCategory' => $selectedCategory,
            'categories' => $category,
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

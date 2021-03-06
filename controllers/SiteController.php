<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Article;
use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;
use app\models\CommentForm;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

      $data = Article::getAll(3);
      $popularPosts = Article::getPopular();
      $recentPosts = Article::getRecent();
      $categories = Category::getAll();

        return $this->render('index', [
          'articles' => $data['articles'],
          'pages' => $data['pages'],
          'popularPosts' => $popularPosts,
          'recentPosts' => $recentPosts,
          'categories' => $categories,
        ]);
    }

    public function actionRead($id)
    {
      $article = Article::findOne($id);
      $popularPosts = Article::getPopular();
      $recentPosts = Article::getRecent();
      $categories = Category::getAll();
      $tags = ArrayHelper::map($article->tags, 'id', 'title');
      $comments = $article->comments;
      $commentForm = new CommentForm();
      //debug($comments);die;
      $article->updateViews();
      return $this->render('read', [
        'article' => $article,
        'popularPosts' => $popularPosts,
        'recentPosts' => $recentPosts,
        'categories' => $categories,
        'tags' => $tags,
        'comments' => $comments,
        'commentForm' => $commentForm,
      ]);
    }

    public function actionCategory($id)
    {
      $data = Article::getByCategory($id, 4);
      $popularPosts = Article::getPopular();
      $recentPosts = Article::getRecent();
      $categories = Category::getAll();

      return $this->render('category', [
        'articles' => $data['articles'],
        'pages' => $data['pages'],
        'popularPosts' => $popularPosts,
        'recentPosts' => $recentPosts,
        'categories' => $categories,
      ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    // public function actionLogin()
    // {
    //     if (!Yii::$app->user->isGuest) {
    //         return $this->goHome();
    //     }
    //
    //     $model = new LoginForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->login()) {
    //         return $this->goBack();
    //     }
    //
    //     $model->password = '';
    //     return $this->render('login', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}

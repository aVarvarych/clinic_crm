<?php

namespace app\controllers;

use app\models\Lessons;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Doctors;
use yii\filters\VerbFilter;
use app\models\News;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

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
                'only' => ['logout', 'login', 'contact', 'about', 'index', 'doctors', 'news'],
                'denyCallback' => function ($rule, $action) {
                    return $this->redirect(['site/login']);
                },
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'contact', 'learning', 'index', 'doctors', 'news'],
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

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
    public function actionLearning()
    {
        $lessons = Lessons::find()->all();

        return $this->render('learning', [
            'lessons' => $lessons
        ]);
    }

    public function actionDoctors()
    {
        $doctors = Doctors::find()->all();

        return $this->render('doctors', [
            'doctors' => $doctors
        ]);
    }

    public function actionNews()
    {
        $news = News::find()->all();

        return $this->render('news', [
            'news' => $news
        ]);
    }

    public function actionLesson($id)
    {
        $lesson = Lessons::findOne($id);

        return $this->render('lesson', [
            'id' => $id,
            'lesson' => $lesson
        ]);
    }

    public function actionAddAdmin() {
        $doctors = Doctors::find()->all();
        foreach ($doctors as $doctor) {
            $user = new User();
            $user->username = $doctor->email ? $doctor->email : 'user'.$doctors->id ;
            $user->email = $doctor->email;
            $user->setPassword($doctor->phone ? $doctor->phone : 192837465);
            $user->generateAuthKey();
            if ($user->save()) {
                $doctor->user_id = $user->id;
                $doctor->save();
                echo 'good';
            }
        }
    }
}

<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Lessons;
use yii\web\UploadedFile;

class AdminController extends Controller
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

    public function actionLessonA() {

        $model = new Lessons();

        if ($model->load(Yii::$app->request->post())) {

            $model->video = UploadedFile::getInstance($model, 'video');
            if($model->video) {
                $fileName = '/uploads/' . $model->video->baseName . '.' . $model->video->extension;
                $model->video->saveAs($_SERVER['DOCUMENT_ROOT'].'/web'.$fileName);
                $model->video = $fileName;
            } else {
                $model->video = '1111';
            }

            $model->save(false);

            Yii::$app->session->setFlash('addLessonFormSubmitted');

            return $this->refresh();
        }

        return $this->render('lesson_a', [
            'model' => $model
        ]);
    }

    public function actionLessonE($id) {

        $model = Lessons::find()->where(['id' => $id])->one();

        if ($model->load(Yii::$app->request->post())) {

            $model->video = UploadedFile::getInstance($model, 'video');
            if($model->video) {
                $fileName = '/uploads/' . $model->video->baseName . '.' . $model->video->extension;
                $model->video->saveAs($_SERVER['DOCUMENT_ROOT'].'/web'.$fileName);
                $model->video = $fileName;
            } else {
                $model->video = '1111';
            }

            $model->save(false);

            Yii::$app->session->setFlash('editLessonFormSubmitted');

            return $this->refresh();
        }

        return $this->render('lesson_e', [
            'id' => $id,
            'model' => $model
        ]);
    }

    public function actionLessonD($id) {

        $lesson = Lessons::findOne($id);
        $lesson->delete();

        Yii::$app->session->setFlash('deleteLessonFormSubmitted');

        return $this->redirect(['admin/learning']);

    }

}

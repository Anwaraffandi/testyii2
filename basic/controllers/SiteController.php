<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;

use app\models\Post;
use app\models\Akun;
use app\models\Komen;

class SiteController extends Controller{

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

    public function actions(){

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

    public function actionIndex(){
    $komen = new Komen();
    $query = Post::find();
    $post = $query->orderBy('idpost')->all();
    //$querykomen = Komen::find();
    //$tampilkomen = $querykomen->orderBy('idkomen')->all();
    //echo "<pre>";print_r($post);die();
        return $this->render('index', ['post'=>$post, 'model'=>$komen]);
    }

    public function actionKomen(){
        $komen = new Komen();
        if($komen->load(Yii::$app->request->post())){
            $komen->idkomen = NULL;
            $komen->username = Yii::$app->user->identity->username;
            $komen->save();
           // echo "<pre>";print_r($komen);die();
            return $this->redirect(Url::to(['site/index']));
        }
    }

    public function actionLogin(){

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


    public function actionLogout(){

        Yii::$app->user->logout();

        return $this->goHome();
    }


}

<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;

use app\models\Post;

class PostController extends Controller{

    public function actions(){
        return ['error' => ['class' => 'yii\web\ErrorAction',],];
    }

     public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index',],
                'rules' => [
                    [
                        'actions' => ['index',],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


   public function actionIndex(){

        return $this->render('index');
    }


    }
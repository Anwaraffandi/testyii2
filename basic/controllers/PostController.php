<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;

use app\models\Post;
//use app\models\PostForm;

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
	$query = Post::find();
    $post = $query->orderBy('idpost')->all();

        return $this->render('index', ['post'=>$post]);
    }

    public function actionAdd(){
        $post = new Post();
        if ($post->load(Yii::$app->request->post())){
            $post->date = date("Y-m-d H:i:s");
            $post->username = Yii::$app->user->identity->username;
            $post->save();

            return $this->redirect(Url::to(['post/index']));
        }else{
            //$akun = Akun::find()->select(['name', 'username'])->indexBy('username')->column();

            return $this->render('add', ['model'=>$post]);

        }
    }

    public function actionDetail($id){
        $post = Post::findOne(['idpost'=>$id]);
        return $this->render('detail', ['post'=>$post]);
    }

    public function actionEdit($id){
       $post = Post::findOne($id);
       if ($post->load(Yii::$app->request->post())){
            $post->date = date("Y-m-d H:i:s");
            $post->username = 'admin';
            $post->save();
            //echo "<pre>";print_r($post);die();
            return $this->redirect(Url::to(['post/detail', 'id'=>$id]));
            }else{

            return $this->render('edit', ['model'=>$post]);
            }
    }

    public function actionDelete($id){
        $post = Post::findOne(['idpost' => $id]);
        $post->delete();

        return $this->redirect(Url::to(['post/index']));
    }

    public function actionDeleteAll(){
        Akun::deleteAll();
        return $this->redirect(Url::to(['post/index']));
    }


    }
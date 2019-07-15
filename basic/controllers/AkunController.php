<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;

use app\models\Akun;
//use app\models\AkunForm;

class AkunController extends Controller{

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
        //if (Yii::$app->user->identity->username!='admin'){
          //  return $this->render('index');
       // }
    $query = Akun::find()->all();

        return $this->render('index', ['akuns'=>$query]);
    }

    public function actionAdd(){
        $akun = new Akun();
        if ($akun->load(Yii::$app->request->post())){
            $akun->password = md5($akun->password);
            $akun->save();

            return $this->redirect(Url::to(['akun/index']));
        }else{

            return $this->render('add', ['model'=>$akun]);

        }
    }

    public function actionDetail($id){
        $akun = Akun::findOne(['username'=>$id]);
        return $this->render('detail', ['akun'=>$akun]);
    }

    public function actionEdit($id){
        $akun = Akun::findOne($id);
        if ($akun->load(Yii::$app->request->post())){
            $akun->password = md5($akun->password);
            $akun->save();
           // echo "<pre>";print_r($akun);die();
            return $this->redirect(Url::to(['akun/detail', 'id'=>$id]));
        }else{

            return $this->render('edit', ['model'=>$akun, 'akun'=>$akun]);
        }
    }

    public function actionDelete($id){
        $akun = Akun::findOne(['username' => $id]);
        $akun->delete();

        return $this->redirect(Url::to(['akun/index']));
    }

    public function actionDeleteAll(){
        Akun::deleteAll();
        return $this->redirect(Url::to(['akun/index']));
    }
}
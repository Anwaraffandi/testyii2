<?php

namespace app\models;

use app\models\TblUsers;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    //public $id;
    //public $username;
    //public $password;
    //public $authKey;
    //public $accessToken;
    public $username;
    public $password;
    public $name;
    public $role;

     
    public static function findIdentity($name){
     $users = TblUsers::find()->where(['name'=> $name])->one();
        if ($users) {
            return new static($users);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public static function findByUsername($username){
        $users = TblUsers::find()->where(['username'=> $username])->one();
        if ($users) {
            return new static($users);
        }
        return null;
    }


     
    public function getId()
    {
        return $this->name;
    }

    public function getAuthKey()
    { 
    }

    public function validateAuthKey($authkey)
    { 
    }

    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    /*class LevelLookUp{
//const author = 2;
//const admin = 1;
// For CGridView, CListView Purposes
public static function getLabel($username){
if($username == self::author)
return ‘Member’;
if($username == self::admin)
return ‘Administrator’;
return false;
}
// for dropdown lists purposes
public static function getLevelList(){
return array(
self::author=>’author’,
self::admin=>’admin’);
}
}*/

}

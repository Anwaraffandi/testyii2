<?php

namespace app\models;

use yii\base\Model;

class AkunForm extends Model
{
    public $username;
    public $name;
    public $password;
    public $role;

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'name' => 'Name',
            'password' => 'Password',
            'role' => 'Role'
        ];
    }

    public function rules()
    {
        return [
            ['username', 'required','message' => 'Username gak boleh kosong'],
            ['name', 'string','max'=>'20'],
            ['password', 'required','message' => 'Password gak boleh kosong'],
            ['role', 'string','max'=>'25'],
        ];
    }
}
<?php

namespace app\models;

use yii\db\ActiveRecord;

class Akun extends ActiveRecord
{
    public static function tableName()
    {
        return 'akun';
    }
}
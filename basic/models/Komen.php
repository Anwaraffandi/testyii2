<?php

namespace app\models;

use yii\db\ActiveRecord;

class Komen extends ActiveRecord
{
    public static function tableName()
    {
        return 'tb_komen';
    }
    public function rules()
    {
        return [
        	['idpost', 'required','message' => 'gak boleh kosong'],
        	['isikomen', 'required','message' => 'gak boleh kosong'],];
    }
}
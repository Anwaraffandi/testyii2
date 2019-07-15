<?php

namespace app\models;

use yii\base\Model;

class PostForm extends Model
{
    public $title;
    public $content;

    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'content' => 'Content'];
    }

    public function rules()
    {
        return [
            ['title', 'required','message' => 'gak boleh kosong'],
            ['content', 'required','message' => 'gak boleh kosong'],];
    }
}
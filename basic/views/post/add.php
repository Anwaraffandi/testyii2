<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\widgets\DatePicker;
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;

$this->title = "Tambah";

?>
<div class="row">
    <div class="col-md-12">
        <h1>Tambah</h1>
        <hr/>
        <?php
        echo Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n", // template for all links
            'links' => [['label' => 'Post', 'url' => ['post/index']],'Tambah Post',],]);
        ?>
    </div>
</div>

<div>   
    <div class="col-md-12">
        <?php $form = ActiveForm::begin([
                'id' => 'post-form',
                'options' => ['class' => 'form-horizontal']
            ])
        ?>

        <div class="form-group">
            <div class="col-lg-8">
            <?= $form->field($model, 'title')->hint('Harus Diisi'); ?>
            </div>
        </div>
        <!--<div class="form-group">
            <div class="col-lg-8">
            <?= $form->field($model, 'content')->textarea(); ?>
            </div>
        </div>-->
        <div>
            <?= $form->field($model, 'content')->widget(TinyMce::className(), [
            'options' => ['rows' => 6],
            'language' => 'es',
            'clientOptions' => [
                'plugins' => [
                    "advlist autolink lists link charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                ]
            ]);?>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
                <?= Html::Button('Back', ['onclick' => "history.go(-1)", 'class' => 'btn btn-danger']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
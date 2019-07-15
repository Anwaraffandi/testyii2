<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = "CRUD";

?>

<div class="row">
    <div class="col-md-12">
        <?php
        //echo Breadcrumbs::widget(['itemTemplate' => "<li>{link}</li>\n"]);
        ?>
    </div>
</div>

<div>   
    <div class="col-md-12">
    <table>
        <tbody>
                <?php 
                $no =1;
                if (count($post) > 0) { ?>
                    <?php foreach ($post as $post): ?>
                    <tr>    
                        <td><h1><?= Html::encode("{$post['title']}") ?></h1></td>
                    </tr>
                    <tr>
                        <td><h5><?= Html::encode("{$post['username']}") ?> <?= Html::encode("{$post['date']}") ?></h5></td>
                    </tr>
                    <tr>
                        <td><?= $post->content ?></td>
                    </tr>
                    <tr>
                   <?php if(is_array($post->komen)&&count($post->komen) > 0){ ?> 
                    
                    <?php foreach($post->komen as $key => $value) {
                       ?>
                       <tr>
                        <td>
                           <?= $value->username ?>
                           :
                          <?= $value->isikomen ?>
                        </td>
                    </tr>
                    <?php
                    }
 } ?>
                    <?php 
        //Komentar
        $form = ActiveForm::begin([
                'id' => 'post-form',
                'options' => ['class' => 'form-horizontal'],
                'action' => ['site/komen']
                ])
         
         
                ?>
                <div>
                    <?= $form->field($model, 'idpost')->hiddenInput(['value'=> $post->idpost])->label(false); ?>
                </div>
        <td>
            <div class="form-group">
                    <?= $form->field($model, 'isikomen')->textarea(); ?>
            </div>
        </td>
        </tr>
        <tr>
        <td align="right">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary']) ?>
        </td>
        </tr>
        <?php ActiveForm::end(); 

          endforeach; ?>
                <?php } else { ?>

                    <p style="text-align:center;font-size:15px;padding:25px;" colspan="5">No data found...</p>

                <?php 
               
            } ?>
            </tbody>
          </table>
    </div>
</div>


<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = "CRUD";

?>

<div class="row">
    <div class="col-md-12">
        <?php

        echo Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n", // template for all links
            'links' => [
                'Akun List',
            ],
        ]);

        ?>
        <hr/>
        <h1>Akun</h1>
        <a href="<?php echo Url::to(['akun/add']); ?>"><button><i class="glyphicon glyphicon-plus"></i>Tambah</button></a>
    </div>
</div>

<div>   
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php 
                if (count($akuns) > 0) { ?>
                    <?php 
                    $no =1;
                    foreach ($akuns as $akun): ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= Html::encode("{$akun['username']}") ?></td>
                            <td><?= Html::encode("{$akun['name']}") ?></td>
                            <td><?= Html::encode("{$akun['role']}") ?></td>
                            <td style="width:15%;text-align:center;">
                                <a href="<?php echo Url::to(['akun/delete', 'id'=>$akun['username']]); ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                <a href="<?php echo Url::to(['akun/detail', 'id'=>$akun['username']]); ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="<?php echo Url::to(['akun/edit', 'id'=>$akun['username']]); ?>"><i class="glyphicon glyphicon-pencil"></i></a> 
                            </td>
                          </tr>
                    <?php 
                    $no++;
                endforeach; ?>
                <?php 
                } else { ?>
                <tr>
                    <td style="text-align:center;font-size:15px;padding:25px;" colspan="5">No data found...</td>
                </tr>
                <?php } ?>

            </tbody>
          </table>
    </div>
</div>
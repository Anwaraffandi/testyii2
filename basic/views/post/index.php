<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = "CRUD";

?>

<div class="row">
    <div class="col-md-12">
        <h1>Akun List</h1>
        <hr/>
        <?php

        echo Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n", // template for all links
            'links' => [
                'Akun List',
            ],
        ]);

        ?>
    </div>
</div>

<div>   
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
              </tr>
            </thead>
            <tbody>
                <?php if (count($teams) > 0) { ?>
                    <?php foreach ($teams as $team): ?>
                        <tr>
                            <td><?= Html::encode("{$team['name']}") ?></td>
                            <td><?= Html::encode("{$team->league['name']}") ?></td>
                            <td><?= Html::encode("{$team['country']}") ?></td>
                            <td style="width:15%;text-align:center;">
                                <a class="btn btn-success btn-sm" href="<?php echo Url::to(['hello-crud/detail', 'id'=>$team['id']]); ?>"><i class="glyphicon glyphicon-eye-open"></i></a> 
                            </td>
                          </tr>
                    <?php endforeach; ?>
                <?php } else { ?>
                <tr>
                    <td style="text-align:center;font-size:15px;padding:25px;" colspan="5">No data found...</td>
                </tr>
                <?php } ?>

            </tbody>
          </table>
    </div>
</div>
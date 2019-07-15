<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = "Detail";

?>

<div class="row">
    <div class="col-md-12">
        <h1><?php echo $akun['name'] ?></h1>
        <hr/>
        <?php
        echo Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n", // template for all links
            'links' => [['label' => 'Akun', 'url' => ['akun/index']],'Detail Akun',],]);
        ?>
    </div>
</div>

<div>   
    <div class="col-md-2">
        <div class="list-group">
          <a href="<?php echo Url::to(['akun/edit', 'id'=>$akun['username']]); ?>" class="list-group-item"><i class="glyphicon glyphicon-pencil"></i> Edit Akun</a>
          <a href="<?php echo Url::to(['akun/delete', 'id'=>$akun['username']]); ?>" class="list-group-item"><i class="glyphicon glyphicon-trash"></i> Delete Akun</a>
        </div>
    </div>
    <div class="col-md-10">

        <div class="col-md-8">
        	<table>
        		<tr>
        			<th>Username</th>
        			<td>:</td>
        			<td><?php echo $akun['username'] ?></td>
        		</tr>
        		<tr>
        			<th>Name</th>
        			<td>:</td>
        			<td><?php echo $akun['name'] ?></td>
        		</tr>
        		<tr>
        			<th>Role</th>
        			<td>:</td>
        			<td><?php echo $akun['role'] ?></td>
        		</tr>
                <tr>
                    <th>password</th>
                    <td>:</td>
                    <td><?php echo $akun['password'] ?></td>
                </tr>
        	</table>
        </div>
</div>
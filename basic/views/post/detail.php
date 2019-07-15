<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

$this->title = "Detail";

?>

<div class="row">
    <div class="col-md-12">
        <h1><?php echo $post['title'] ?></h1>
        <hr/>
        <?php
        echo Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n", // template for all links
            'links' => [['label' => 'post', 'url' => ['post/index']],'Detail Akun',],]);
        ?>
    </div>
</div>

<div>   
    <div class="col-md-2">
        <div class="list-group">
          <a href="<?php echo Url::to(['post/edit', 'id'=>$post['idpost']]); ?>" class="list-group-item"><i class="glyphicon glyphicon-pencil"></i> Edit Post</a>
          <a href="<?php echo Url::to(['post/delete', 'id'=>$post['idpost']]); ?>" class="list-group-item"><i class="glyphicon glyphicon-trash"></i> Delete Post</a>
        </div>
    </div>
    <div class="col-md-10">

        <div class="col-md-8">
        	<table>
        		<tr>
        			<th>Title</th>
        			<td>:</td>
        			<td><?php echo $post['title'] ?></td>
        		</tr>
        		<tr>
        			<th>Name</th>
        			<td>:</td>
        			<td><?php echo $post['content'] ?></td>
        		</tr>
        		<tr>
        			<th>Date</th>
        			<td>:</td>
        			<td><?php echo $post['date'] ?></td>
        		</tr>
        		<tr>
        			<th>Username</th>
        			<td>:</td>
        			<td><?php echo $post['username'] ?></td>
        		</tr>
        	</table>
        </div>
</div>
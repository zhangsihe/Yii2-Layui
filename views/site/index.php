<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index" style="margin-top:100px">

    <div class="jumbotron">
        <h1>I am always looking for the way home.</h1>

        <p class="lead">You have successfully created your Yii-powered and Layui application.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to(['index/index'])?>">Layui Example</a></p>
    </div>

</div>

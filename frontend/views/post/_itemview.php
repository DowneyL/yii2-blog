<?php
use yii\helpers\Html;
?>

<div class="post">
    <div class="title">
        <h2><a href="<?= $model->postUrl; ?>"><?= Html::encode($model->title) ?></a></h2>
        <div class="author">
            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <span><?= date('Y-m-d H:i:s', $model->create_time) ?></span>
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span><?= Html::encode($model->author->nickname) ?></span>
        </div>
    </div>

    <br>
    <div class="content">
        <?= $model->shortContent ?>
    </div>

    <br>
    <div class="nav">
        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
        <?= implode(', ', $model->tagLinks); ?>
        <br>
        <?= Html::a("评论 ({$model->commentCount})", $model->postUrl . '#comments') ?> | 最后修改于 <?= date('Y-m-d H:i:s', $model->update_time) ?>
    </div>
    <br>
</div>

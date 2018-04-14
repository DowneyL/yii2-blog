<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use frontend\components\TagsCloudWidget;
use frontend\components\RctCommentsWidget;
use common\models\Comment;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$postTitle = Html::encode($model->title);

$this->title = $postTitle;
?>
<div class="container">

    <div class="row">

        <div class="col-md-9">

            <ol class="breadcrumb">
                <li><a href="<?= Yii::$app->homeUrl ?>">首页</a></li>
                <li><a href="<?= Yii::$app->homeUrl ?>?r=post/index">文章列表</a></li>
                <li class="active"><?= $postTitle ?></li>
            </ol>

            <div class="detail">
                <div class="title">
                    <h2><a href="<?= $model->postUrl ?>"><?= $postTitle ?></a></h2>
                    <div class="author">
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                        <span><?= date('Y-m-d H:i:s', $model->create_time) ?></span>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <span><?= Html::encode($model->author->nickname) ?></span>
                    </div>
                </div>
                <br>
                <div class="content">
                    <?= HtmlPurifier::process($model->content) ?>
                </div>
                <br>
                <div class="nav">
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <?= implode(', ', $model->tagLinks); ?>
                    <br>
                    <?= Html::a("评论 ({$model->commentCount})", $model->postUrl . '#comments') ?> |
                    最后修改于 <?= date('Y-m-d H:i:s', $model->update_time) ?>
                </div>
                <br>
            </div>

            <div id="comments">
                <?php if ($added) : ?>
                    <div class="alert alert-warning alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4>谢谢您的回复，我们会尽快审核后发布出来！</h4>
                        <span class="glyphicon glyphicon-time"
                              aria-hidden="true"></span><em><?= date('Y-m-d H:i:s', $commentModel->create_time) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></em>
                        <span class="glyphicon glyphicon-time"
                              aria-hidden="true"></span><em><?= Html::encode($commentModel->user->username) ?></em>
                    </div>
                <?php endif; ?>
                <?php if ($model->commentCount >= 1) : ?>
                    <h5><?= $model->commentCount . '条评论'; ?></h5>

                    <?= $this->render('_comment', [
                        'post' => $model,
                        'comments' => $model->activeComments,
                    ]); ?>
                <?php endif; ?>
                <?php if (Yii::$app->user->id) : ?>
                    <h5>发表评论</h5>
                    <?php
                    $commentModel = new Comment();
                    echo $this->render('_guestform', [
                        'id' => $model->id,
                        'commentModel' => $commentModel,
                    ]); ?>
                <?php else : ?>
                    <h5>请先登录，再发表评论！</h5>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-3">
            <ul class="list-group">
                <div class="search-box">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 查找文章
                    </li>
                    <li class="list-group-item">
                        <form action="index.php?r=post/index" id="w0" class="form-inline" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control" name="PostSearch[title]" id="w0-input"
                                       placeholder="按标题搜索...">
                                <button type="submit" class="btn btn-default">搜索</button>
                            </div>
                        </form>
                    </li>
                </div>
            </ul>
            <ul class="list-group">
                <div class="tags-box">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 标签云
                    </li>
                    <li class="list-group-item">
                        <?= TagsCloudWidget::widget(['tags' => $tags]) ?>
                    </li>
                </div>
            </ul>
            <ul class="list-group">
                <div class="new-comment-box">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 最新回复
                    </li>
                    <li class="list-group-item">
                        <?= RctCommentsWidget::widget(['recent_comments' => $recent_comments]) ?>
                    </li>
                </div>
            </ul>
        </div>

    </div>

</div>

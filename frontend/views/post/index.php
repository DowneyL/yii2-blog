<?php

use yii\widgets\ListView;
use frontend\components\TagsCloudWidget;
use frontend\components\RctCommentsWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章列表';
?>
<div class="container">

    <div class="row">

        <div class="col-md-9">

            <ol class="breadcrumb">
                <li><a href="<?= Yii::$app->homeUrl ?>">首页</a></li>
                <li>文章列表</li>
            </ol>

            <?= ListView::widget([
                'id' => 'postList',
                'dataProvider' => $dataProvider,
                'itemView' => '_itemView',
                'layout' => '{items} {pager}',
                'pager' => [
                    'maxButtonCount' => '10',
                    'nextPageLabel' => Yii::t('app', '下一页'),
                    'prevPageLabel' => Yii::t('app', '上一页'),
                ],
            ])
            ?>
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
                                <input type="text" class="form-control" name="PostSearch[title]" id="w0-input" placeholder="按标题搜索...">
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

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\Adminuser;
//use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php
        // 第一种方法 - ActiveRecord

        /*
        $allStatusObj = Poststatus::find()->all();
        $allStatus = ArrayHelper::map($allStatusObj, 'id', 'name');
        */

        // 第二种方法 - Command
        /*
        $postArr = Yii::$app->db->createCommand('SELECT id,name FROM poststatus')->queryAll();
        $allStatus = ArrayHelper::map($postArr, 'id', 'name');
        */

        // 第三种方法 - QueryBuild
        /*
        $allStatus = (new \yii\db\Query())
            ->select(['name', 'id'])
            ->from('poststatus')
            ->indexBy('id')
            ->column();
        */

        // 第四种 - ActiveRecord + QueryBuild
        /*
        $allStatus = Poststatus::find()
        ->select(['name', 'id'])
        ->indexBy('id')
        ->column();
        */
    ?>

    <?= $form->field($model, 'status')->dropDownList(
            Poststatus::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column(),
        ['prompt' => '请选择状态']) ?>

    <?= $form->field($model, 'author_id')->dropDownList(
            Adminuser::find()
            ->select(['nickname', 'id'])
            ->indexBy('id')
            ->column(),
            ['prompt' => '请选择文章作者']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

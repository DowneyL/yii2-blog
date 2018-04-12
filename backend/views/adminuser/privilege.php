<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = '设置管理员权限: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => '管理员权限', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '设置';
?>
<div class="adminuser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="adminuser-privilege-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= Html::checkboxList('newPri', $AuthAssignmentsArray, $allPrivilegesArray) ?>

        <div class="form-group">
            <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

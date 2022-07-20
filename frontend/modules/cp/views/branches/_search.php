<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\BranchesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'branch_name') ?>

    <?= $form->field($model, 'contracgen_name') ?>

    <?= $form->field($model, 'leader') ?>

    <?= $form->field($model, 'alternative_name') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'responsible') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

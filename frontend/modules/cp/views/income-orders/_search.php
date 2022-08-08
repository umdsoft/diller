<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\IncomeOrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="income-orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created') ?>

    <?= $form->field($model, 'updated') ?>

    <?= $form->field($model, 'number_full') ?>

    <?= $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'branch_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

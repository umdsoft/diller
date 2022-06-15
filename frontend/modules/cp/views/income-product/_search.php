<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\IncomeProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="income-products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'income_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'serial') ?>

    <?= $form->field($model, 'exp_date') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'box') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'amout') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'count') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'box') ?>

    <?php // echo $form->field($model, 'box_price') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'bio') ?>

    <?php // echo $form->field($model, 'is_sale') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ClientSubjectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-subjects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'alt_name') ?>

    <?= $form->field($model, 'district_id') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'lan') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'director') ?>

    <?php // echo $form->field($model, 'inn') ?>

    <?php // echo $form->field($model, 'oked') ?>

    <?php // echo $form->field($model, 'nds_number') ?>

    <?php // echo $form->field($model, 'referent_point') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'group_id') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

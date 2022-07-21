<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>
<!--'name', 'inn', 'oked', 'okonx', 'address', 'phone', 'director', 'buxgalter', 'phone_bux', 'nds_num'-->
<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-6">


            <?= $form->field($model, 'buxgalter')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone_bux')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'oked')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'okonx')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nds_num')->textInput(['maxlength' => true]) ?>

        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

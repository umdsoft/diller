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

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_full')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Branches::find()->all(),'id','name')) ?>








    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

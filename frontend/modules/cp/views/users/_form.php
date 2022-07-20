<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Roles::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['status']) ?>

    <?= $form->field($model, 'branch_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Branches::find()->all(),'id','branch_name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

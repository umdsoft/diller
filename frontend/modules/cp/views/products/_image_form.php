<?php

use common\models\ProductImages;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductImages */
/* @var $form yii\widgets\ActiveForm */
$model1=new ProductImages();
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model1, 'image')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model1, 'product_id')->hiddenInput(['value'=> $model->id])->label(false) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

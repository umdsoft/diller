<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Income */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Kirim';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="income-form">


    <div class="clients-create">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">


                        <?php $form = ActiveForm::begin(); ?>

                        <div class="row">
                            <div class="col-md-4">
                                <?= $form->field($model, 'supplier_id')->dropDownList(\frontend\components\GetArray::Suppilers(),['prompt'=>'Yetkazib beruvchini tanlang','class'=>'select2']) ?>
                            </div>
                            <div class="col-md-4">
                                <?= $form->field($model, 'warehouse_id')->dropDownList(\frontend\components\GetArray::Warehouses(),['prompt'=>'Omborxonani tanlang','class'=>'select2']) ?>

                            </div>
                            <div class="col-md-4">

                                <?= $form->field($model, 'note')->textInput() ?>

                            </div>
                        </div>

                        <div class="d-flex">

                            <?= $form->field($model, 'note')->textInput() ?>
                            <?= $form->field($model, 'note')->textInput() ?>
                            <?= $form->field($model, 'note')->textInput() ?>
                            <?= $form->field($model, 'note')->textInput() ?>
                            <?= $form->field($model, 'note')->textInput() ?>
                            <?= $form->field($model, 'note')->textInput() ?>
                            <?= $form->field($model, 'note')->textInput() ?>

                        </div>

                        <div class="form-group">
                            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>

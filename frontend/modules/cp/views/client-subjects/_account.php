<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new \common\models\ClientAccounts();
/* @var $this yii\web\View */
/* @var $model common\models\ClientSubjects */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div id="addaccount" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Bank hisob raqami qo'shish</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="client-subjects-form">



                    <?= $form->field($model, 'bank_id')->dropDownList(\frontend\components\GetArray::Banks(),['prompt'=>'Bankni tanlang','class'=>'select2','style'=>'display:block']) ?>

                    <?= $form->field($model,'account')->textInput()?>


                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-success">Saqlash</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Yopish</button>
            </div>
        </div>

    </div>
</div>

<?php ActiveForm::end(); ?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ClientSubjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-subjects-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'alt_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'oked')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nds_number')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <?php
                        if(!$model->isNewRecord){
                            $model->region = $model->district->region_id;
                        }
                    ?>
                    <?= $form->field($model, 'region')->dropDownList(\frontend\components\GetArray::Region(),['prompt'=>'Viloyatni tanlang']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'district_id')->dropDownList(\frontend\components\GetArray::District($model->region),['prompt'=>'Tumanni tanlang']) ?>

                </div>
            </div>



            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'referent_point')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'type_id')->dropDownList(\frontend\components\GetArray::ClientType(),['prompt'=>'Kontragent turini tanlang']) ?>

            <?= $form->field($model, 'group_id')->dropDownList(\frontend\components\GetArray::ClientGroup(),['prompt'=>'Guruhni tanlang']) ?>

            <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>


            <?php $form->field($model, 'lan')->textInput(['maxlength' => true]) ?>

            <?php $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>

        </div>
    </div>






    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$url_district = Yii::$app->urlManager->createUrl(['/cp/default/getdistrict']);
    $this->registerJs("
        $('#region').change(function(){
            $.get('{$url_district}?id='+$('#region').val()).done(function(data){
                $('#clientsubjects-district_id').empty();
                $('#clientsubjects-district_id').append(data);
                
            })
        })
    ")
?>
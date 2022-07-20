<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">

                <?= $form->field($model, 'serial',['template'=>
                "{label}\n<div class=\"input-group\">{input}\n<span class=\"input-group-btn\"><button class=\"btn btn-outline-primary getserialnum\" type=\"button\"><span class=\"fa fa-random\" aria-hidden=\"true\"></span></button></span></div>\n{hint}\n{error}"
            ])->textInput(['maxlength' => true, "aria-describedby"=>"basic-addon2"]) ?>


            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'price')->textInput() ?>

            <?= $form->field($model, 'box')->textInput() ?>

            <?= $form->field($model,'supplier_id')->dropDownList(\frontend\components\GetArray::Suppilers(),['prompt'=>'Yetkazib beruvchini tanlang','class'=>'select2'])?>

            <?= $form->field($model, 'brand_name')->textInput() ?>

        </div>
        <div class="col-md-6">


            <?= $form->field($model, 'category_id')->dropDownList(\frontend\components\GetArray::Category(),['prompt'=>'Mahsulot turini tanlang']) ?>

            <?= $form->field($model, 'is_sale')->dropDownList(Yii::$app->params['is_sale']) ?>

            <?= $form->field($model, 'bio')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <label for="products-image">
                    <img src="/upload/<?= $model->isNewRecord ? 'default.jpg' : $model->image?>" id="blah" style="height:200px; width:auto;">
                </label>
            </div>

            <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>


        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$url = Yii::$app->urlManager->createUrl(['/cp/products/getserial']);
$this->registerJs("
    $('.getserialnum').click(function(){
        $.get('{$url}').done(function(data){
            $('#products-serial').val(data);
        })
    });
    function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        $('#products-image').change(function() {
          readURL(this);
        });
")
?>
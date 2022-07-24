<?php
use yii\widgets\ActiveForm;
/* @var $model \common\models\IncomeOrderProducts*/
/* @var $key integer*/

?>

<?php $form = ActiveForm::begin([
    'options' => [
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
    ]
]); ?>

<?= $model->isNewRecord ? $form->field($model,'product_id')->dropDownList(\frontend\components\GetArray::IncomeProduct($id),['prompt'=>'Mahsulotni tanlang','class'=>'select2 form-control'])
: $form->field($model,'product_id')->dropDownList(\frontend\components\GetArray::Product(),['prompt'=>'Mahsulotni tanlang','class'=>'select2 form-control','disabled'=>true])
?>
<?= $form->field($model,'box')->textInput()?>
<?= $form->field($model,'count')->textInput()?>
<button type="submit" class="btn btn-success">Saqlash</button>
<?php $form = ActiveForm::end();?>


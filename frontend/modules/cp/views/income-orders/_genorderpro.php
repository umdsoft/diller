<?php
use yii\widgets\ActiveForm;
/* @var $products \common\models\IncomeOrderProducts*/
/* @var $key integer*/

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($products,'product_id')->dropDownList(\frontend\components\GetArray::Product(),['prompt'=>'Mahsulotni tanlang','class'=>'select2-'.$key.' form-control'])?>
<?= $form->field($products,'box')->textInput(['type'=>'number','min'=>'1'])?>
<?= $form->field($products,'count')->textInput(['type'=>'number','min'=>'1','value'=>1])?>
<?= $form->field($products,'total')->textInput(['type'=>'number','min'=>'1','value'=>1])?>
<button type="submit" class="btn btn-success">Saqlash</button>
<?php $form = ActiveForm::end();?>



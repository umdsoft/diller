<?php
use yii\widgets\ActiveForm;
/* @var $products \common\models\IncomeOrderProducts*/
/* @var $key integer*/

?>

<?php ob_start();  $form = ActiveForm::begin(); ob_end_flush()?>
<div class="row">
    <div class="col-md-11">
        <div class="row productform" data-key="<?= $key?>">
            <div class="col-md-3">
                <?= $form->field($products,'['.$key.']product_id')->dropDownList(\frontend\components\GetArray::Product(),['prompt'=>'Mahsulotni tanlang','class'=>'select2-'.$key.' form-control'])?>
            </div>
            <div class="col-md-3">
                <?= $form->field($products,'['.$key.']box')->textInput(['type'=>'number','min'=>'1'])?>
            </div>
            <div class="col-md-3">
                <?= $form->field($products,'['.$key.']count')->textInput(['type'=>'number','min'=>'1','value'=>1])?>
            </div>
            <div class="col-md-3">
                <?= $form->field($products,'['.$key.']total')->textInput(['type'=>'number','min'=>'1','value'=>1])?>
            </div>
            <div class="hidden" hidden>
                <?= $form->field($products,'['.$key.']removed')->textInput(['class'=>'form-control removedvalue'])?>
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <button class="btn btn-danger removedchanger" type="button" data-key="<?= $key?>" style="margin-top:32px;"><span class="fa fa-trash"></span></button>
    </div>
</div>
<?php ob_start(); $form = ActiveForm::end(); ob_end_flush(); ?>



<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\IncomeOrders */
/* @var $products common\models\Products[] */
/* @var $form yii\widgets\ActiveForm */
?>
    <script>
        var removeproduct = function(){}
    </script>
<div class="income-orders-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <div class="card-title">
        <h3 class="card-title text-primary">
            Buyurtmachi filial: <b><?= $model->branch->branch_name ?></b>
            <span style="float: right">Buyurtma sanasi: <b><?= $model->created=='CURRENT_TIMESTAMP'?date('d.m.Y'):date('d.m.Y',strtotime($model->created))?></b></span>
        </h3>
    </div>

    <div class="formfull">
        <div class="row">
            <div class="col-md-11">
                <div class="row productform" data-key="1">
                    <div class="col-md-3">
                        <?= $form->field($products,'[1]product_id')->dropDownList(\frontend\components\GetArray::Product(),['prompt'=>'Mahsulotni tanlang','class'=>'select2 form-control'])?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($products,'[1]box')->textInput(['type'=>'number','min'=>'1'])?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($products,'[1]count')->textInput(['type'=>'number','min'=>'1','value'=>1])?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($products,'[1]total')->textInput(['type'=>'number','min'=>'1','value'=>1])?>
                    </div>
                    <div class="hidden" hidden>
                        <?= $form->field($products,'[1]removed')->textInput(['class'=>'form-control removedvalue'])?>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <button class="btn btn-danger removedchanger" type="button" data-key="1" onclick="removeproduct(1)" style="margin-top:32px;"><span class="fa fa-trash"></span></button>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary  addbtn" type="button"><span class="fa fa-plus"></span>Yana qo'shish</button>
        </div>
    </div>


    <div class="form-group mt-4">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$genurl = Yii::$app->urlManager->createUrl(['/cp/income-orders/genorderpro']);
$this->registerJs("
    removeproduct = function(key){
        var val = $('.productform[data-key=\"'+key+'\"] .removedvalue').val();
        var btn = $('.removedchanger[data-key=\"'+key+'\"]');
        if(val == 0){
            $('.productform[data-key=\"'+key+'\"] .removedvalue').val(1);
            btn.html('<span class=\"fa fa-reply\"></span>');
            btn.removeClass('btn-danger');
            btn.addClass('btn-primary');
            $('.productform[data-key=\"'+key+'\"] .col-md-3 input, .productform[data-key=\"'+key+'\"] .col-md-3 select').prop('disabled',true);
        }else{
            $('.productform[data-key=\"'+key+'\"] .removedvalue').val(0);
            btn.html('<span class=\"fa fa-trash\"></span>');
            btn.addClass('btn-danger');
            btn.removeClass('btn-primary');
             $('.productform[data-key=\"'+key+'\"] .col-md-3 input, .productform[data-key=\"'+key+'\"] .col-md-3 select').prop('disabled',false);
        }
    }
    
    
    $('.addbtn').click(function(){
        var maxkey = 0;
        $('.productform').each(function(){
            if(this.getAttribute('data-key') > maxkey){maxkey = this.getAttribute('data-key') ;}
        });
        maxkey ++;
        $.get('{$genurl}?key='+maxkey).done(function(data){
           $('.formfull').append(data); 
           $('.select2-'+maxkey).select2({})
        });
        
    })
    
");

?>
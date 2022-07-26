<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Income */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="income-form">
    <script>
        var remover = function () {}
        var setSerial = function(){}
    </script>
    <?php $form = ActiveForm::begin(); ?>

    <div class="income" data-key="1">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'warehouse_id')->dropDownList(\frontend\components\GetArray::Warehouses()) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'note')->textInput() ?>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover products">
                        <thead>
                        <tr>
                            <td style="width: 380px; max-width: 380px;">Mahsulot</td>
                            <td>Seriyasi</td>
                            <td>Muddati</td>
                            <td>Soni</td>
                            <td>Koropkalar soni</td>
                            <td>Narxi</td>
                            <td>Sotilish narxi</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr data-key="1">
                            <td>
                                <?= $form->field($product,'[1]product_id')->dropDownList(\frontend\components\GetArray::Product(),['prompt'=>'Mahsulotni tanlang',
                                    'class'=>'form-control select2',
                                    'onchange'=>'setSerial(this,1)'])->label(false)?>
                            </td>
                            <td>
                                <?= $form->field($product,'[1]serial')->textInput()->label(false)?>
                            </td>
                            <td>
                                <?= $form->field($product,'[1]exp_date')->textInput(['type'=>'date'])->label(false)?>
                            </td>
                            <td>
                                <?= $form->field($product,'[1]count')->textInput()->label(false)?>
                            </td>
                            <td>
                                <?= $form->field($product,'[1]box')->textInput()->label(false)?>
                            </td>
                            <td>
                                <?= $form->field($product,'[1]price')->textInput()->label(false)?>
                            </td>
                            <td>
                                <?= $form->field($product,'[1]amout')->textInput()->label(false)?>
                            </td>
                            <td>
                                <button  onclick="remover(1)"  type="button" class="btn btn-danger remover"><span class="fa fa-trash"></span></button>
                            </td>
                        </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    <button type="button" data-nextkey="2" class="btn btn-primary" id="add"><span class="fa fa-plus"></span> Mahsulot qo'shish</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
    $url = Yii::$app->urlManager->createUrl(['/cp/income/newproducts']);
    $url_serial = Yii::$app->urlManager->createUrl(['/cp/income/getserial']);
    $this->registerJs("
        $('#add').click(function(){
            nextkey = this.getAttribute('data-nextkey');
            this.setAttribute('data-nextkey',parseInt(nextkey)+1);
            $.get('{$url}?key='+nextkey).done(function(data){
                $('.products').append(data);
                nk = parseInt($('#add').attr('data-nextkey'))-1;
                $('#incomeproducts-'+nk+'-product_id').select2();
            });
            
        });
        remover = function(key){
            $('tr[data-key=\"'+key+'\"]').remove();
        }
        
        setSerial = function(slt,key){
            var id = slt.value;
            $.get('{$url_serial}?id='+id).done(function(data){
                $('#incomeproducts-'+key+'-serial').val(data);
            })
        }
    ");

?>
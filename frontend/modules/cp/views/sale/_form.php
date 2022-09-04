<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sale */
/* @var $client common\models\ClientSubjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sale-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($client, 'type_id')->radioList(\yii\helpers\ArrayHelper::map(\common\models\ClientTypes::find()->all(),'id','name')) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($client, 'phone')->textInput(['type'=>'number']) ?>
            <ul class="list-group" id="livesearch"></ul>
        </div>
        <div class="col-md-6">
            <?= $form->field($client, 'name')->textInput() ?>
            <ul class="list-group" id="livesearchname"></ul>
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
                        <td>Soni</td>
                        <td>Koropkalar soni</td>
                        <td>Narxi</td>
                        <td>Umumiy narx</td>
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
                            <?= $form->field($product,'[1]count')->textInput()->label(false)?>
                        </td>
                        <td>
                            <?= $form->field($product,'[1]box')->textInput()->label(false)?>
                        </td>
                        <td>
                            <?= $form->field($product,'[1]price')->textInput(['disabled'=>true])->label(false)?>
                        </td>
                        <td>
                            <?= $form->field($product,'[1]amout')->textInput(['disabled'=>true])->label(false)?>
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

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$url = Yii::$app->urlManager->createUrl(['/cp/sale/newproducts']);
$url_serial = Yii::$app->urlManager->createUrl(['/cp/income/getserial']);
$url_client_phone = Yii::$app->urlManager->createUrl(['/cp/sale/getclient']);
$url_client_name = Yii::$app->urlManager->createUrl(['/cp/sale/getclientname']);
$get_client_fullphone = Yii::$app->urlManager->createUrl(['/cp/sale/getclientfullphone']);
$get_client_fullname = Yii::$app->urlManager->createUrl(['/cp/sale/getclientfullname']);
$this->registerJs("
    $(document).ready(function(){
            $('#clientsubjects-phone').keyup(function(){
                $('#livesearch').html('');
                
                var searchField = $('#clientsubjects-phone').val();
                
                $.get('{$url_client_phone}?phone='+searchField).done(function(data){
                    $('#livesearch').append(data);
                })
                                
            });

            $('#livesearch').on('click', 'li', function() {
                var click_text = $(this).text();
                
                $('#clientsubjects-phone').val($.trim(click_text));
                $.get('{$get_client_fullname}?id='+$(this).attr('data-key')).done(function(data){
                    $('#clientsubjects-name').val(data);
                })
                $(\"#livesearch\").html('');
            });
            
            
            $('#clientsubjects-name').keyup(function(){
                $('#livesearchname').html('');
                
                var searchField = $('#clientsubjects-name').val();
                
                $.get('{$url_client_name}?name='+searchField).done(function(data){
                    $('#livesearchname').append(data);
                })
                                
            });

            $('#livesearchname').on('click', 'li', function() {
                var click_text = $(this).text();
                
                $('#clientsubjects-name').val($.trim(click_text));
                $.get('{$get_client_fullphone}?id='+$(this).attr('data-key')).done(function(data){
                    $('#clientsubjects-phone').val(data);
                })
                $(\"#livesearchname\").html('');
            });
        });  
        
        
        $('#add').click(function(){
            nextkey = this.getAttribute('data-nextkey');
            this.setAttribute('data-nextkey',parseInt(nextkey)+1);
            $.get('{$url}?key='+nextkey).done(function(data){
                $('.products').append(data);
                nk = parseInt($('#add').attr('data-nextkey'))-1;
                $('#saleproducts-'+nk+'-product_id').select2();
            });
            
        });
        remover = function(key){
            $('tr[data-key=\"'+key+'\"]').remove();
        }
        
        setSerial = function(slt,key){
            var id = slt.value;
            $.get('{$url_serial}?id='+id).done(function(data){
                $('#saleproducts-'+key+'-serial').val(data);
            })
        }
")
?>
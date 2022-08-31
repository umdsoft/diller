<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Sale */

$this->title = 'Sotish';
$this->params['breadcrumbs'][] = ['label' => 'Sotuv', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-create">


    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body p-4">
                    <?= $this->render('_form', [
                        'model' => $model,
                        'client'=>$client,
                        'product'=>$product
                    ]) ?>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */

$this->title = 'Mahsulot turi qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-create">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body p-4">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

                </div>
            </div>
        </div>
    </div>

</div>

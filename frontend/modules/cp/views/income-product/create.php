<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\IncomeProducts */

$this->title = 'Create Income Products';
$this->params['breadcrumbs'][] = ['label' => 'Income Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="income-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

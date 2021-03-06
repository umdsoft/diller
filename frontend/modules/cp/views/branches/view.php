<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Branches */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Filiallar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="branches-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('O`zgartirish', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'branch_name',
            'contracgen_name',
            'leader',
            'alternative_name',
            [
                'attribute'=>'status',
                'value'=>function($d){
                    return Yii::$app->params['status'][$d->status];
                }
            ],
            'responsible',
            'code',
            'number',
            'inn',
            'phone',
            'address',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

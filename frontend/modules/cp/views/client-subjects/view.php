<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ClientSubjects */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Client Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-subjects-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'name',
            'alt_name',
            'district_id',
            'address',
            'lan',
            'lng',
            'phone',
            'email:email',
            'director',
            'inn',
            'oked',
            'nds_number',
            'referent_point',
            'type_id',
            'group_id',
            'note',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

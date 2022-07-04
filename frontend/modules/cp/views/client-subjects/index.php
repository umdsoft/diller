<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ClientSubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Client Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-subjects-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Client Subjects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'alt_name',
            'district_id',
            'address',
            //'lan',
            //'lng',
            //'phone',
            //'email:email',
            //'director',
            //'inn',
            //'oked',
            //'nds_number',
            //'referent_point',
            //'type_id',
            //'group_id',
            //'note',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ClientSubjects $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

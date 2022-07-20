<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ClientSubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tadbirkorlik subyektlari';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-subjects-index">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <p>
                        <?= Html::a('Subyekt qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'inn',
//                            'id',
                            'name',
                            'alt_name',
//                            'district_id',
//                            'address',
                            [
                                'attribute'=>'address',
                                'value'=>function($d){
                                    return $d->district->region->name.' '.$d->district->name.' '.$d->address;
                                },
                            ],
                            //'lan',
                            //'lng',
                            'phone',
                            //'email:email',
                            'director',

                            //'oked',
                            //'nds_number',
                            //'referent_point',
//                            'type_id',
//                            'group_id',
                            [
                                'attribute'=>'group_id',
                                'value'=>function($d){
                                    return $d->group->name;
                                },
                                'filter'=>\frontend\components\GetArray::ClientGroup()
                            ],
                            //'note',
                            'created_at',
                            //'updated_at',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                }
                            ],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>



</div>

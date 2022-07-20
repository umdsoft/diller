<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClientSubjects */

$this->title = 'Tadbirkorlik subyekti qo`shish';
$this->params['breadcrumbs'][] = ['label' => 'Tadbirkorlik subyektlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-subjects-create">

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

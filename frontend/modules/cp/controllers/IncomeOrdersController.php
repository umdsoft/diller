<?php

namespace frontend\modules\cp\controllers;

use common\models\IncomeOrderProducts;
use common\models\IncomeOrders;
use common\models\Products;
use common\models\search\IncomeOrdersSearch;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
/**
 * IncomeOrdersController implements the CRUD actions for IncomeOrders model.
 */
class IncomeOrdersController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all IncomeOrders models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new IncomeOrdersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IncomeOrders model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new IncomeOrders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new IncomeOrders();
        $model->branch_id = Yii::$app->user->identity->branch_id;
        $n = IncomeOrders::find()->filterWhere(['like','created',date('Y-m-d')])->max('number');
        $n++;
        $model->number = $n;
        $model->number_full = date('Y').'-'.$model->number;
        $model->status = 0;
        $model->save();
        return $this->redirect(['update','id'=>$model->id]);
    }


    public function actionProduct($id,$pid=null){
        if($pid){
            $model = IncomeOrderProducts::findOne($pid);
        }else{
            $model = new IncomeOrderProducts();
        }
        $model->order_id = $id;
        if($model->load($this->request->post())){
            $total = floatval(floatval($model->box) * floatval($model->product->box) + floatval($model->count));
            $model->total = "{$total}";
            if($model->save()){
                return $this->redirect(['update','id'=>$id]);
            }else{
                echo "<pre>";
                var_dump($model);
                exit;
            }
        }
        return $this->renderAjax('_genorderpro',['model'=>$model,'id'=>$id]);
    }
    /**
     * Updates an existing IncomeOrders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$type = null)
    {
        $model = $this->findModel($id);
        if($type == 'submit'){
            Yii::$app->session->setFlash('success','Buyurtma ma`lumotlari saqlandi');
            return $this->redirect(['view','id'=>$id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IncomeOrders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IncomeOrders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return IncomeOrders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IncomeOrders::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

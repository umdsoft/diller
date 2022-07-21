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

    public function actionGenorderpro($key){
        $model = new IncomeOrderProducts();
        $html = $this->renderAjax('_genorderpro',['key'=>$key,'products'=>$model]);
        $res = mb_substr($html,0,strpos($html,'<form '));
        return $res;
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
        $products = [];
        $products[] = new IncomeOrderProducts();
        $model->branch_id = Yii::$app->user->identity->branch_id;
        if ($this->request->isPost) {
            $n = IncomeOrders::find()->filterWhere(['like','created','date'])->max('number');
            $model->number = $n?$n+1:1;
            $model->number_full = date('Y').'-'.$model->number;
            $model->status = 0;
            if($model->save()){
                $postData = $this->request->post('IncomeOrderProducts');
                if ($postData) {
                    foreach ($postData as $i => $single) {
                        if($single['removed'] == 0){
                            $products[$i] = new IncomeOrderProducts();
                            $products[$i]->order_id = $model->id;
                            $products[$i]->status = 0;
                            $products[$i]->product_id = $single['product_id'];
                            $products[$i]->box = $single['box']?$single['box']:0;
                            $products[$i]->count = $single['count'];
                            $products[$i]->total = intval($single['box']) * intval($products[$i]->product->box) + intval($single['count']);
                            $products[$i]->save(false);
                        }
                    }
                }
            }else{
                echo "<pre>";
                var_dump($this->request->post());
                exit;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'products'=>new IncomeOrderProducts()
        ]);
    }

    /**
     * Updates an existing IncomeOrders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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

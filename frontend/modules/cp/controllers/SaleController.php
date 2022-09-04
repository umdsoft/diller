<?php

namespace frontend\modules\cp\controllers;

use common\models\ClientSubjects;
use common\models\Sale;
use common\models\SaleProducts;
use common\models\search\SaleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
/**
 * SaleController implements the CRUD actions for Sale model.
 */
class SaleController extends Controller
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
     * Lists all Sale models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SaleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sale model.
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

    public function actionGetclient($phone){
        $model = ClientSubjects::find()->filterWhere(['like','phone',"{$phone}"])->all();
        $res = "";
        foreach ($model as $item) {
            $res .= "<li class=\"list-group-item live-link-class\" data-key='{$item->id}'>{$item->phone}</li>";
        }
        return $res;
    }
    public function actionGetclientname($name){
        $model = ClientSubjects::find()->filterWhere(['like','name',"{$name}"])->all();
        $res = "";
        foreach ($model as $item) {
            $res .= "<li class=\"list-group-item live-link-class\" data-key='{$item->id}'>{$item->name}</li>";
        }
        return $res;
    }

    public function actionGetclientfullname($id){
        if($model = ClientSubjects::findOne($id)){
            return $model->name;
        }else{
            return -999;
        }
    }
    public function actionGetclientfullphone($id){
        if($model = ClientSubjects::findOne($id)){
            return $model->phone;
        }else{
            return -999;
        }
    }
    public
    function actionNewproducts($key = 2)
    {

        return $this->renderAjax('_gen', ['key' => $key]);

    }
    /**
     * Creates a new Sale model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Sale();
        $client = new ClientSubjects();
        $model->operator_id =  Yii::$app->user->identity->id;
        $product = new SaleProducts();
        $client->type_id = 1;
        $client->district_id = 0;
        $client->group_id = 0;
        if($this->request->isPost){

           if($client->load($this->request->post())){
               if($cl = ClientSubjects::findOne(['phone'=>$client->phone])){
                   $model->client_subject_id = $cl->id;
                   $cl->updated_at = date('Y-m-d h:i:s');
                   $cl->save();
               }else{
                   $client->alt_name = $client->name;
                   $client->save();
               }
               $model->client_subject_id = $client->id;
               $model->total_price = 0;
               $model->paid = 0;
               $model->operator_id = Yii::$app->user->id;
               $model->type_id = 1;
               $model->status_id = 7;
               $model->branch_id = Yii::$app->user->identity->branch_id;
               if($model->save()){
                   $total = 0;
                   $pros = $this->request->post('SaleProducts');

                   foreach ($pros as $item){
                      $pro = new SaleProducts();
                      $pro->setAttributes($item);
                      $pro->sale_id = $model->id;
                      $pro->total = (intval($pro->count)+(intval($pro->box) * intval($pro->product->box))) * $pro->product->price;
                      $pro->total = "{$pro->total}";
                      $total += $pro->total;
                      $pro->save();
                   }
                   $model->total_price = $total;
                   $model->save();
               }
               return $this->redirect(['view', 'id' => $model->id]);
           }

        }


        return $this->render('create', [
            'model' => $model,
            'client'=>$client,
            'product'=>$product
        ]);
    }

    /**
     * Updates an existing Sale model.
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
     * Deletes an existing Sale model.
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
     * Finds the Sale model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Sale the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sale::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

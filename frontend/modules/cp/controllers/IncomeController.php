<?php

namespace frontend\modules\cp\controllers;

use common\models\Income;
use common\models\IncomeProducts;
use common\models\Model;
use common\models\Products;
use common\models\search\IncomeSearch;
use common\models\Suppliers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\Request;

/**
 * IncomeController implements the CRUD actions for Income model.
 */
class IncomeController extends Controller
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
     * Lists all Income models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new IncomeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Income model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $suppliers = Suppliers::find()->select(['suppliers.*'])
            ->innerJoin('products p', 'suppliers.id = p.supplier_id')
            ->where('p.id in (select product_id from income_products where income_id=' . $id . ')')
            ->groupBy('suppliers.id')->orderBy(['count(p.id)' => SORT_DESC])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'suppliers' => $suppliers,
        ]);
    }

    public function actionGetserial($id)
    {
        return @Products::findOne($id)->serial;
    }

    /**
     * Creates a new Income model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate(Request $request)
    {
        $model = new Income();
        $product = new IncomeProducts();

        $model->user_id = Yii::$app->user->identity->id;
        if ($request->isPost && $model->load($request->post())) {
            if ($model->save()) {
                $incomeProducts = $request->post('IncomeProducts');
                foreach ($incomeProducts as $incomeProductItem) {
                    $modelIncomeProduct = new IncomeProducts();
                    $modelIncomeProduct->setAttributes($incomeProductItem);
                    $modelIncomeProduct->income_id = $model->id;
                    $modelProduct = Products::find()->where(['serial' => $modelIncomeProduct->serial])->one();
                    $modelProduct->price = $modelIncomeProduct->amout;
                    $modelIncomeProduct->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'product' => $product
        ]);
    }

    public
    function actionNewproducts($key = 2)
    {

        return $this->renderAjax('_gen', ['key' => $key]);

    }

    /**
     * Updates an existing Income model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionUpdate($id)
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
     * Deletes an existing Income model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Income model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Income the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel($id)
    {
        if (($model = Income::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

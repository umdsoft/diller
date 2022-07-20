<?php

namespace frontend\modules\cp\controllers;

use common\models\ClientAccounts;
use common\models\ClientSubjects;
use common\models\search\ClientSubjectsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
/**
 * ClientSubjectsController implements the CRUD actions for ClientSubjects model.
 */
class ClientSubjectsController extends Controller
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
                        'deleteacc' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ClientSubjects models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ClientSubjectsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClientSubjects model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = new ClientAccounts();
        $model->subject_id = $id;
        if($model->load(Yii::$app->request->post()) and $model->save()){
            $model->refresh();
            Yii::$app->session->setFlash('success','Bank hisob raqami muvoffaqiyatli qo`shildi');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ClientSubjects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ClientSubjects();
        $model->scenario = 'insert';
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ClientSubjects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'insert';
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ClientSubjects model.
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

    public function actionDeleteacc($id,$sid){
        if($model = ClientAccounts::findOne($id)){
            $model->delete();
            Yii::$app->session->setFlash('success','Bank hisobi muvoffaqiyatli o`chirildi');
        }else{
            Yii::$app->session->setFlash('error','Bunday bank hisobi topilmadi');
        }
        return $this->redirect(['view','id'=>$sid]);
    }

    /**
     * Finds the ClientSubjects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ClientSubjects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClientSubjects::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

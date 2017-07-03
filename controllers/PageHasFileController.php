<?php

namespace app\models;

use Yii;
use app\models\PageHasFile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageHasFileController implements the CRUD actions for PageHasFile model.
 */
class PageHasFileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PageHasFile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PageHasFile::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PageHasFile model.
     * @param string $page_id
     * @param string $file_id
     * @return mixed
     */
    public function actionView($page_id, $file_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($page_id, $file_id),
        ]);
    }

    /**
     * Creates a new PageHasFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PageHasFile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'page_id' => $model->page_id, 'file_id' => $model->file_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PageHasFile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $page_id
     * @param string $file_id
     * @return mixed
     */
    public function actionUpdate($page_id, $file_id)
    {
        $model = $this->findModel($page_id, $file_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'page_id' => $model->page_id, 'file_id' => $model->file_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PageHasFile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $page_id
     * @param string $file_id
     * @return mixed
     */
    public function actionDelete($page_id, $file_id)
    {
        $this->findModel($page_id, $file_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PageHasFile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $page_id
     * @param string $file_id
     * @return PageHasFile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($page_id, $file_id)
    {
        if (($model = PageHasFile::findOne(['page_id' => $page_id, 'file_id' => $file_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

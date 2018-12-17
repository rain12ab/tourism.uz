<?php

namespace backend\controllers;

use Yii;
use common\models\Guides;
use backend\models\GuidesSeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GuidesController implements the CRUD actions for Guides model.
 */
class GuidesController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Guides models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GuidesSeach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Guides model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Guides model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Guides();

        if ($model->load(Yii::$app->request->post())) {
            $uni = uniqid();
            $pic = $model->pic["300x300"];
            $pic = str_replace('data:image/png;base64,', '', $pic);
            $pic = str_replace(' ', '+', $pic);
            $pic = base64_decode($pic);
            $file = '../../frontend/web/images/guides/' . $uni . '.png';
            $url = 'images/guides/' . $uni . '.png';
            $success1 = file_put_contents($file, $pic);
            $model->pic = $url;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Guides model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pic_prev = $model->pic;
        if ($model->load(Yii::$app->request->post())) {
            // var_dump($model->pic);
            // die;
            if($model->pic["300x300"] != " ")
            {
                $uni = uniqid();
                $pic = $model->pic["300x300"];
                $pic = str_replace('data:image/png;base64,', '', $pic);
                $pic = str_replace(' ', '+', $pic);
                $pic = base64_decode($pic);
                $file = '../../frontend/web/images/guides/' . $uni . '.png';
                $url = 'images/guides/' . $uni . '.png';
                $success1 = file_put_contents($file, $pic);
                $model->pic = $url;
                $model->save();
                $oldFile = $pic_prev ? Yii::getAlias('@frontend/web/') . $pic_prev : null;
                if ($oldFile && file_exists($oldFile)) unlink($oldFile);
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {
                $model->pic = $pic_prev;
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Guides model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $oldFile = $model->pic ? Yii::getAlias('@frontend/web/') . $model->pic : null;
        if ($oldFile && file_exists($oldFile)) unlink($oldFile);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Guides model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Guides the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Guides::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

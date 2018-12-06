<?php

namespace backend\controllers;

use Yii;
use common\models\Hotels;
use backend\models\HotelsSeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HotelsController implements the CRUD actions for Hotels model.
 */
class HotelsController extends Controller
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
     * Lists all Hotels models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HotelsSeach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    // public function actionAddpic()
    // {
    //     $model = $this->findModel(1);
    //     $img_array = $model->pics;
    //     if ($model->load(Yii::$app->request->post())) {
    //         $img_name = uniqid();
    //         $temp_name = uniqid().'_temp';
    //         $img = UploadedFile::getInstance($model, 'img_file');
    //         $img->saveAs('../../frontend/web/images/about/'.$temp_name.'.'.$img->extension);
    //         Image::resize(Yii::getAlias('@frontend/web/').'/images/about/'.$temp_name.'.'.$img->extension, 1280, 720)->save('../../frontend/web/images/about/'.$img_name.'.'.$img->extension, ['quality' => 50]);
    //         array_push($img_array, 'images/about/'.$img_name.'.'.$img->extension);
    //         $model->pics = $img_array;
    //         $oldFile = $img ? Yii::getAlias('@frontend/web/') . '../../frontend/web/images/about/'.$temp_name.'.'.$img->extension : null;
    //         if ($oldFile && file_exists($oldFile)) unlink($oldFile);
    //         $model->save();
    //         Yii::$app->session->setFlash('success', "Rasm qo'shildi!");
    //         return $this->redirect(['update', 'id' => 1]);
    //     }
    //     else {
    //         Yii::$app->session->setFlash('success', "Xatolik uchratildi!");
    //         return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    //     }
        
    // }

    /**
     * Displays a single Hotels model.
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
     * Creates a new Hotels model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hotels();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Hotels model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Hotels model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hotels model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hotels the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hotels::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

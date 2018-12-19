<?php

namespace backend\controllers;

use Yii;
use common\models\Slider;
use backend\models\SliderSeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\widgets\ActiveForm;


/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
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
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderSeach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slider();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        $url = '../../frontend/web/images/slider/';
        if ($model->load(Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstance($model, 'img');
            $pic_main_name = $model->img->baseName.rand(333, 9999);
            $pic_temp_name = $pic_main_name.'_temp';
            $model->img->saveAs($url.$pic_temp_name.'.'.$model->img->extension);
            Image::resize(Yii::getAlias('@frontend/web/').'/images/slider/'.$pic_temp_name.'.'.$model->img->extension, 1900, 850)->save($url.$pic_main_name.'.'.$model->img->extension, ['quality' => 100]);
            $oldFile = $model->img ? Yii::getAlias('@frontend/web/') . $url.$pic_temp_name.'.'.$model->img->extension : null;
            if ($oldFile && file_exists($oldFile)) unlink($oldFile);
            $model->img = 'images/slider/'.$pic_main_name.'.'.$model->img->extension;
            $model->save();
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $url = '../../frontend/web/images/slider/';
        $pic_prev = $model->img;
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            if(UploadedFile::getInstance($model, 'img') == null)
                {
                    $model->img = $pic_prev;
                    $model->save();
                }
            else
                {
                    $model->img = UploadedFile::getInstance($model, 'img');
                    $pic_main_name = $model->img->baseName.rand(333, 9999);
                    $pic_temp_name = $pic_main_name.'_temp';
                    $model->img->saveAs($url.$pic_temp_name.'.'.$model->img->extension);
                    Image::resize(Yii::getAlias('@frontend/web/').'/images/slider/'.$pic_temp_name.'.'.$model->img->extension, 1900, 850)->save($url.$pic_main_name.'.'.$model->img->extension, ['quality' => 100]);
                    $oldFile = $model->img ? Yii::getAlias('@frontend/web/') . $url.$pic_temp_name.'.'.$model->img->extension : null;
                    if ($oldFile && file_exists($oldFile)) unlink($oldFile);
                    $model->img = 'images/slider/'.$pic_main_name.'.'.$model->img->extension;
                    $oldFile = $pic_prev ? Yii::getAlias('@frontend/web/') . $pic_prev : null;
                    if ($oldFile && file_exists($oldFile)) unlink($oldFile);
                    $model->save();
                }
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $oldFile = $model->img ? Yii::getAlias('@frontend/web/') . $model->img : null;
        if ($oldFile && file_exists($oldFile)) unlink($oldFile);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

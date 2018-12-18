<?php

namespace backend\controllers;

use Yii;
use common\models\Slider;
use backend\models\SliderSeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $url = '../../frontend/web/images/slider/';
        if ($model->load(Yii::$app->request->post())) {
            $model->img = UploadedFile::getInstance($model, 'url');
            $pic_main_name = $model->img->baseName.rand(333, 9999);
            $pic_temp_name = $pic_main_name.'_temp';
            $model->img->saveAs($url.$pic_temp_name.'.'.$model->img->extension);
            Image::resize(Yii::getAlias('@frontend/web/').'/images/slider/'.$pic_temp_name.'.'.$model->img->extension, 1280, 720)->save($url.$pic_main_name.'.'.$model->img->extension, ['quality' => 75]);
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
        $url = '../../frontend/web/images/gallery/';
        $pic_prev = $model->url;
        if ($model->load(Yii::$app->request->post())) {
            if(UploadedFile::getInstance($model, 'url') == null)
                {
                    $model->url = $pic_prev;
                    $model->save();
                }
            else
                {
                    $model->url = UploadedFile::getInstance($model, 'url');
                    $pic_main_name = $model->url->baseName.rand(333, 9999);
                    $pic_temp_name = $pic_main_name.'_temp';
                    $model->url->saveAs($url.$pic_temp_name.'.'.$model->url->extension);
                    Image::resize(Yii::getAlias('@frontend/web/').'/images/gallery/'.$pic_temp_name.'.'.$model->url->extension, 1280, 720)->save($url.$pic_main_name.'.'.$model->url->extension, ['quality' => 75]);
                    $oldFile = $model->url ? Yii::getAlias('@frontend/web/') . $url.$pic_temp_name.'.'.$model->url->extension : null;
                    if ($oldFile && file_exists($oldFile)) unlink($oldFile);
                    $model->url = 'images/gallery/'.$pic_main_name.'.'.$model->url->extension;
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

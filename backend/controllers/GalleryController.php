<?php

namespace backend\controllers;

use Yii;
use common\models\Gallery;
use backend\models\GallerySeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\web\UploadedFile;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
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
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GallerySeach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gallery model.
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
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gallery();
        $url = '../../frontend/web/images/gallery/';
        if ($model->load(Yii::$app->request->post())) {
            $model->url = UploadedFile::getInstance($model, 'url');
            $pic_main_name = $model->url->baseName.rand(333, 9999);
            $pic_temp_name = $pic_main_name.'_temp';
            $model->url->saveAs($url.$pic_temp_name.'.'.$model->url->extension);
            Image::resize(Yii::getAlias('@frontend/web/').'/images/gallery/'.$pic_temp_name.'.'.$model->url->extension, 1280, 720)->save($url.$pic_main_name.'.'.$model->url->extension, ['quality' => 75]);
            $oldFile = $model->url ? Yii::getAlias('@frontend/web/') . $url.$pic_temp_name.'.'.$model->url->extension : null;
            if ($oldFile && file_exists($oldFile)) unlink($oldFile);
            $model->url = 'images/gallery/'.$pic_main_name.'.'.$model->url->extension;
            $model->save();
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Gallery model.
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
     * Deletes an existing Gallery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $oldFile = $model->url ? Yii::getAlias('@frontend/web/') . $model->url : null;
        if ($oldFile && file_exists($oldFile)) unlink($oldFile);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

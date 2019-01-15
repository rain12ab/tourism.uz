<?php

namespace backend\controllers;

use Yii;
use common\models\News;
use backend\models\NewsSeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSeach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort(['defaultOrder' => ['id' => SORT_DESC]]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();
        $url = '../../frontend/web/images/news/';
        if ($model->load(Yii::$app->request->post())) {
            $model->pic = UploadedFile::getInstance($model, 'pic');
            $pic_main_name = $model->pic->baseName.rand(333, 9999);
            $pic_temp_name = $pic_main_name.'_temp';
            $model->pic->saveAs($url.$pic_temp_name.'.'.$model->pic->extension);
            Image::resize(Yii::getAlias('@frontend/web/').'/images/news/'.$pic_temp_name.'.'.$model->pic->extension, 1280, 720)->save($url.$pic_main_name.'.'.$model->pic->extension, ['quality' => 50]);
            $oldFile = $model->pic ? Yii::getAlias('@frontend/web/') . $url.$pic_temp_name.'.'.$model->pic->extension : null;
            if ($oldFile && file_exists($oldFile)) unlink($oldFile);
            $model->pic = 'images/news/'.$pic_main_name.'.'.$model->pic->extension; 
        $model->save(false);
        return $this->redirect(['view', 'id' => $model->id]);
        }        
            
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing news model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $url = '../../frontend/web/images/news/';
        $prev_main = $model->pic;
        if ($model->load(Yii::$app->request->post())) {
            if(empty(UploadedFile::getInstances($model, 'pic')) == true)
            {
                $model->pic = $prev_main;
            }
            else
            {
                $model->pic = UploadedFile::getInstance($model, 'pic');
                $pic_main_name = $model->pic->baseName.rand(333, 9999);
                $pic_temp_name = $pic_main_name.'_temp';
                $model->pic->saveAs($url.$pic_temp_name.'.'.$model->pic->extension);
                Image::resize(Yii::getAlias('@frontend/web/').'/images/news/'.$pic_temp_name.'.'.$model->pic->extension, 1280, 720)->save($url.$pic_main_name.'.'.$model->pic->extension, ['quality' => 50]);
                $oldFile = $prev_main ? Yii::getAlias('@frontend/web/') . $prev_main : null;
                if ($oldFile && file_exists($oldFile)) unlink($oldFile);
                $tempFile = $model->pic ? Yii::getAlias('@frontend/web/') . $url.$pic_temp_name.'.'.$model->pic->extension : null;
                if ($tempFile && file_exists($tempFile)) unlink($tempFile);
                $model->pic = 'images/news/'.$pic_main_name.'.'.$model->pic->extension;
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

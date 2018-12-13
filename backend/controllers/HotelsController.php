<?php

namespace backend\controllers;

use Yii;
use common\models\Hotels;
use backend\models\HotelsSeach;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;

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
                    'deletepic' => ['POST'],
                    'addpic' => ['POST'],
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

    public function actionSelect()
    {
        return $this->render('select');
    }
    
    public function actionAddpic($id)
    {
        $model = $this->findModel($id);
        $url = '../../frontend/web/images/hotels/';
        $img_array = $model->pictures;
        if ($model->load(Yii::$app->request->post())) {
            $img = UploadedFile::getInstance($model, 'img_file');
            $img_name = $img->baseName.rand(333, 9999);
            $temp_name = $img_name.'_temp';
            $img->saveAs($url.$temp_name.'.'.$img->extension);
            Image::resize(Yii::getAlias('@frontend/web/').'/images/hotels/'.$temp_name.'.'.$img->extension, 1280, 720)->save($url.$img_name.'.'.$img->extension, ['quality' => 50]);
            array_push($img_array, 'images/hotels/'.$img_name.'.'.$img->extension);
            $model->pictures = $img_array;
            $oldFile = $img ? Yii::getAlias('@frontend/web/') . $url.$temp_name.'.'.$img->extension : null;
            if ($oldFile && file_exists($oldFile)) unlink($oldFile);
            $model->save(false);
            Yii::$app->session->setFlash('success', "Rasm qo'shildi!");
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
        else {
            Yii::$app->session->setFlash('success', "Xatolik uchratildi!");
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
        
    }

    public function actionDeletepic($i, $id)
    {
        $model = $this->findModel($id);
        $pics = $model->pictures;
        $oldFile = $pics[$i] ? Yii::getAlias('@frontend/web/') . $pics[$i] : null;
        if ($oldFile && file_exists($oldFile)) unlink($oldFile);
        unset($pics[$i]);
        $model->pictures = $pics;
        $model->pictures = array_values($model->pictures);
        $model->save(false); 

        Yii::$app->session->setFlash('success', "Rasm o'chirildi!");

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }


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
        $url = '../../frontend/web/images/hotels/';
        if ($model->load(Yii::$app->request->post())) {
            $model->pic_main = UploadedFile::getInstance($model, 'pic_main');
            $pic_main_name = $model->pic_main->baseName.rand(333, 9999);
            $pic_temp_name = $pic_main_name.'_temp';
            $model->pic_main->saveAs($url.$pic_temp_name.'.'.$model->pic_main->extension);
            Image::resize(Yii::getAlias('@frontend/web/').'/images/hotels/'.$pic_temp_name.'.'.$model->pic_main->extension, 1280, 720)->save($url.$pic_main_name.'.'.$model->pic_main->extension, ['quality' => 50]);
            $oldFile = $model->pic_main ? Yii::getAlias('@frontend/web/') . $url.$pic_temp_name.'.'.$model->pic_main->extension : null;
            if ($oldFile && file_exists($oldFile)) unlink($oldFile);
            $model->pic_main = 'images/hotels/'.$pic_main_name.'.'.$model->pic_main->extension;
           
            if ($files = UploadedFile::getInstances($model, 'pictures')) {
                $img_array = array();
                foreach ($files as $file) {
                    $img_name = $file->baseName.rand(333, 9999);
                    $temp_name = $img_name.'_temp';
                    $file->saveAs($url.$temp_name.'.'.$file->extension);
                    Image::resize(Yii::getAlias('@frontend/web/').'/images/hotels/'.$temp_name.'.'.$file->extension, 1280, 720)->save($url.$img_name.'.'.$file->extension, ['quality' => 50]);
                    $oldFile = $file ? Yii::getAlias('@frontend/web/') . $url.$temp_name.'.'.$file->extension : null;
                    if ($oldFile && file_exists($oldFile)) unlink($oldFile);
                    array_push($img_array, 'images/hotels/'.$img_name.'.'.$file->extension);
                }
                $model->pictures = $img_array;
            }
            else {
                Yii::$app->session->setFlash('success', "Xatolik uchratildi!");
                return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
            }  
        $model->save(false);
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
        $url = '../../frontend/web/images/hotels/';
        $prev_img = $model->pictures;
        $prev_main = $model->pic_main;
        if ($model->load(Yii::$app->request->post())) {
            if(empty(UploadedFile::getInstances($model, 'pictures')) == true)
            {
                $model->pictures = $prev_img;
            }
            else
            {
                if ($files = UploadedFile::getInstances($model, 'pictures')) {
                    foreach ($files as $file) {
                        $img_name = $file->baseName.rand(333, 9999);
                        $temp_name = $img_name.'_temp';
                        $file->saveAs($url.$temp_name.'.'.$file->extension);
                        Image::resize(Yii::getAlias('@frontend/web/').'/images/hotels/'.$temp_name.'.'.$file->extension, 1280, 720)->save($url.$img_name.'.'.$file->extension, ['quality' => 50]);
                        $oldFile = $file ? Yii::getAlias('@frontend/web/') . $url.$temp_name.'.'.$file->extension : null;
                        if ($oldFile && file_exists($oldFile)) unlink($oldFile);
                        array_push($prev_img, 'images/hotels/'.$img_name.'.'.$file->extension);
                    }
                    $model->pictures = $prev_img;
                }
            }
            if(empty(UploadedFile::getInstances($model, 'pic_main')) == true)
            {
                $model->pic_main = $prev_main;
            }
            else
            {
                $model->pic_main = UploadedFile::getInstance($model, 'pic_main');
                $pic_main_name = $model->pic_main->baseName.rand(333, 9999);
                $pic_temp_name = $pic_main_name.'_temp';
                $model->pic_main->saveAs($url.$pic_temp_name.'.'.$model->pic_main->extension);
                Image::resize(Yii::getAlias('@frontend/web/').'/images/hotels/'.$pic_temp_name.'.'.$model->pic_main->extension, 1280, 720)->save($url.$pic_main_name.'.'.$model->pic_main->extension, ['quality' => 50]);
                $oldFile = $prev_main ? Yii::getAlias('@frontend/web/') . $prev_main : null;
                if ($oldFile && file_exists($oldFile)) unlink($oldFile);
                $model->pic_main = 'images/hotels/'.$pic_main_name.'.'.$model->pic_main->extension;
            }
            $model->save(false);
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
        $model = $this->findModel($id);
        for ($i=0; $i < count($model->pictures) ; $i++) { 
            $oldFile = $model->pictures ? Yii::getAlias('@frontend/web/') . '../../frontend/web/'.$model->pictures[$i] : null;
            if ($oldFile && file_exists($oldFile)) unlink($oldFile);
        }
        $oldFile = $model->pic_main ? Yii::getAlias('@frontend/web/') . '../../frontend/web/'.$model->pic_main : null;
        if ($oldFile && file_exists($oldFile)) unlink($oldFile);
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

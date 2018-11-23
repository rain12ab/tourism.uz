<?php

namespace frontend\controllers;

use Yii;
use common\models\Hotels;
use common\models\Currency;
use frontend\models\HotelsSearch;
use yii\web\Controller;
use linslin\yii2\curl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * HotelsController implements the CRUD actions for Hotels model.
 */
class HotelsController extends Controller
{
    public $layout = 'content';
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
        $currency = Currency::find()->orderBy('id DESC')->one();
        $searchModel = new HotelsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'currency' => $currency,
        ]);
    }

    public function actionList($q = null) {
        $query = new Query;
        if(Yii::$app->language == 'uz')
            {
                $name = 'name_uz';
            }
        else if(Yii::$app->language == 'ru')
            {
                $name = 'name_ru';
            }
        else if(Yii::$app->language == 'en')
            {
                $name = 'name_en';
            }
        else
            {
                $name = null;
            }
        $query->select($name)
            ->from('hotels')
            ->where($name.' LIKE "%' . $q .'%"')
            ->orderBy($name);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out = [];
        foreach ($data as $d) {
            $out[] = ['value' => $d[$name]];
        }
        return Json::encode($out);
    }

    public function actionCalculate($sum)
    {
        if(date('l') == 'Tuesday')
            {
                $url = 'https://www.uba.uz/ru/services/open_data/rates/json/?year='.date('Y');
                $curl = new curl\Curl();
                $response = $curl->get($url);
                
                switch ($curl->responseCode) {

                    case 'timeout':
                        $currency = Currency::find()->orderBy('id DESC')->one();
                        break;
                        
                    case 200:
                        $json = json_decode($response, true);
                        $json = end($json);
                        if(Currency::find()->where(['date' => $json['G1']])->exists() != true)
                        {
                            $model = new Currency;
                            $model->dollar = $json['G2'];
                            $model->euro = $json['G3'];
                            $model->date = $json['G1'];
                            $model->save(false);
                        }
                        $currency = Currency::find()->orderBy('id DESC')->one();
                        break;

                    case 404:
                        $currency = Currency::find()->orderBy('id DESC')->one();
                        break;
                }

                $price_dollar = ($sum / $currency->dollar);
                $price_euro = ($sum / $currency->euro);
                $result = [$price_dollar, $price_euro];
                return $result;
            }
        else
            {
                $currency = Currency::find()->orderBy('id DESC')->one();
                $price_dollar = ($sum / $currency->dollar);
                $price_euro = ($sum / $currency->euro);
                $result = [$price_dollar, $price_euro];
                return $result;
            }
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

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

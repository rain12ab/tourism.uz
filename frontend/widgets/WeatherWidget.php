<?php

namespace frontend\widgets;


use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\Html;
use common\models\Contacts;
use yii\db\Query;
use yii\helpers\Json;
use linslin\yii2\curl;

class WeatherWidget extends Widget
{
    public function run()
    {
		$curl = new curl\Curl();
        $response = $curl->get('api.openweathermap.org/data/2.5/weather?id=1513131&appid=46a5ab8b58b027dece92205f23f64379&units=metric');
        $json = json_decode($response, true);
        return $this->render('weather', [
        	'json' => $json,
        ]);
    }

}

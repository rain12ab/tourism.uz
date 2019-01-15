<style>
    #shadowfilter {
     filter: drop-shadow(1px 1px 4px rgba(255, 255, 255, 255));
}
</style>
<p style="width: 300px; padding: 1em; margin: 1em 0; background-color: rgba(0, 0, 0, 0.5); float: left;"><?= Yii::t('app', 'Hozir Navoiyda').':';?>
	<?= $json['main']['temp'].'°C';?><img style="float: right; width: 50px; margin-top: -10px;" src="http://openweathermap.org/img/w/<?= $json['weather'][0]['icon'].'.png';?>" id="shadowfilter"></p>
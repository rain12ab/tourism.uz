<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\assets\AwesomeAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Alert;
use yii\widgets\Pjax;
use yii\web\View;

AppAsset::register($this);
AwesomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="">
<?php $this->beginBody() ?>

  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini" style="margin: 10px!important; width: 70px">
            <img style="width: 100%" src="<?= Yii::$app->homeUrl.'img/logo_white.png';?>">
          </a>
          <a href="<?= Yii::$app->homeUrl;?>" class="simple-text logo-normal">
            Navoi tourism<br>Admin panel
          </a>
        </div>
        <ul style="margin-bottom: 15vh!important;" class="nav">
          <li>
            <a href="<?= Url::to(['site/index']);?>">
              <i class="fas fa-chart-line"></i>
              <p>Bosh sahifa</p>
            </a>
          </li>
          <li>
            <a href="<?= Url::to(['about/selector']);?>">
              <i class="fas fa-address-card"></i>
              <p>Boshqarma ma'lumotlari</p>
            </a>
          </li>
          <li>
            <a href="<?= Url::to(['laws/index']);?>">
              <i class="fas fa-gavel"></i>
              <p>Qonunchilik</p>
            </a>
          </li>
          <li>
            <a href="<?= Url::to(['news/index']);?>">
              <i class="fas fa-newspaper"></i>
              <p>Yangiliklar</p>
            </a>
          </li>
          <li>
            <a href="<?= Url::to(['hotels/index']);?>">
              <i class="fas fa-hotel"></i>
              <p>Mehmonxonalar</p>
            </a>
          </li>
          <li>
            <a href="<?= Url::to(['restaurants/index']);?>">
              <i class="fas fa-utensils"></i>
              <p>Ovqatlanish maskanlari</p>
            </a>
          </li>
          <li>
            <a href="<?= Url::to(['guides/index']);?>">
              <i class="fab fa-jenkins"></i>
              <p>Gidlar</p>
            </a>
          </li>
          <li>
            <a href="<?= Url::to(['gallery/index']);?>">
              <i class="fas fa-images"></i>
              <p>Galereya</p>
            </a>
          </li>
          <li>
            <a href="<?= Url::to(['slider/index']);?>">
              <i class="tim-icons icon-tv-2"></i>
              <p>Slider</p>
            </a>
          </li>
          <li>
            <a href="<?= Url::to(['language/selector']);?>">
              <i class="fas fa-language"></i>
              <p>Tillar</p>
            </a>
          </li>
          <li>
            <a href="<?= Url::to(['links/index']);?>">
              <i class="tim-icons icon-link-72"></i>
              <p>Davlat manbalari</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]);
            ?>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="<?= Yii::$app->homeUrl.'img/default-avatar.png';?>" alt="Profile Photo">
                  </div>
                  <span style="margin-right: 2vh;"><?= Yii::$app->user->identity->username;?></span>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Chiqish
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="<?= Url::to(['site/settings']);?>" class="nav-item dropdown-item">Sozlamalar</a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link">
                    <a href="<?= Url::to(['site/logout']); ?>" data-method="post" class="nav-item dropdown-item">Chiqish</a>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <?php if(Yii::$app->session->hasFlash('success')):?>
        <?= Alert::widget([
          'options' => ['class' => 'alert-success'],
          'body' => Yii::$app->session->getFlash('success'),
        ]) ?>
        <?php endif;?>
        <?php 
        $js=<<< JS
     $(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");
JS;

$this->registerJs($js, yii\web\View::POS_READY);
        ?>
        <?= $content;?>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="tel:+998913322545" style="font-size: 14px;" class="nav-link">
                Tez yordam: +998913322545
              </a>
            </li>
          </ul>
          <div style="font-size: 14px;" class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script> Navoi tourism
          </div>
        </div>
      </footer>
    </div>
  </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

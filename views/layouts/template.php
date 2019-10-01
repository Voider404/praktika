<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\web\UrlManager;


AppAsset::register($this);

?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo Url::toRoute('/test/glav');?>"><font size="5" color="red" face="Arial">CoreTrain</font></a> /* */
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::toRoute('/test/glav');?>">Главная <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::toRoute('/test/timetable');?>">Расписание</a>
        </li>
        <?php 
        if (\app\models\User::findOne(Yii::$app->user->id == 1)->password == '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya') {
  echo Html::tag("a", "Станции", ["class"=>"nav-link","href"=>Url::toRoute('/test/station')]);
}
?>
<?php
if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya'){
  echo Html::tag("a", "Мои Брони", ["class"=>"nav-link","href"=>Url::toRoute('/test/reservedokk2?id=') . Yii::$app->user->id]);
}
?>
<?php
if (\app\models\User::findOne(Yii::$app->user->id)){
  echo Html::tag("a", "История поездок", ["class"=>"nav-link","href"=>Url::toRoute('/test/reservedokk?id=') . Yii::$app->user->id]);
}
?>
<?php 
        if (\app\models\User::findOne(Yii::$app->user->id == 1)->password == '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya') {
  echo Html::tag("a", "Брони", ["class"=>"nav-link","href"=>Url::toRoute('/test/reserved')]);
}
?>
              <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::toRoute('/test/train');?>">О поездах</a>
        </li>
      </ul>
      <ul class="navbar-nav justify-content-end">
     
      <li class="navbar-item">
      <?php
      if (Yii::$app->user->isGuest) {
        echo '  <a class="nav-link" href=" '. Url::toRoute('/registr/registr') .'">Регистрация</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="'. Url::toRoute('test/login') . '">Вход</a>';
      } else {
        echo  Html::beginForm(['/site/logout'], 'post');
        echo  Html::submitButton(
            'Выход',
            ['class' => 'btn btn-link nav-link mr-auto']
            );
        echo Html::endForm(); }
        ?>
        </li>
</ul>
  </div>
</nav>

    <div class="container">
    <?= Alert::widget() ?>
    <?= $content ?>
  
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
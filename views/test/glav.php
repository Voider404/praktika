<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
<title>Главная страница</title>
</head>
<body class="body">
<?php $this->beginBody() ?>

<h2>CoreTrain: сервис оформления билетов на поезд
в режиме 24/7 мы ведем мониторинг базы данных ЖД и находим лучшие предложения по всем направлениям.</h2>
<br>
<br>
<br>
<br>
<br>
<br>


<h3>ЗАО «CoreTrain» входит в ТОП мировых транспортных перевозчиков и является оператором российских железнодорожных путей. Учрежденная в 2019 году компания развивает сеть, которая создавалась около 2.5 месяцев. Для этого в числе прочего была разработана система максимальной продуктивности, которая позволила пользователям получать максимально достоверную информацию о наличии мест в режиме реального времени.</h3>
<br>
<br>
<br>
<br>
<br>
<? if (\app\models\User::findOne(Yii::$app->user->id)->password == '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') //  If there is a user with a certain password
{
    echo Html::tag("td", Html::tag("a", "GII", ["class"=>"btn btn-primary","href"=>Url::toRoute('/gii' ),])); // GII button for admin, why not?
}
?>

<?php $this->endBody() ?>
</body>
</html>
    <?php $this->endPage() ?>
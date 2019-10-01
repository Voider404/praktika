<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<table  class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Название станции</th>
      <th scope="col">Информация</th>
     
    </tr>
  </thead>
  <tbody>
<?php
foreach($model as $station): 
?>
<tr>
<td><?=$stay->name?></td>
<td><?=$stay->info?></td>


<?php
if (\app\models\User::findOne(Yii::$app->user->id)->password == '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya') {
  echo Html::tag("td", Html::tag("a", "Убрать станцию", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/dele?id=' . $stay->id),]));
  echo Html::tag("td", Html::tag("a", "Ред.", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/issus3red?id=' . $stay->id),]));
}
?>
</tr>
<?php
endforeach;
?>
</tbody>
</table>
<?php
if (\app\models\User::findOne(Yii::$app->user->id)->password == '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya') {
  echo Html::tag("a", "Добавить станцию", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/issus3')]);} ?>

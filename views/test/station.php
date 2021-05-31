<?php
use yii\helpers\Url;
use yii\helpers\Html;
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
<td><?=$station->name?></td>
<td><?=$station->info?></td>


<?php
if (\app\models\User::findOne(Yii::$app->user->id)->password == '$2y$13$BfMdJEP.eOjywR5DrFFnZuxGoC0HH4k/dSZU3CqUi9U4QKGzKAA6y') { //  If there is a user with a certain password
  echo Html::tag("td", Html::tag("a", "Убрать станцию", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/dele?id=' . $station->id),]));
  echo Html::tag("td", Html::tag("a", "Ред.", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/issus3red?id=' . $station->id),]));
}
?>
</tr>
<?php
endforeach;
?>
</tbody>
</table>
<?php
if (\app\models\User::findOne(Yii::$app->user->id)->password == '$2y$13$BfMdJEP.eOjywR5DrFFnZuxGoC0HH4k/dSZU3CqUi9U4QKGzKAA6y') { //  If there is a user with a certain password
  echo Html::tag("a", "Добавить станцию", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/issus3')]);} ?>

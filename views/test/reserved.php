<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<table  class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Пользователь</th>
      <th scope="col">Куда едет</th>
      <th scope="col">Время бронирования</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($model3 as $reserved): 
?>
<tr>
<td><?=$reserved->passanger->username?></td>
<td><?=$reserved->route->station->name?></td>
<td><?=$reserved->start_reserv?></td>

<?php
if (\app\models\User::findOne(Yii::$app->user->id)->password == '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya') {
  echo Html::tag("td", Html::tag("a", "Отменить бронь", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/delete4?id=' . $reserved->id),]));
}if (\app\models\User::findOne(Yii::$app->user->id)->password == '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya') {
  echo Html::tag("td", Html::tag("a", "Подтвердить бронь", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/reservedok?id=' . $reserved->id),]));}
?>
</tr>
<?php
endforeach;
?>
</tbody>
</table>

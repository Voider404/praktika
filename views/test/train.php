<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<table  class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Номер поезда</th>
      <th scope="col">Тип поезда</th>
      <th scope="col">Количество мест</th>
      <th scope="col">Маршрут</th>
      
     
    </tr>
  </thead>
  <tbody>
<?php
foreach($models as $train): 
?>
<tr>
<td><?=$train->number?></td>
<td><?=$train->type->type_name?></td>
<td><?=$train->type->places?></td>
<td><?=$train->navigate?></td>

<?php
if (\app\models\User::findOne(Yii::$app->user->id)->password == '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') {
  echo Html::tag("td", Html::tag("a", "Убрать поезд", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/delet?id=' . $train->id),]));
  echo Html::tag("td", Html::tag("a", "Ред.", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/issus2red?id=' . $train->id),]));
}
?>
<?php
if (Yii::$app->user->id) {
  echo Html::tag("td", Html::tag("a", "Коментарии", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/description?id=' . $train->id),]));
}
?>
</tr>
<?php
endforeach;
?>
</tbody>
</table>
<?php
if (\app\models\User::findOne(Yii::$app->user->id)->password == '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') {
  echo Html::tag("a", "Добавить поезд", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/issus2')]);} ?>
  <?php
  echo LinkPager::widget([
    'pagination' => $pages,
    'linkContainerOptions'=>['class'=>'page-item '],
    'linkOptions'=>['class'=>'btn btn-primary'],
    'firstPageCssClass' => '',
    'lastPageCssClass' => '',
    'prevPageCssClass' => '',
    'nextPageCssClass'=> '',
    'disabledPageCssClass'=>'btn btn-primary disabled',
]);
?>
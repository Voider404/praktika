<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<?php
$form = ActiveForm::begin(['method'=>'GET']);?>
     
     <div class="jor"><?=$form->field($search, 'datevib')->input('date')->label("Выбрать дату отправления");?></div>
     
     
     <div class="jor2" ><?= Html::submitButton('Выбрать', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?></div>
<?php
ActiveForm::end();
?>
<table  class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Пункт отправления</th>
      <th scope="col">Пункт прибытия</th>
      <th scope="col">Дата отпраления</th>
      <th scope="col">Дата прибытия</th>
      <th scope="col">Номер вагона</th>
      <th scope="col">Место</th>
      <th scope="col">Цена</th>
      <th scope="col">Номер поезда</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($models as $timetable): 
?>
<tr>
<td><?=$timetable->station->name?></td>
<td><?=$timetable->nextStay->name?></td>
<td><?=$timetable->time_start?></td>
<td><?=$timetable->time_end?></td>
<td><?=$timetable->number_vagon?></td>
<td><?=$timetable->number_place?></td>
<td><?=$timetable->price?></td>
<td><?=$timetable->train->number?></td>
<?php
if (\app\models\User::findOne(Yii::$app->user->id)->password == '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya') {
  echo Html::tag("td", Html::tag("a", "Убрать маршрут", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/delete?id=' . $timetable->id),]));
  echo Html::tag("td", Html::tag("a", "Ред.", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/issusred?id=' . $timetable->id),]));
} if(Yii::$app->user->id && (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$nMPNhRAn8i1TNBybAqkWh.lsZMCMaGjQKYORmLkWMx6HhDrrxS5ya')) { $form1 = ActiveForm::begin(['id' => 'contact-form']);
  echo '<td>';
  echo Html::tag("a", "Забронировать", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/issus4?id='). $timetable->id]);
  ActiveForm::end();
  echo '</td>'; 
  
}if(Yii::$app->user->isGuest){
  echo '<td>';  
  echo Html::tag("a", "Забронировать", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/issus4?id='). $timetable->id]); 
  echo '</td>';
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
  echo Html::tag("a", "Добавить билет", ["class"=>"btn btn-primary","href"=>Url::toRoute('test/issus')]);} ?>
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
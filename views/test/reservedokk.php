<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<div class="col-lg-6 col-sm-12">

<table  class="table table-hover">
  <thead>
    <tr>
    <th scope="col">Логин</th>
      <th scope="col">Откуда</th>
      <th scope="col">Куда</th>
      <th scope="col">Время отправления</th>
      <th scope="col">Время прибытия</th>
      <th scope="col">Вагон</th>
      <th scope="col">Место</th>
      <th scope="col">Цена</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Поезд</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach ($models as $reserved):

?>
<tr>
<td ><?=$reserved->passanger->username?></td>
<td><?=$reserved->route->station->name?></td>
<td><?=$reserved->route->nextStay->name?></td>
<td><?=$reserved->route->time_start?></td>
<td><?=$reserved->route->time_end?></td>
<td><?=$reserved->route->number_vagon?></td>
<td><?=$reserved->route->number_place?></td>
<td><?=$reserved->route->price?></td>
<td><?=$reserved->name?></td>
<td><?=$reserved->surname?></td>
<td><?=$reserved->route->train->number?></td>
</td>
</tr>
<?php
endforeach;
?>
</tbody>
</table>
<?php
echo LinkPager::widget([
    'pagination' => $pages,
    'linkContainerOptions'=>['class'=>'page-item'],
    'linkOptions'=>['class'=>'page-link'],
    'firstPageCssClass' => '',
    'lastPageCssClass' => '',
    'prevPageCssClass' => '',
    'nextPageCssClass'=> '',
    'disabledPageCssClass'=>'page-link disabled',
]);
?>
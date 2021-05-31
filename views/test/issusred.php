<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<div class="col-lg-6 col-sm-12">


<h1>Редактирование</h1>

<?php $form = ActiveForm::begin([
'options' => ['id'=>"myform"],
]) ?>

<?= $form->field($model, 'station')->label('Пункт отправления') ?>
<?= $form->field($model, 'nextStay')->label('Пункт прибытия')?>
<?= $form->field($model, 'time_start')->label('Дата отпраления') ?>
<?= $form->field($model, 'time_end')->label('Дата прибытия')?>
<?= $form->field($model, 'number_vagon')->label('Номер вагона') ?>
<?= $form->field($model, 'number_place')->label('Место')?>
<?= $form->field($model, 'price')->label('Цена') ?>
<?= $form->field($model, 'train')->label('Номер поезда')?>





<?= Html::submitButton('Отправить', ['class'=> "btn btn-primary"]) ?>


<?php ActiveForm::end() ?>
</div>
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<div class="col-lg-6 col-sm-12">


<h1>Добавить билет</h1>

<?php $form = ActiveForm::begin([
'options' => ['id'=>"myform"],
]) ?>

<?= $form->field($model, 'id_station')->label('Станция отправления') ?>
<?= $form->field($model, 'next_stay')->label('Станция прибытия') ?>
<?= $form->field($model, 'time_start')->label('Дата отправления') ?>
<?= $form->field($model, 'time_end')->label('Дата прибытия') ?>
<?= $form->field($model, 'number_vagon')->label('Номер вагона') ?>
<?= $form->field($model, 'number_place')->label('Место')?>
<?= $form->field($model, 'price')->label('Цена')?>
<?= $form->field($model, 'id_train')->label('Номер поезда')?>





<?= Html::submitButton('Добавить', ['class'=> "btn btn-primary"]) ?>


<?php ActiveForm::end() ?>
</div>
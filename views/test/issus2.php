<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<div class="col-lg-6 col-sm-12">


<h1>Добавить поезд</h1>

<?php $form = ActiveForm::begin([
'options' => ['id'=>"myform"],
]) ?>

<?= $form->field($model, 'number')->label('Номер поезда') ?>
<?= $form->field($model, 'type_id')->label('Тип поезда') ?>
<?= $form->field($model, 'navigate')->label('Маршрут') ?>





<?= Html::submitButton('Добавить', ['class'=> "btn btn-primary"]) ?>


<?php ActiveForm::end() ?>
</div>
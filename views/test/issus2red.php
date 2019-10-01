<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<div class="col-lg-6 col-sm-12">


<h1>Редактирование</h1>

<?php $form = ActiveForm::begin([
'options' => ['id'=>"myform"],
]) ?>

<?= $form->field($model, 'number')->label('Номер поезда') ?>
<?= $form->field($model, 'type')->label('Тип поезда')?>
<?= $form->field($model, 'navigate')->label('Маршрут') ?>





<?= Html::submitButton('Отправить', ['class'=> "btn btn-primary"]) ?>


<?php ActiveForm::end() ?>
</div>
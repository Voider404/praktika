<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<div class="col-lg-6 col-sm-12">


<h1>Забронировать<?=Html::encode($id_route)?></h1>

<?php $form = ActiveForm::begin([
'options' => ['id'=>"myform"],
]) ?>

<?= $form->field($model, 'name')->label('Ваше имя') ?>
<?= $form->field($model, 'surname')->label('Ваша фамилия') ?>
<?= $form->field($model, 'birthdate')->input('date')->label('Ваша дата рождения') ?>
<?= $form->field($model, 'documents')->label('Ваша серия паспорта') ?>





<?= Html::submitButton('Добавить', ['class'=> "btn btn-primary"]) ?>


<?php ActiveForm::end() ?>
</div>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReservedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserved-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'passanger_id') ?>

    <?= $form->field($model, 'id_route') ?>

    <?= $form->field($model, 'start_reserv') ?>

    <?= $form->field($model, 'name') ?>

    <?php  echo $form->field($model, 'surname') ?>

    <?php  echo $form->field($model, 'birthdate') ?>

    <?php  echo $form->field($model, 'documents') ?>

    <?php  echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

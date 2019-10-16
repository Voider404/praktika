<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') { // If there is a user with a certain password
    return $this->redirect(['login']);// Redirect back to the page
}
/* @var $this yii\web\View */
/* @var $model app\models\Reserved */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserved-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'passanger_id')->textInput() ?>

    <?= $form->field($model, 'id_route')->textInput() ?>

    <?= $form->field($model, 'start_reserv')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthdate')->textInput() ?>

    <?= $form->field($model, 'documents')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

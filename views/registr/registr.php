<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
 
?>
<div class="col-lg-6 col-sm-12">


<h1>Регистрация</h1>

<?php $form = ActiveForm::begin([
'options' => ['id'=>"myform"],
]) ?>

<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'password')->input('password')?>
<?= $form->field($model, 'yiipassword')->input('password')?>
<?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>
        







<?= Html::submitButton('Отправить') ?>


<?php ActiveForm::end() ?>
</div>
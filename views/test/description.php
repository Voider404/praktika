<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<head>
<title>Отзывы</title>
</head>
<div class="window-wrapper">


<h4 class="window-title">Отзывы</h4>


<div class="col-lg-6 col-sm-12">
    <?php /*  foreach($des as $des):
        */?>
        <h4 class="namedes"><?=$des->user->username?></h4>

        <div class="Chat82" >
            <?=$des->description?>
        </div>

        <?php /*
    endforeach; */
    ?>
</div>

  </div>
  <?php $form = ActiveForm::begin([
'options' => ['id'=>"myform"],
]) ?>
  <div class="input23">
  <?=$form->field($model, 'description')->textarea(['rows' => 2, 'cols' => 5])->label("Комментарий");?>
  <div class="input24"> <?= Html::submitButton('Отправить', ['class'=> "btn btn-primary"]) ?></div>
</div>
<?php ActiveForm::end() ?>
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reserved */

$this->title = 'Create Reserved';
$this->params['breadcrumbs'][] = ['label' => 'Reserveds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserved-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

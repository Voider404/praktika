<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reserved */
if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') { // If there is a user with a certain password
    return $this->redirect(['login']);// Redirect back to the page
}
$this->title = 'Update Reserved: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Брони', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reserved-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

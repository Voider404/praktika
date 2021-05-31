<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') { // If there is a user with a certain password
    return $this->redirect(['login']);// Redirect back to the page
}
$this->title = 'Stations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stations-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn',

                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('View', $url);
                    },


                    'update' => function ($url, $model) {
                        return Html::a('Edit', $url);
                    },

                    'delete' => function ($url, $model) {
                        return Html::a('Delete', $url, ['data-method' => 'POST']);
                    },
        ],
    ]
    ]
    ]); ?>


</div>

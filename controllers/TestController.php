<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\TestForm;
use app\models\Timetable;
use app\models\Train;
use app\models\Reserved;
use app\models\Description;
use app\models\TrainType;
use app\models\Message;
use app\models\LoginForm;
use app\models\Stay;
use yii\data\Pagination;
use app\models\User;

class TestController extends Controller
{

    //public $layout = 'base';

    public function actionIndex()
    {

        $array = Timetable::find()->all();
        $res = \app\models\Reserved::find()->where(['status' => 0])->all();
        foreach ($res as $r) {
            if ((time() - strtotime($r->start_reserv)) > (60 * 60 * 24)) {
                $r->delete();
            }
        }
        return $this->render('index', ['model' => $array]);
    }

    public function actionGlav()
    {
        $model = new TestForm();


        return $this->render('glav', ['model' => $model, 'users' => $users, 'pages' => $pagination]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionTimetable()
    {
        $search = new \app\models\BroniValid();
        $search->load(yii::$app->request->get());
        $query = Timetable::find()->where(['state' => 0]);
        if ($search->datevib) {
            $next_date = date('Y-m-d', strtotime($search->datevib . ' +1 day'));
            $query = $query->where(['and', ['=', 'time_start', $search->datevib], ['<', 'time_start', $next_date]]);
        }
        $station = \app\models\Stations::find()->select(['name'])->indexBy('id')->column();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('timetable', [
            'model' => $model,
            'search' => $search,
            'station' => $station,
            'models' => $models,
            'pages' => $pages,
        ]);
    }


    public function actionIssus()
    {
        if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') {
            return $this->redirect(['login']);
        }
        $model = new Timetable();
        if ($_POST['Timetable']) {
            $model->attributes = $_POST['Timetable'];
            if ($model->validate() && $model->save()) {
                return $this->redirect(['timetable']);
            }
        }
        return $this->render('issus', compact('model'));
    }

    public function actionIssusred($id)
    {
        $model = Timetable::findOne($id);
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                $model->save();

            }
            return $this->redirect(['timetable']);
        }
        return $this->render('issusred', compact('model'));
    }


    public function actionDelete($id)
    {
        if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') {
            return $this->redirect(['login']);
        }
        Timetable::findOne($id)->delete();
        return $this->redirect(['timetable']);
    }


    public function actionTrain()
    {
        $query = Train::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('train', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }


    public function actionIssus2()
    {
        if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') {
            return $this->redirect(['login']);
        }
        $model = new Train();
        if ($_POST['Train']) {
            $model->attributes = $_POST['Train'];
            if ($model->validate() && $model->save()) {
                return $this->redirect(['train']);
            }
        }
        return $this->render('issus2', compact('model'));
    }


    public function actionIssus2red($id)
    {
        $model = Train::findOne($id);
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                $model->save();

            }
            return $this->redirect(['train']);
        }
        return $this->render('issus2red', compact('model'));
    }

    public function actionDelete2($id)
    {
        if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') {
            return $this->redirect(['login']);
        }
        Train::findOne($id)->delete();
        return $this->redirect(['train']);
    }


    public function actionStation()
    {
        return $this->render('station', [
            'model' => \app\models\Stay::find()->all()
        ]);
    }


    public function actionIssus3()
    {
        if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') {
            return $this->redirect(['login']);
        }
        $model = new Stay();
        if ($_POST['Stay']) {
            $model->attributes = $_POST['Stay'];
            if ($model->validate() && $model->save()) {
                return $this->redirect(['station']);
            }
        }
        return $this->render('issus3', compact('model'));
    }


    public function actionIssus3red($id)
    {
        $model = Stay::findOne($id);
        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {
                $model->save();

            }
            return $this->redirect(['station']);
        }
        return $this->render('issus3red', compact('model'));
    }


    public function actionDelete3($id)
    {
        if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') {
            return $this->redirect(['login']);
        }
        Stay::findOne($id)->delete();
        return $this->redirect(['station']);
    }


    public function actionReserved()
    {
        $model3 = \app\models\Reserved::find()->where(['status' => 0])->all();
        $model2 = \app\models\Reserved::find()->where(['status' => 1])->all();
        return $this->render('reserved', [
            'model3' => $model3,
            'model2' => $model2
        ]);
    }


    public function actionReservedok($id)
    {
        if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') {
            return $this->redirect(['login']);
        } else {
            $st = \app\models\Reserved::find()->where(['status' => 0])->all();
        }
        $st = Reserved::findOne($id);
        $st->status = 1;
        $st->save();
        return $this->goBack();
    }


    public function actionIssus4($id)
    {
        $model = new Reserved();
        $model->id_route = $id;
        $model->passanger_id = yii::$app->user->id;
        if ($_POST['Reserved']) {
            $model->attributes = $_POST['Reserved'];

            $state = \app\models\Timetable::findOne($model->id_route);
            $state->state = 1;
            $state->save();;
            Yii::debug($model);
            if ($model->validate() && $model->save()) {
                return $this->redirect(['timetable']);
            }
        }
        return $this->render('issus4', compact('model'));
    }


    public function actionDelete4($id)
    {
        if (\app\models\User::findOne(Yii::$app->user->id)->password != '$2y$13$kjnIHfWzfq/aTv8glhYnL.T3OK97JPnZ1Zt1acl3aOGc2qOmhTTAG') {
            return $this->redirect(['login']);
        }
        Reserved::findOne($id)->delete();
        return $this->redirect(['reserved']);

    }

    public function actionReservedokk($id)

    {
        $array = Timetable::find()->all();
        $res = \app\models\Reserved::find()->where(['status' => 0])->all();
        foreach ($res as $r) {
            if ((time() - strtotime($r->start_reserv)) > (60 * 60 * 24)) {
                $r->delete();
            }
        }
        $id = User:: findOne(Yii::$app->user->id);
        $query = Reserved::find()->where(['status' => 1]);
        $countQuery = clone $query->where(['passanger_id' => $id, 'status' => 1]);
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        $models = $query
            ->limit($pages->limit)
            ->all();
        return $this->render(
            'reservedokk',
            ['model' => $array,
                'models' => $models,
                'pages' => $pages,


            ]);


    }


    public function actionReservedokk2($id)

    {
        $array = Timetable::find()->all();
        $res = \app\models\Reserved::find()->where(['status' => 0])->all();
        foreach ($res as $r) {
            if ((time() - strtotime($r->start_reserv)) > (60 * 60 * 24)) {
                $r->delete();
            }
        }
        $id = User:: findOne(Yii::$app->user->id);
        $query = Reserved::find()->where(['status' => 0]);
        $countQuery = clone $query->where(['passanger_id' => $id, 'status' => 0]);
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        $models = $query
            ->limit($pages->limit)
            ->all();
        return $this->render(
            'reservedokk2',
            ['model' => $array,
                'models' => $models,
                'pages' => $pages,
            ]);


    }


    public function actionDescription()
    {
        $id = \Yii::$app->request->get('id');

        $train = Train:: findOne($id);

        $seed = \app\models\Description::find()->where(['id_train' => $id])->all();

        $model = new Description();
        // var_dump($seed);
        if ($_POST['Description']) {

            $model->description = $_POST['Description']['description'];
            $model->id_user = Yii::$app->user->id;
            $model->id_train = $id;

            if ($model->validate() && $model->save()) {
                return $this->redirect(['description', 'id' => $id]);
            }

        }

        return $this->render('description', ['train' => $train, 'model' => $model, 'seeds' => $seed]);
    }
}


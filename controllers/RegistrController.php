<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RegistrForm;
use app\models\Message;
use app\models\User;

class RegistrController extends Controller{
	
	//public $layout = 'base';
	
	public function actionIndex(){
		//$param = null;
		//$param = TestForm::find()->asArray()->all();
		//$param = new TestForm();
		
		
		$param->name = 'test name';
		$param->save();
		
		
		return $this->render('index', compact('param'));
	}
	
	public function actionRegistr($id=null){
		$model = null;
		 if($id>0){
			 $model = User::findOne($id);
			
		 }else{
			$model = new RegistrForm();
		}
		if($model->load(Yii::$app->request->post())){
		
				if($model->validate()){
					//$model->password;
					$model->save();	
					$model1 = User::findOne($model->id);
					$model1->password=Yii::$app->getSecurity()->generatePasswordHash($model->password);
					$model1->save();	
					
					

					Yii::$app->session->setFlash('success',"Форма работает");
					$model = new RegistrForm();
					
					
				}else{
					Yii::$app->session->setFlash('error',"Форма не работает");
				}
			}
			return $this->render('registr', compact('model'));
		
			
	}
	
}
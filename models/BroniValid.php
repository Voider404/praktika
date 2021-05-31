<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class BroniValid extends ActiveRecord{
    
	
	public static function tableName(){
		return 'user';
	}
	public $stayend;
	public $datevib;
	public function attributeLabels(){
		return [['stayend'=>'Пункт назначения'],
		        ['datevib'=>'Дата отправления'],
		        
	
	
	
	
	
	];
	
			
			
			
	
	}
	
	public function rules(){
		return [['stayend','integer'],['datevib','date','format' => 'php:Y-m-d'],
	];     
		
	}

	
	
	
}
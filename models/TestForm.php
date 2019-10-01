<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TestForm extends ActiveRecord{
	
	public static function tableName(){
		return 'user';
	}
	
	public function attributeLabels(){
		return [
			'name'=>'Имя',
			'email'=>'Электронная почта',
			'text'=>'Текст сообщения',
		'tel'=>'Телефон',
		];
	}
	
	public function rules(){
		return [
			[['name','email'],'required','message'=>'Обязательное поле'],
			['name', 'string', 'max'=>8, 'tooLong'=>'Слишком большое Имя'],
			['email', 'string', 'max'=>20, 'tooLong'=>'Слишком большой E-mail'],
			//['name', 'myRule'],
			['text','trim'],[['tel'], 'string','max'=>12,'min'=>11,'tooLong'=>'Телефона, должно быть в другом формате','tooShort'=>'Телефона, должно быть в другом формате'],
			//'pattern' => '/^(8)[(](\d{3})[)](\d{3})[-](\d{2})[-](\d{2})/'
            ['tel', 'match', 'pattern' => '/([+]?\d{1,3}\d{10})/', 'message' => 'Телефона, должно быть в другом формате'],['name','unique','message'=>'Такое имя уже существует' ],['email','unique','message'=>'Такой email уже существует' ],['tel','unique','message'=>'Такой телефон уже существует' ],['text','unique','message'=>'Текст должен быть уникальным' ],
		];
	}
	
	/*public function myRule($attr){
		if(in_array($this->$attr,['name','first name'])){
			$this->addError($attr,'Ошибка');
		}
	}*/
	
}
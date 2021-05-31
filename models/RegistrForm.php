<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class RegistrForm extends ActiveRecord{
    
	
	public static function tableName(){
		return 'user';
	}
	public $yiipassword;
	public $rememberMe = true;

    private $_user = false;
	public function attributeLabels(){
		return [
			'username'=>'Логин',
			'email'=>'Электронная почта',
			'password'=>'Пароль',
			'yiipassword'=>'Подтверждение пароля',
			'documents'=>'Серия Паспорта',
			'rememberMe'=>'Запомнить меня',
			
			
			
		];
	}
	
	public function rules(){
		return [
			['username','required','message'=>'Заполните поле!'],
			['email','required','message'=>'Заполните поле!'],
			['password','required','message'=>'Заполните поле!'],
			['username','string','max'=>30,'tooLong'=>'Слишком длинный логин','min'=>8,'tooShort'=>'Слишком короткий логин'],
			['email', 'string', 'max'=>50, 'tooLong'=>'Слишком большой E-mail'],['password', 'string', 'max'=>1000, 'tooLong'=>'Слишком большой пароль','min'=>6,'tooShort'=>'Слишком короткий пароль'],
			['username','unique','message'=>'Такое логин уже существует' ],['email','unique','message'=>'Такой email уже существует' ],[
				'yiipassword','compare', 'compareAttribute' => 'password', 'message'=>'Не совпадает с паролем'
			],
		];
	}

	public function login()
    {
        if ($this->validate()) {
            if($this->rememberMe){
                $u = $this->getUser();
                $u->generateAuthKey();
                $u->save();
            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
		return false;
		
	}
	
	
}
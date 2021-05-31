<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "description".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_train
 * @property string $description
 *
 * @property User $user
 * @property Train $train
 */
class Description extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'description';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_train'], 'integer'],
            [['description'], 'string'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_train'], 'exist', 'skipOnError' => true, 'targetClass' => Train::className(), 'targetAttribute' => ['id_train' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_train' => 'Id Train',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrain()
    {
        return $this->hasOne(Train::className(), ['id' => 'id_train']);
    }
}

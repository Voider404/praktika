<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserved".
 *
 * @property int $id
 * @property int $passanger_id
 * @property int $id_route
 * @property string $start_reserv
 * @property string $name
 * @property string $surname
 * @property string $birthdate
 * @property int $documents
 * @property int $status
 *
 * @property User $passanger
 * @property Timetable $route
 */
class Reserved extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserved';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['passanger_id', 'id_route', 'documents', 'status'], 'integer'],
            [['start_reserv'], 'safe'],
            [['name', 'surname', 'birthdate'], 'string', 'max' => 100],
            [['passanger_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['passanger_id' => 'id']],
            [['id_route'], 'exist', 'skipOnError' => true, 'targetClass' => Timetable::className(), 'targetAttribute' => ['id_route' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'passanger_id' => 'Passanger ID',
            'id_route' => 'Id Route',
            'start_reserv' => 'Start Reserv',
            'name' => 'Name',
            'surname' => 'Surname',
            'birthdate' => 'Birthdate',
            'documents' => 'Documents',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPassanger()
    {
        return $this->hasOne(User::className(), ['id' => 'passanger_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Timetable::className(), ['id' => 'id_route']);
    }
}

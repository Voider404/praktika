<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timetable".
 *
 * @property int $id
 * @property int $id_train
 * @property int $id_station
 * @property string $time_start
 * @property string $time_end
 * @property double $price
 * @property int $next_stay
 * @property int $number_vagon
 * @property int $number_place
 * @property int $state
 *
 * @property Reserved[] $reserveds
 * @property Train $train
 * @property Stay $station
 * @property Stay $nextStay
 */
class Timetable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timetable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_train', 'id_station', 'next_stay', 'number_vagon', 'number_place', 'state'], 'integer'],
            [['time_start', 'time_end'], 'safe'],
            [['price'], 'number'],
            [['number_vagon', 'number_place'], 'required'],
            [['id_train'], 'exist', 'skipOnError' => true, 'targetClass' => Train::className(), 'targetAttribute' => ['id_train' => 'id']],
            [['id_station'], 'exist', 'skipOnError' => true, 'targetClass' => Stations::className(), 'targetAttribute' => ['id_station' => 'id']],
            [['next_stay'], 'exist', 'skipOnError' => true, 'targetClass' => Stations::className(), 'targetAttribute' => ['next_stay' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_train' => 'Id Train',
            'id_station' => 'Id Station',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
            'price' => 'Price',
            'next_stay' => 'Next Station',
            'number_vagon' => 'Number Vagon',
            'number_place' => 'Number Place',
            'state' => 'State',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserveds()
    {
        return $this->hasMany(Reserved::className(), ['id_route' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrain()
    {
        return $this->hasOne(Train::className(), ['id' => 'id_train']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStation()
    {
        return $this->hasOne(Stations::className(), ['id' => 'id_station']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNextStay()
    {
        return $this->hasOne(Stations::className(), ['id' => 'next_stay']);
    }
}

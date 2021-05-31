<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stay".
 *
 * @property int $id
 * @property string $name
 * @property string $info
 *
 * @property Timetable[] $timetables
 * @property Timetable[] $timetables0
 * @property Train[] $trains
 * @property Train[] $trains0
 */
class Stations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'info' => 'Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['id_station' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables0()
    {
        return $this->hasMany(Timetable::className(), ['next_stay' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrains()
    {
        return $this->hasMany(Train::className(), ['id_station_start' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrains0()
    {
        return $this->hasMany(Train::className(), ['id_station_end' => 'id']);
    }
}

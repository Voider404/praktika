<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "train".
 *
 * @property int $id
 * @property string $number
 * @property int $type_id
 * @property string $navigate
 *
 * @property Description[] $descriptions
 * @property Timetable[] $timetables
 * @property TrainType $type
 */
class Train extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'train';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'navigate'], 'required'],
            [['type_id'], 'integer'],
            [['number', 'navigate'], 'string', 'max' => 100],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TrainType::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'type_id' => 'Type ID',
            'navigate' => 'Navigate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescriptions()
    {
        return $this->hasMany(Description::className(), ['id_train' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['id_train' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TrainType::className(), ['id' => 'type_id']);
    }
}

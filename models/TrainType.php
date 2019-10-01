<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "train_type".
 *
 * @property int $id
 * @property string $places
 * @property string $type_name
 *
 * @property Train[] $trains
 */
class TrainType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'train_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['places'], 'string', 'max' => 100],
            [['type_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'places' => 'Places',
            'type_name' => 'Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrains()
    {
        return $this->hasMany(Train::className(), ['type_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pets".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property integer $low
 * @property integer $high
 */
class Pets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img', 'level'], 'required'],
            [['level'], 'integer'],
            [['name'], 'string', 'max' => 16],
            [['img'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
            'level' => 'Level',
        ];
    }
}

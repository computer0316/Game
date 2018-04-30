<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arm".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property integer $level
 */
class Arm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img'], 'required'],
            [['level'], 'integer'],
            [['name'], 'string', 'max' => 16],
            [['img'], 'string', 'max' => 32],
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

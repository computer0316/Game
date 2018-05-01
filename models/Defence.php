<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "defence".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 */
class Defence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'defence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img'], 'required'],
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
        ];
    }
}
